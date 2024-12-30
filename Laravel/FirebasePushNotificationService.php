<?php 

namespace App\Services;

use Google\Client as GoogleClient;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class FirebasePushNotificationService
{
    protected $client;
    protected $projectId;
    protected $credentialsFilePath;

    public function __construct()
    {
        $this->projectId = 'yourProject--production';
        $this->credentialsFilePath = Storage::path('json/yourProject--production-firebase-adminsdk-ggfd-ggdfdgfd.json');

        $this->client = new GoogleClient();
        $this->client->setAuthConfig($this->credentialsFilePath);
        $this->client->addScope('https://www.googleapis.com/auth/firebase.messaging');
    }

    /**
     * Send Firebase Notifications
     *
     * @param string $title
     * @param string $message
     * @param array $tokens
     * @return array
     */
    public function sendPush(string $title, string $message, array $tokens)
    {
        if (empty($tokens)) {
            return [
                'success' => false,
                'message' => 'No device tokens provided.',
            ];
        }

        try {
            // Retrieve the access token
            $token = $this->client->fetchAccessTokenWithAssertion();
            $accessToken = $token['access_token'];

            // FCM headers
            $headers = [
                'Authorization' => 'Bearer ' . $accessToken,
                'Content-Type' => 'application/json',
            ];

            // Loop through tokens and send notifications
            foreach ($tokens as $fcmToken) {
                if (!$fcmToken) {
                    continue;
                }

                $payload = [
                    'message' => [
                        'token' => $fcmToken,
                        'notification' => [
                            'title' => $title,
                            'body' => $message,
                        ],
                        'data' => [
                            'custom_key' => 'custom_value', // Example data payload
                        ],
                    ],
                ];

                $response = Http::withHeaders($headers)
                    ->post("https://fcm.googleapis.com/v1/projects/{$this->projectId}/messages:send", $payload);

                // Log response
                if ($response->successful()) {
                    Log::channel('notifications')->info("Notification sent to token: {$fcmToken}. Response: " . $response->body());
                } else {
                    Log::channel('notifications')->info("Failed to send notification to token: {$fcmToken}. Error: " . $response->body());
                }
            }

            return [
                'success' => true,
                'message' => 'Notifications processed. Check logs for details.',
            ];
        } catch (\Exception $e) {
            Log::channel('notifications')->info('FCM Notification Sending Error: ' . $e->getMessage());

            return [
                'success' => false,
                'message' => 'An error occurred while sending notifications.',
                'error' => $e->getMessage(),
            ];
        }
    }
}
