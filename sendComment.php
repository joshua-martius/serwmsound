<?php
if(!isset($_POST["tbxComment"]) || !isset($_POST["tbxAuthor"]))
{
	var_dump($_POST);
	header("Location: index.php");
	exit();
}
$author = $_POST["tbxAuthor"];
$comment = $_POST["tbxComment"];
$address = $_SERVER["REMOTE_ADDR"];
$id = $_POST["tbxID"];
$sql = sprintf("INSERT INTO tblComment(cUploadID, cAuthor, cComment, cCreatedFrom) VALUES ('%s','%s','%s','%s')", $id, $author, $comment, $address);
require_once "dbh.inc.php";
$result = mysqli_query($conn, $sql);

header("Location: play.php?id=" . $id);
exit();
