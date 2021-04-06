<?php

function RandomString($len)
{
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$randstring = '';
	for ($i = 0; $i < $len; $i++) {
		$randstring .= $characters[rand(0, strlen($characters))];
	}
	return $randstring;
}
if(isset($_FILES['fileToUpload']))
{
        $file = $_FILES["fileToUpload"];
        $fileName = $file["name"];
        $fileSize = $file["size"];
        $fileType = $file["type"];
	    $tmpFileName = $file["tmp_name"];

        if($fileSize < 50000000)
        {
            $fullPath = "";
            $newDbName = "";
            do
            {
                $newDbName = RandomString(16);
                $newFileName = $newDbName . ".mp3";
                $fullPath = "uploads/" . $newFileName;
            } while(file_exists($fullPath));
            require_once "dbh.inc.php";
            $interpret = "";
            $name = "";
            $lyrics = "";
	    $allowComments = 1;
	    try
            {
                $interpret = $_POST["tbxInterpret"];
                $name = $_POST["tbxSongName"];
		$lyrics = mysqli_real_escape_string($conn,$_POST["tbxLyrics"]);
		if($name == "") $name = $fileName;
		if($_POST["cmbAllowComments"] == "Yes") $allowComments = 1;
		else if($_POST["cmbAllowComments"] == "Maybe") $allowComments = random_int(0,1);
		else $allowComments = 0;
            }
            catch(Exception $e){}

            $sql = sprintf("INSERT INTO tblUpload(uID, uUploaderIP, uInterpret, uName, uLyrics, uAllowComments) VALUES ('%s','%s','%s','%s','%s', %d)", $newDbName, $_SERVER["REMOTE_ADDR"], $interpret, $name, $lyrics, $allowComments);
	    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            if(result == true)
            {
                move_uploaded_file($tmpFileName, $fullPath);
                header("Location: play.php?id=" . $newDbName);
            }
            else
            {
                echo "Database error in upload.php";
            }
	}
	else header("Location: index.php?error=toobig");
}
else
{
	header("Location: index.php");
}
