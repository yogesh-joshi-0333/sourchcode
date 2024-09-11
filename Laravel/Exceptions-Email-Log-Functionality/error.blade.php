<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Project name Error Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            margin: 20px;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #e74c3c;
        }
        pre {
            background: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 10px;
            overflow: auto;
            font-size: 14px;
        }
        .details {
            margin-bottom: 20px;
        }
        .footer {
            font-size: 12px;
            color: #777;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Your Project name Error Report</h1>
        <p>Dear Support Team,</p>
        <p>Website encountered an error in the Mariner Museum application. Below are the details of the issue:</p>
        
        <div class="details">
            <strong>Application:</strong>Catalogs Mariners Museum <br>
            <strong>Website:</strong>http://catalogs.marinersmuseum.org <br>
            <strong>Environment:</strong>Production<br>
        </div>
        
        <p><strong>Error Message:</strong></p>
        <pre>     {{$error}}   </pre>
              
        <p class="footer">
        </p>
    </div>
</body>
</html>
