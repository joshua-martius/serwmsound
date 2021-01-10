<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<div class="container">
<center><h3>Comment Section</h3></center>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Author</th>
                <th scope="col">Comment</th>
		<th scope="col">Written at</th>
            </tr>
        </thead>
        <tbody>
		<tr>
			<form method="post" action="sendComment.php">
				<input name="tbxID" type="hidden" value="<?php echo $id; ?>">
				<td><input type="text" name="tbxAuthor" maxlength="16" style="width: 100%;" required></td>
				<td>
					<textarea name="tbxComment" style="width: 100%;" required></textarea>
				</td>
				<td><button type="submit" class="btn btn-primary" style="width: 100%;">Send Comment</button>
			</form>
		</tr>
		<?php
			require_once "dbh.inc.php";
			$sql = sprintf("SELECT cAuthor, cComment, cCreatedAt FROM tblComment WHERE cUploadID = '%s'", $id);
			$result = mysqli_query($conn, $sql);
			while($row = mysqli_fetch_row($result))
			{
				echo sprintf("<tr><td>%s</td><td>%s</td><td>%s</td></tr>", $row[0],$row[1],$row[2]);
			}
		?>
        </tbody>
    </table>
</div>
