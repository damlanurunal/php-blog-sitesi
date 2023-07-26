<?php
try {
    unset($veritabani);

    $veritabani = new PDO('sqlite:posts.db');
    $veritabani->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $sql = "CREATE TABLE IF NOT EXISTS posts (
            title TEXT NOT NULL,
            text TEXT,
            PRIMARY KEY(title)
        )";
    $veritabani->exec($sql);
} catch (PDOException $e) {
    echo "Veritabanı bağlantı hatası: " . $e->getMessage();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = $_POST['title'];
    $text = $_POST['text'];

    $sql = "INSERT INTO posts (title,  text) VALUES (:title,  :text)";
    $stmt = $veritabani->prepare($sql);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':text', $text);
    $stmt->execute();
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
                    POST
                </div>
                <div class="contact-form">
                    <form action="#" method="post">
                        <div class="title-input">
                            <input type="text" name="title" id="" placeholder="Title" style="color: black;">
                        </div>

                        <div class="text-input">
                            <textarea name="text" id="" cols="60" rows="5" placeholder="Text" style="color: black;"></textarea>
                        </div>
                        <div class="button-input">
                            <button type="submit">Send Post</button>
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