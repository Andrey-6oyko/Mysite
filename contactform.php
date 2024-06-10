<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $to = "andreyboyko200032@gmail.com";

    
    $subject = "New Contact Form Submission";

    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Message:\n$message\n";

    // Відправка електронного листа
    mail($to, $subject, $email_content);

    // Повідомлення про успішне відправлення
    echo "Your message has been sent successfully!";
}
