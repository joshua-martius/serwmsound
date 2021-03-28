<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <title>serWm Soundshare</title>
   	<link rel="shortcut icon" href="https://serwm.com/favicon_rund.ico">
    </head>
    <body>
        <script src="./draganddrop.js"></script>
        <div class="drop-zone" style="position: fixed;padding: 0;margin: 0;top: 0; left: 0;width: 100%;height: 100%;">
            <div class="container">
                <h1>serWm Soundshare</h1>
		<small>
		<?php
			require_once "dbh.inc.php";
			$sql = "SELECT COUNT(uID) FROM tblUpload";
			$row = mysqli_fetch_row(mysqli_query($conn, $sql));
			echo "Hosting " . $row[0] . " Sound files right now!</small><br>";
			if(isset($_GET["msg"]))
			{
				echo "<div class='alert alert-danger'>";
				switch($_GET["msg"])
				{
					case "entrynotfound":
						echo "Given ID doesnt exist virtually!";
						break;
					case "filenotfound":
						echo "Given ID doesnt exist physically.";
						break;
					case "noidgiven":
						echo "Missing ID in URL.";
						break;
					default:
						echo "Unknown message.";
						break;
				}
				echo "</div>";
			}
		?>
		<hr>
                <form id="frmUploader" name="frmUploader" action="upload.php" method="post" enctype="multipart/form-data">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Property</th>
                                <th scope="col">Value</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Interpret:</td>
                                <td><input class="form-control" type="text" name="tbxInterpret" placeholder="optional"></td>
                            </tr>
                            <tr>
                                <td>Song Name:</td>
                                <td><input class="form-control" type="text" name="tbxSongName" placeholder="optional"></td>
                            </tr>
			    <tr>
				<td>Lyrics:</td>
				<td><textarea class="form-control" name="tbxLyrics" placeholder="optional"></textarea></td>
			    </tr>
                            <tr>
                                <td><input type="file" name="fileToUpload" id="fileToUpload" accept=".mp3" class="drop-zone__input" required></td>
                                <td>
                                    <button class="btn btn-primary" type="submit" value="btnSubmit" name="btnSubmit">Submit Upload</button>
                                    <button class="btn btn-secondary" type="reset" value="btnClear" name="btnClear">Clear Form</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>
