<?php
	if(!isset($_GET["id"]) || $_GET["id"] == "") die("No id provided.");
	$id = $_GET["id"];
	$filename = "uploads/" . $id . ".mp3";
	if(!file_exists($filename)) die("ID doesnt exist.");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>serWm Soundshare</title>
	</head>
	<body>
		<audio controls>
			<source src="<?php echo 'uploads/' . $id . '.mp3';?>" type="audio/mpeg">
		</audio>

	</body>
</html>
