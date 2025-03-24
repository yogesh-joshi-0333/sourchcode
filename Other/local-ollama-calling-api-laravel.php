        return response()->stream(function () use ($prompt) {

            $url = 'http://localhost:11434/api/generate';

            $data = json_encode([
                'model' => 'gemma3:1b', // Change to your installed model
                'prompt' => $prompt,
                'stream' => true
            ]);

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json'
            ]);

            // Enable streaming response
            curl_setopt($ch, CURLOPT_WRITEFUNCTION, function($ch, $chunk) {
                echo "data: " . trim($chunk) . "\n\n";
                ob_flush();
                flush();
                return strlen($chunk);
            });

            // Execute request
            curl_exec($ch);
            curl_close($ch);

        }, 200, [
            'Cache-Control' => 'no-cache',
            'Content-Type' => 'text/event-stream',
            'X-Accel-Buffering' => 'no', // Prevents Nginx from buffering
        ]);
