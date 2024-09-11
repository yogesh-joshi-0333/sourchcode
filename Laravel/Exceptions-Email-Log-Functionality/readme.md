<h2>Email Configuration and Error Handling</h2>

<p>This project demonstrates how to configure an additional SMTP for sending emails and how to handle exceptions by sending error reports via email.</p>

<h3>File Structure</h3>

<p>Here are the key files related to email configuration and error handling:</p>
<ul>
  <li><code>projectFolder/config/mail.php</code></li>
  <li><code>projectFolder/app/Exceptions/Handler.php</code></li>
  <li><code>projectFolder/app/Mail/ExceptionMail.php</code></li>
  <li><code>projectFolder/resources/views/emails/error.blade.php</code></li>
</ul>

<h3>Email Configuration</h3>

<p>In <code>config/mail.php</code>, we add a secondary SMTP configuration for handling specific email needs. The default email settings are not used. Instead, a custom SMTP configuration is added as follows:</p>

<pre>
<code>
'second_smtp' => [
    'transport'  => 'smtp',
    'host'       => 'sandbox.smtp.mailtrap.io',
    'port'       => 587,
    'encryption' => 'tls',
    'username'   => 'yourusername',
    'password'   => 'yourpassword',
    'timeout'    => null,
],
</code>
</pre>

<p>This configuration uses a specific Mailtrap SMTP server.</p>

<h3>Custom Exception Handling</h3>

<p>When an exception occurs, the application is configured to send an error report via email using the <code>ExceptionMail</code> class.</p>

<ul>
  <li><strong>Handler Class:</strong> This is located in <code>app/Exceptions/Handler.php</code> and is responsible for catching exceptions.</li>
  <li><strong>Mail Class:</strong> The <code>ExceptionMail</code> class in <code>app/Mail/ExceptionMail.php</code> sends the exception details via email.</li>
  <li><strong>Blade Template:</strong> The email content is rendered using the Blade template located at <code>resources/views/emails/error.blade.php</code>.</li>
</ul>

<p>This setup ensures that critical application errors are reported via email.</p>
