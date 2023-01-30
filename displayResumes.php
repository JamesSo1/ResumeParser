<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resume Database</title>
  <style>
    .jumbotron{
      text-align:center;
    }
  </style>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


</head>
<body>
<div class="jumbotron">
  <h1 class="display-4">Resume Database</h1>
  <p class="lead">Please enter keywords as comma seperated values!(i.e. computer, education)</p>

  <!-- search box/input -->
  <form action="search.php" method="POST">
    <input type="text" name="searchterm" placeholder="Search...">
    <input type="submit" value="Search">
    <br><br>
    <a  href="index.php">Go back to file submission page</a>

  <!-- table of resumes all submitted resumes -->
</div>
  <table class="table table-striped">
    <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">ID</th>
      <th scope="col">Action</th>
    </tr>
</thead>
  <tbody>
    <?php
      // convert json file contents into an array
      $json_data = file_get_contents("resumeData.json");
      $resumes = json_decode($json_data, true);

      // input each resume into the table for display
      if (count($resumes) != 0){
        foreach($resumes as $resume){
          $wordArr = explode(" ",$resume['content']);
          $id = $resume['id'];
          ?>
          <tr>
            <td scope="row"><?php echo ($wordArr[0]." ".$wordArr[1]) ?> </td>
            <td><?php echo $id ?></td>
            <td>
            <!-- link to pdf of resume -->
            <a href='<?php echo 'uploads/'.$id.'.pdf' ?>' target='__blank'>View Resume</a>
          </td>
    </tr>
        </tbody>
          <?php
        }
      }
    ?>
    
  </table>
</body>
</html>