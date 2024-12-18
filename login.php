<?php
session_start();

if(isset($_POST['username']) && isset($_POST['password'])){
    if($_POST['username'] === "root" && $_POST['password'] === "R00t#"){
        $_SESSION['login'] = true;
        header("Location: homepage.php");
        exit;
    } else {
        $error = "Invalid username or password!";
    }
}

if(isset($_SESSION['login']) && $_SESSION['login'] === true){
    header("Location: homepage.php");
    exit;
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('knowledge.jpg'); 
            background-size: cover;
            background-position: center;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }
        .login-container {
            background-color: rgba(255, 255, 255, 0.7); 
            padding: 50px;
            border-radius: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="login-container">
                    <h2 class="mb-3">Login</h2>
                    <?php if(isset($error)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error; ?>
                        </div>
                    <?php endif; ?>
                    <form method="POST">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
