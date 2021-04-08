<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h3>Other Uploads</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Interpret</th>
                        <th scope="col">Songname</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require_once "dbh.inc.php";
                        $sql = "SELECT uID, uName, uInterpret FROM tblUpload WHERE uShowPublic == '1' ORDER BY RAND() LIMIT 5";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_row($result))
                        {
                            echo sprintf("<a href='%s'><tr><td>%s</td><td>%s</td></tr></a>", sprintf("play.php?id=%s",$row[0]), $row[1], $row[2]);
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>