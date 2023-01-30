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

  <!-- Using Bootstrap for CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


</head>
<body>
<?php
    // function used to search for a keyword/ multiple keywords in the array containing resume data
    function search_resume($resumes, $search_terms){
    $matches = [];
    foreach ($resumes as $resume){
      foreach($search_terms as $search_term){
        // checks to see if the resume includes ALL the keywords given 
        if (!(str_contains($resume["id"], $search_term)) and !(str_contains($resume["content"], $search_term))){
          break;
        }
        if ($search_term == end($search_terms)){
          array_push($matches, $resume);
        }
        }
      }
      return $matches;
    }

    $json_data = file_get_contents("resumeData.json");
    $resumes = json_decode($json_data, true);

    // converts the string of comma seperated search terms into an array
    $search_terms = explode (",", trim($_POST['searchterm']));

?>

<div class="jumbotron">
  <h1 class="display-4">Resume Database</h1>
  <p class="lead">Please enter keywords as comma seperated values!(i.e. computer, education)</p>
  <form action="search.php" method="POST">
    <input type="text" name="searchterm" placeholder="Search...">
    <input type="submit" value="Search">
    <br><br>
    <a  href="index.php">Go back to file submission page</a>

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
    // use the search_resume function to filter the resumes and display the result in table
    $valid_resumes = search_resume($resumes, $search_terms);
    if (count($valid_resumes) != 0){
      foreach($valid_resumes as $valid_resume){
        $word_arr = explode(" ",$valid_resume['content']);
        $id = $valid_resume['id'];
        ?>
        <tr>
          <td scope="row"><?php echo ($word_arr[0]." ".$word_arr[1]) ?> </td>
          <td><?php echo $id ?></td>
          <td>
          <!-- Actions -->
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
