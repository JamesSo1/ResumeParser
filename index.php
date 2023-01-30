<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    *{
      text-align:center;
    }
  </style>
  <title>Resume Database</title>

  <!-- Using Bootstrap for CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<div class="jumbotron">
  <h1 class="display-4">Resume Database</h1>
  <p class="lead">Please send your resume as a <b>pdf</b> file!</p>
  <hr class="my-4">
  <p>Please limit your file size to less than <b>1GB</b></p>
  <form action="upload.php" method="POST" enctype="multipart/form-data">
  <input type="file" name="file">
  <button type="submit" name="submit" class="btn btn-primary">UPLOAD</button>
  <br>
  <br>
  <a href="displayResumes.php">Go to Resume Database</a>
</div>

</body>
</html>
