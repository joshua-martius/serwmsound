<?php
	if(!isset($_GET["id"]) || $_GET["id"] == "") die("No id provided.");
	$id = $_GET["id"];
	$filename = "uploads/" . $id . ".mp3";
    if(!file_exists($filename)) die("ID doesnt exist physically.");
    
    require_once "dbh.inc.php";
    $sql = sprintf("SELECT uUploaded, uInterpret, uName, uHits FROM tblUpload WHERE uID = '%s'", $id);
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_row($result);
	if(empty($row)) die("ID doesnt exist virtually.");
	$sql = sprintf("UPDATE tblUpload SET uHits = uHits + 1 WHERE uID = '%s'", $id);
	$result = mysqli_query($conn, $sql);
	$title = "";
	if($row[1] == "" && $row[2] == "") $title = "serWm Soundshare";
	else if($row[1] != "" && $row[2] == "") $title = $row[1];
	else if($row[1] == "" && $row[2] != "") $title = $row[2];
	else $title = $row[1] . " - " . $row[2];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title><?php echo $title; ?></title>
	</head>
	<body>
		<h2><?php echo $title; ?></h2>
		<audio controls>
			<source src="<?php echo 'uploads/' . $id . '.mp3';?>" type="audio/mpeg">
		</audio><br>
        <small><?php echo "Uploaded at: " . $row[0]; ?></small><br>
        <small><?php echo "Hits: " . $row[3]; ?></small>
	</body>
</html>
