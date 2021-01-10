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

if(isset($_POST['submit']))
{
        $file = $_FILES["fileToUpload"];
        $fileName = $file["name"];
        $fileSize = $file["size"];
        $fileType = $file["type"];
	$tmpFileName = $file["tmp_name"];

        if($fileSize < 10000000)
        {
		$fullPath = "";
		$newDbName = "";
		do
		{
			$newDbName = RandomString(16);
			$newFileName = $newDbName . ".mp3";
			$fullPath = "uploads/" . $newFileName;
		} while(file_exists($fullPath));

		move_uploaded_file($tmpFileName, $fullPath);
        	header("Location: play.php?id=" . $newDbName);
	}
}
