<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <title>serWm Sound</title>
    </head>
    <body>
        <div class="container">
            <h1>serWm Soundshare</h1><hr>
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Property</th>
                            <th scope="col">Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="file" name="fileToUpload" id="fileToUpload" accept=".mp3" required></td>
                            <td><button class="btn btn-primary" type="submit" value="Upload Soundfile" name="submit">Submit Upload</button></td>
                        </tr>
                        <tr>
                            <td>Interpret:</td>
                            <td><input type="text" name="tbxInterpret" placeholder="optional"></td>
                        </tr>
                        <tr>
                            <td>Song Name:</td>
                            <td><input type="text" name="tbxSongName" placeholder="optional"></td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </body>
</html>
