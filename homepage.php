<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 20px 0;
        }
        .navbar-brand img {
            height: 40px;
        }
        .navbar-nav .nav-link {
            color: #333 !important;
            font-weight: bold;
        }
        .header-image {
            height: 80vh;
            background: url('k.jpg') no-repeat center;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: #fff;
            padding: 20px;
        }
        .header-image h1 {
            font-size: 36px;
            margin: 0;
        }
        .book-content {
            text-align: center;
            padding: 40px 20px;
        }
        .book-content h2 {
            font-size: 24px;
            margin-bottom: 30px;
            color: #333;
        }

        .book-images {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
        }
        .book-images img {
            width: 150px;
            height: auto;
            margin: 10px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: transform 0.3s ease-in-out;
        }
        .book-images img:hover {
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
    <div class="header-image">
        <h1>Books</h1>
    </div>
    <div class="book-content">
        <h2>Recently Read Books</h2>
        <div class="book-images">
            <img src="book1.jpg" alt="Book 1">
            <img src="book2.jpg" alt="Book 2">
            <img src="book3.jpg" alt="Book 3">
        </div>
    </div>
</body>
</html>
