<!doctype html>
<html lang="en">

  <body>


<?php 
	try {
  	$db = new PDO('mysql:host=localhost;dbname=website','root','root');
	}

	catch(PDOException $e) {
  	echo $e->getMessage();
	}


	if ($_GET["action"] == "delete") {
		$del = $db->exec("DELETE FROM menu WHERE id = ".$_GET["id"]);
		echo "Deleted: ".$del;
	}


	if ($_GET["action"] == "add") {
		$link = $_POST["link"];
		$content = $_POST["content"];
		$statement = $db->prepare("INSERT INTO menu (link,content) values ('$link','$content')");
		$statement->execute();
	}


$statement = $db->query("SELECT * FROM menu");
   foreach($statement as $row) {
    ?>

		<?php echo $row["link"]; ?>
		<p>
  	<a href="admin.php?action=edit&id=<?php echo $row["id"]; ?>">edit</a> | 
  	<a href="admin.php?action=delete&id=<?php echo $row["id"]; ?>">delete</a> 
    </p>
   <?php 
   }
$statement->closeCursor();
?>
  <p>add new article</p>
	<form method="post" action="admin.php?action=add">
		<input type="text" name="link"><br>
		<textarea name="content"></textarea><br>
		<input type="submit" value="add">
	</form>
	
  </body>
</html>
