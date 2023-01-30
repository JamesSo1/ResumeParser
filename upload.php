<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>Document</title>
</head>

<?php
// Name of the button is submit
  if (isset($_POST['submit'])){
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    // Breaks the file name into its name and extension in an array
    $fileExt = explode('.', $fileName);
    
    // Use lower case just in case the extension is capitalized
    $fileActualExt = strtolower(end($fileExt));
    
    // Select what type of files you want to allow
    $allowed = array('pdf');

    // Checks if the actual extension is the same as one of the extensions in the allowed extensions array
    if (in_array($fileActualExt,$allowed)){
      if ($fileError === 0){
        // File size in kilobytes(kb)
        if ($fileSize < 1000000){
          // Actually start uploading the file; Creates unique id for file
          $fileNameNew = uniqid('',true).".".$fileActualExt;
          $fileDestination = 'uploads/'.$fileNameNew;
          move_uploaded_file($fileTmpName, $fileDestination);

          // Executes addResume.py to add resume info into "resumeData.json"
          $result =  shell_exec("/Library/Frameworks/Python.framework/Versions/3.11/bin/python3 /Applications/XAMPP/xamppfiles/htdocs/resumeparserapp/addResume.py 2>&1");
          ?>

          <!-- Successful file submission page -->
          <div class="d-flex align-items-center justify-content-center vh-100">
            <div class="text-center">
                <h1 class="display-1 fw-bold" style="font-size:3rem">File Successfully Submitted!</h1>
                <br>
                <a href="index.php" class="btn btn-primary">Go Back</a>
            </div>
        </div>
          <?php
        } else{
          ?>
          <div class="d-flex align-items-center justify-content-center vh-100">
            <div class="text-center">
                <h1 class="display-1 fw-bold">Error</h1>
                <p class="fs-3"> <span class="text-danger">Opps!</span> Your file is too big. Please try again!</p>
                <p class="lead">
                    
                  </p>
                <a href="index.php" class="btn btn-primary">Go Back</a>
            </div>
        </div>
          <?php
        }
      } else{
        ?>
        <!-- Error Page -->
        <div class="d-flex align-items-center justify-content-center vh-100">
            <div class="text-center">
                <h1 class="display-1 fw-bold">Error</h1>
                <p class="fs-3"> <span class="text-danger">Opps!</span> There was an error uploading your file! Please try again!</p>
                <p class="lead">
                    
                  </p>
                <a href="index.php" class="btn btn-primary">Go Back</a>
            </div>
        </div>
        <?php
      }
    } else{
      ?>
        <!-- Error Page -->
        <div class="d-flex align-items-center justify-content-center vh-100">
            <div class="text-center">
                <h1 class="display-1 fw-bold">Error</h1>
                <p class="fs-3"> <span class="text-danger">Opps!</span> The file you inputted is not valid. Please try again!</p>
                <p class="lead">
                    
                  </p>
                <a href="index.php" class="btn btn-primary">Go Back</a>
            </div>
        </div>
    <?php
    }

  }

  ?>