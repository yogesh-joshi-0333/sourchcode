<?php

namespace App\Services;

/** install "twilio/sdk": "^8.2" */
use Twilio\Rest\Client;

class TwilioService
{
    protected $twilio;
    protected $twilioConfig;

    public function __construct()
    {
        $this->twilioConfig = config('cred-env.t_data');

        $this->twilio = new Client(
            $this->twilioConfig->T_SID,
            $this->twilioConfig->T_TOKEN
        );
    }

    public function sendSms($phoneNumber, $message)
    {
        $this->twilio->messages->create($phoneNumber, [
            'from' => $this->twilioConfig->T_FROM,
            'body' => $message,
        ]);
    }
}
