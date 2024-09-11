projectFolder/config/mail.php
projectFolder/app/Exceptions/Handler.php
projectFolder/app/Mail/ExceptionMail.php
projectFolder/resources/views/emails/error.blade.php


add email configuration like the below, I have specific requirement for not used default email so i have added another SMPT 


'second_smtp' => [
    'transport' => 'smtp',
    'host' => 'sandbox.smtp.mailtrap.io',
    'port' => 587,
    'encryption' => 'tls',
    'username' => 'f003785bf6f42b',
    'password' => '89533b05e2e3bb',
    'timeout' => null,
],
