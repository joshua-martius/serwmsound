<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    </head>
    <body>
	<h2>Other Uploads</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Interpret</th>
			<th scope="col">Filename</th>
			<th scope="col">Hits</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require_once "dbh.inc.php";
                        $sql = "SELECT uID, uInterpret, uName,uHits FROM tblUpload WHERE uShowPublic = '1' ORDER BY RAND() LIMIT 10";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_row($result))
                        {
                            echo sprintf("<tr><th>%s</th><th><a href='%s'>%s</th><th>%d</th></tr>", $row[1] ,sprintf("play.php?id=%s",$row[0]), $row[2], $row[3]);
                        }
                    ?>
                </tbody>
            </table>
    </body>
</html>
