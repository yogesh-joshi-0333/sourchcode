<?php 

namespace App\Services;

use Google\Client as GoogleClient;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class FirebaseNotificationService
{
    protected $client;
    protected $projectId;
    protected $credentialsFilePath;

    public function __construct()
    {
        $this->projectId = 'test-your-project-name';//env('FIREBASE_PROJECT_ID');
        // dd($this->projectId);
        // $this->credentialsFilePath = Storage::path(env('FIREBASE_CREDENTIALS_PATH'));
        $this->credentialsFilePath = Storage::path('json/test-your-project-name-firebase-adminsdk-hgfhgf-hgfhfhfh.json');

        $this->client = new GoogleClient();
        $this->client->setAuthConfig($this->credentialsFilePath);
        $this->client->addScope('https://www.googleapis.com/auth/firebase.messaging');
    }

    /**
     * Send Firebase Notification
     *
     * @param array $tokens
     * @param string $title
     * @param string $body
     * @param array $data
     * @return void
     */
    public function sendNotification(array $tokens, string $title, string $body, array $data = [])
    {
        Log::info("sending Notification");
        try {
            foreach ($tokens as $fcmToken){                   
                if($fcmToken != null)
                {
                    $this->client->refreshTokenWithAssertion();
                    $token = $this->client->getAccessToken();

                    $access_token = $token['access_token'];
                    $headers = [
                        'Authorization: Bearer ' . $access_token,
                        'Content-Type: application/json',
                    ];
                    $data = [
                        "title" => $title ?? '',
                        "body" => $body ?? '',
                    ];
                    $notificationData = [
                        "message" => [
                            "token" => $fcmToken,
                            "notification" => [
                                "title" => $title ?? '',
                                "body" => $body ?? '',
                            ],
                            "data" => $data
                        ]
                    ];

                    // dd($notificationData);

                    $payload = json_encode($notificationData);
                    // Log::info('reminder notification playload'. $payload);

                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, "https://fcm.googleapis.com/v1/projects/{$this->projectId}/messages:send");
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
                    curl_setopt($ch, CURLOPT_VERBOSE, true); // Enable verbose output for debugging
                    $response = curl_exec($ch);
                    $err = curl_error($ch);
                    curl_close($ch);
                    Log::info($response);
                    if ($err) {
                        Log::info('reminder notification error CURL'. $err);
                    } else {
                        // Log::info('reminder notification response CURL'. $response);
                    }
                }
            }

  
        } catch (\Exception $e) {
            Log::error('FCM Notification Sending Error: ' . $e->getMessage());
        }
    }
}
