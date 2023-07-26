<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];


    try {
        $veritabani = new PDO('sqlite:message.db');
        $veritabani->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $sql = "INSERT INTO Messages (fullname, email, subject, message) VALUES (:fullname, :email, :subject, :message)";
        $stmt = $veritabani->prepare($sql);
        $stmt->bindParam(':fullname', $fullname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':subject', $subject);
        $stmt->bindParam(':message', $message);

        $stmt->execute();

        echo "Mesajınız başarıyla gönderildi.";
    } catch (PDOException $e) {
        echo "Veritabanı bağlantı hatası: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>

    <link rel="shortcut icon" href="assets/img/icon/favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/fonts/flaticon/flaticon.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/mobile.css">
</head>

<body>

    <header>
        <div class="container">
            <div class="header-wrapper mt-5">
                <div class="row header-content">
                    <div class="header-title col-md-8">
                        <a href="index.php">Blog Title</a>
                    </div>
                    <div class="header-menu col-md-4">
                        <ul>
                            <li>
                                <a href="index.php">Home</a>
                            </li>
                            <li>
                                <a href="blog.php">Blog</a>
                            </li>
                            <li>
                                <a href="about.html">About</a>
                            </li>
                            <li>
                                <a href="contact.php" style="opacity: 100%;">Contact</a>
                            </li>
                            <li>
                                <a href="admin.php">Admin</a>
                            </li>


                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="contact-wrapper">
        <div class="container mt-4">
            <div class="contact-container">
                <div class="contact-top-title">
                    Contact Form
                </div>
                <div class="contact-form">
                    <form action="#" method="post">
                        <div class="fullname-input">
                            <input type="text" name="fullname" id="" placeholder="Full Name" style="color: black;">
                        </div>
                        <div class="email-input">
                            <input type="email" name="email" id="" placeholder="Email Address" style="color: black;">
                        </div>
                        <div class="subject-input">
                            <input type="text" name="subject" id="" placeholder="Subject" style="color: black;">
                        </div>
                        <div class="message-input">
                            <textarea name="message" id="" cols="60" rows="5" placeholder="Message" style="color: black;"></textarea>
                        </div>
                        <div class="button-input">
                            <button type="submit">Send Message</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>



    <footer>
        <div class="container-fluid mt-5"></div>
        <hr>
        </div>
        <div class="container text-center mt-5 mb-5">
            <div class="copyright">
                © 2021 All rights reserved.
            </div>
        </div>

    </footer>

</body>

</html>