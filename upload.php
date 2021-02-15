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
            try
            {
                $interpret = $_POST["tbxInterpret"];
                $name = $_POST["tbxSongName"];
		if($name == "") $name = $fileName;
            }
            catch(Exception $e){}

            $sql = sprintf("INSERT INTO tblUpload(uID, uUploaderIP, uInterpret, uName) VALUES ('%s','%s','%s','%s')", $newDbName, $_SERVER["REMOTE_ADDR"], $interpret, $name);
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
