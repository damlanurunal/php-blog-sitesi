<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="shortcut icon" href="assets/img/icon/favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/flaticon/flaticon.css">
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
                                <a href="about.html" style="opacity: 100%;">About</a>
                            </li>
                            <li>
                                <a href="contact.php">Contact</a>
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

    <!DOCTYPE html>
    <html>

    <head>
        <title>Admin Paneli</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <div class="container">
            <div class="sidebar">

                <ul>

                    <li><a href="post.php">Post Paylaş
                        </a></li>

                </ul>
            </div>
            <div class="content">

                <h1>Hoş Geldiniz, Admin!</h1>


                <div class="contact-wrapper">
                    <div class="container mt-4">
                        <div class="contact-container">
                            <div class="contact-top-title">
                                Mesajlar
                            </div>
                            <div class="contact-form">
                                <?php
                                try {

                                    $veritabani = new PDO('sqlite:message.db');
                                    $veritabani->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                                    $sql = "SELECT * FROM Messages";
                                    $stmt = $veritabani->prepare($sql);
                                    $stmt->execute();


                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        echo "<p><strong>Full Name:</strong> " . $row['fullname'] . "</p>";
                                        echo "<p><strong>Email:</strong> " . $row['email'] . "</p>";
                                        echo "<p><strong>Subject:</strong> " . $row['subject'] . "</p>";
                                        echo "<p><strong>Message:</strong> " . $row['message'] . "</p>";
                                        echo "<hr>";
                                    }
                                } catch (PDOException $e) {
                                    echo "Veritabanı bağlantı hatası: " . $e->getMessage();
                                }

                                ?>




                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </body>

    </html>
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