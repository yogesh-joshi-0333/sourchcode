<?php

namespace App\Services;

use Exception;
use Carbon\Carbon;
use App\Models\Otp;
use Twilio\Rest\Client;
/** Need to install twillio dependency and create migration for it*/
class OtpService
{
    public static function generateOtp($phone,$otp=null, $userId = null,$message = null,)
    {
        if($otp == null) {
            $otp = rand(1000, 9999);
        }
                
        $expiresAt = Carbon::now()->addMinutes(10);
        if($message == null)
        {
            $message = trans('auth.otp.message',['OTP' => $otp]);
        }

        $otpRecord = Otp::create([
            'user_id' => $userId,
            'phone' => $phone,
            'otp' => $otp,
            'message' => $message,
            'expires_at' => $expiresAt,
        ]);

        self::sendSms($phone, $otpRecord->message);

        return $otpRecord;
    }

    public static function sendSms($phone, $message)
    {
        try {
            $sid = env('TWILIO_SID');
            $token = env('TWILIO_AUTH_TOKEN');
            $twilioNumber = env('TWILIO_PHONE_NUMBER');

            $client = new Client($sid, $token);
            return $client->messages->create($phone, [
                'from' => $twilioNumber,
                'body' => $message,
            ]);
        } catch (Exception $e) {
            return "Error: ". $e->getMessage();
        }
    }

    public static function verifyOtp($phone, $otp)
    {
        $otpRecord = Otp::where('phone', $phone)
        ->where('otp', $otp)
        ->where('is_verified', false)
        ->latest()->first();

        if (!$otpRecord) {
            return ['status'=>false,'message'=>trans('auth.otp.invalid')]; // OTP not found
        }

        if ($otpRecord->isExpired()) {
            return ['status'=>false,'message'=>trans('auth.otp.expired')]; // OTP expired
        }

        $otpRecord->update(['is_verified' => true]);

        return ['status'=>true,'message'=>trans('auth.otp.verified')]; // OTP verified
    }
}
