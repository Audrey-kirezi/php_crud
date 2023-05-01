
<?php
include 'connection.php';
$firstname="";
$lastname="";
$email="";
$password="";
$errorMessage="";
$successMessage="";

if($_SERVER['REQUEST_METHOD']== 'POST'){
 $firstname=$_POST["firstname"];
$lastname=$_POST["lastname"];
$email=$_POST["email"];
$password=$_POST["password"];
$password1= md5($password);

do {
  if(empty(($firstname)||($lastname)||($email)||($password))){
    $errorMessage= "All fields are required";
    break;
  }

  $sql= "INSERT INTO users(firstname,lastname,email,password)" . "VALUES('$firstname','$lastname','$email','$password1')";

  $result = $conn->query($sql);
  if(!$result){
    $errorMessage = "Invalid query: ".$conn->error;
    break;
  }
  $firstname="";
  $lastname="";
  $email="";
  $password="";

  $successMessage="New record added successfully";

  header("location: /audrey/CRUD_OPERATIONS/index.php");
  exit;

}
while(false);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">

    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script> 
</head>
<body>
   <div class="container my-5">
    <h2>New student</h2>
    <?php
       if(!empty($errorMessage)){
        echo " <div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>$errorMessage</strong>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
        ";
    }
    ?>
    <form method="POST">
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">First Name</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="firstname" value="<?php echo $firstname; ?>">
            </div>
        </div>
      
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Last Name</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="lastname" value="<?php echo $lastname; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Password</label>
            <div class="col-sm-6">
                <input type="password" class="form-control" name="password" value="<?php echo $password; ?>">
            </div>
        </div>

        <?php
         if(!empty($successMessage)){
            echo " <div class='row mb-3'>
            <div class='offset-sm-3 col-sm-6'>
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>$successMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            </div>
            </div>
            ";
         }
        ?>
        <div class="row mb-3">
    <div class="offset-sm-3 col-sm-3 d-grid">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    <div class="col-sm-3 d-grid">
      <a class="btn btn-outline-primary" href="./index.php" role="button">Cancel</a>
    </div>
 </div>
    </form>
   </div> 
</body>
</html>