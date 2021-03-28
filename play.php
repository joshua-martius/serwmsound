<?php
	if(!isset($_GET["id"]) || $_GET["id"] == "") header("Location: index.php?msg=noidgiven");
	$id = $_GET["id"];
	$filename = "uploads/" . $id . ".mp3";
    if(!file_exists($filename)) header("Location: index.php?msg=filenotfound");

    require_once "dbh.inc.php";
    $sql = sprintf("SELECT uUploaded, uInterpret, uName, uHits, uLyrics FROM tblUpload WHERE uID = '%s'", $id);
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_row($result);
    if(empty($row)) header("Location: index.php?msg=entrynotfound");
    $sql = sprintf("UPDATE tblUpload SET uHits = uHits + 1 WHERE uID = '%s'", $id);
    $result = mysqli_query($conn, $sql);
    $title = "";
    $lyrics = $row[4];
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
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	</head>
	<body>
	<div class="container">
		<a href="index.php"><img src="https://serwm.com/logo_rund.png" style="display: inline;"></a>
		<center><h1><?php echo $title; ?></h1></center>
		<table class="table">
			<tr>
				<td><?php echo "Uploaded at " . $row[0]; ?></td>
				<td><?php echo "Hits: " . $row[3]; ?></td>
			</tr>
		</table>
		<audio controls controlsList="nodownload" style="width: 100%">
			<source src="<?php echo 'uploads/' . $id . '.mp3';?>" type="audio/mpeg">
		</audio><br>
		<?php
			if($lyrics != "")
			{
				echo "Lyrics: <br><pre>" . $lyrics .  "</pre>";
			}
		?>
	</div>
	<?php include_once "commentbox.php"; ?>
	</body>
</html>
