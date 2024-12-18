<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        .navbar {
            background-color: white !important;
            color: white !important;
        }
        .navbar-brand img {
            height: 40px;
        }
        .navbar-nav .nav-link {
            color: black !important;
            font-weight: bold;
        }
        .navbar {
            width: 100%;
            z-index: 1000;
        }
        .about-content {
            padding: 20px;
            text-align: left;
            margin-top: 20px;
        }
        .about-content h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .about-content p {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="logo.jpg" alt="Logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="homepage.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                    <li class="nav-item">
                        <form method="post" action="logout.php">
                            <button type="submit" class="btn btn-primary">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container about-content">
        <?php 
        try {
            $db = new PDO('mysql:host=localhost;dbname=website','root','root');
        } catch(PDOException $e) {
            echo $e->getMessage();
        }

        $statement = $db->query("SELECT * FROM about");
        foreach ($statement as $row) {
            echo "<h2>Introduction</h2>";
            echo "<p>{$row['Introduction']}</p>";

            echo "<h2>Achievements</h2>";
            echo "<p>{$row['Achievements']}</p>";
        }
        $statement->closeCursor();
        ?>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
