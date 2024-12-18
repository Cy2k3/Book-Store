<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
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
        .gallery-content {
            padding: 20px;
            text-align: left;
            margin-top: 20px;
        }
        .gallery-content h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .gallery-content p {
            margin-bottom: 20px;
        }
        
        .gallery-images img {
            width: 150px;
            height: auto;
            margin: 10px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: transform 0.3s ease-in-out;
        }
        .gallery-images img:hover {
            transform: scale(1.1);
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
    
    <div class="container gallery-content">
        <div class="gallery-images">
            <?php 
            try {
                $db = new PDO('mysql:host=localhost;dbname=website','root','root');
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                echo $e->getMessage();
            }

            if (isset($_GET["action"]) && $_GET["action"] == "delete" && isset($_GET["Image_ID"])) {
                $del = $db->prepare("DELETE FROM gallery WHERE Image_ID = :Image_ID");
                $del->bindParam(':Image_ID', $_GET["Image_ID"]);
                $del->execute();
                echo "Deleted: ".$del->rowCount()." row(s)";
            }

            if (isset($_GET["action"]) && $_GET["action"] == "Add") {
                if (isset($_POST["BookName"]) && isset($_POST["Picture"])) {
                    $BookName = $_POST["BookName"];
                    $Picture = $_POST["Picture"];
                    $statement = $db->prepare("INSERT INTO gallery (BookName, Picture) VALUES (:BookName, :Picture)");
                    $statement->execute(array(':BookName' => $BookName, ':Picture' => $Picture));
                }
            }

            if (isset($_GET["action"]) && $_GET["action"] == "edit" && isset($_GET["Image_ID"])) {
                $stmt = $db->prepare("SELECT * FROM gallery WHERE Image_ID = :Image_ID");
                $stmt->bindParam(':Image_ID', $_GET["Image_ID"]);
                $stmt->execute();
                $image = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($image) {
                    ?>
                    <form method="post" action="gallery.php?action=update">
                        <input type="hidden" name="Image_ID" value="<?php echo $image['Image_ID']; ?>">
                        <input type="text" name="BookName" value="<?php echo $image['BookName']; ?>"><br>
                        <input type="text" name="Picture" value="<?php echo $image['Picture']; ?>"><br>
                        <input type="submit" value="Update">
                    </form>
                    <?php
                }
            }

            if (isset($_GET["action"]) && $_GET["action"] == "update" && isset($_POST["Image_ID"])) {
                if (isset($_POST["BookName"]) && isset($_POST["Picture"])) {
                    $BookName = $_POST["BookName"];
                    $Picture = $_POST["Picture"];
                    $Image_ID = $_POST["Image_ID"];
                    $update = $db->prepare("UPDATE gallery SET BookName = :BookName, Picture = :Picture WHERE Image_ID = :Image_ID");
                    $update->bindParam(':BookName', $BookName);
                    $update->bindParam(':Picture', $Picture);
                    $update->bindParam(':Image_ID', $Image_ID);
                    $update->execute();
                    echo "Updated: ".$update->rowCount()." row(s)";
                }
            }

            $statement = $db->query("SELECT * FROM gallery");
            foreach ($statement as $row) {
                echo "<h2>{$row['BookName']}</h2>";
                echo "<p><a href='gallery.php?action=edit&Image_ID={$row["Image_ID"]}'>edit</a> | <a href='gallery.php?action=delete&Image_ID={$row["Image_ID"]}'>delete</a></p>";
                echo "<img src='{$row['Picture']}' alt='{$row['BookName']}' class='img-fluid'>";
            }
            $statement->closeCursor();
            ?>
        </div>
        <p>Add To Gallery</p>
        <form method="post" action="gallery.php">
            
            <input type="text" id='bookname'name="BookName" placeholder="Book Name"><br>
            
            <input type="text" name="Picture" placeholder="Picture JPG"><br>
            <input type="submit" value="Add">
        </form>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
