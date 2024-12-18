<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["message"]) && !empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["message"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $message = $_POST["message"];

        header("Location: thank_you.php");
        exit; 
    } else {
       
        echo "Error: All form fields are required.";
    }
}
?>
