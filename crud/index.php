<?php   include_once "app/autoload.php"; ?>

<?php 
/**
  * Form isseting:
  **/
if ( isset($_POST['send']) ) {

  /**
  *  Get Values:
  **/
  $name = $_POST['name'];
  $uname = $_POST['uname'];
  $email = $_POST['email'];
  $cell = $_POST['cell'];
  $age = $_POST['age'];
  $pass = $_POST['pass'];
  
  if ( isset($_POST['gender']) ) {
    $gender = $_POST['gender'];
  }

  $location = $_POST['location'];
  $shift = $_POST['shift'];
  $pass = $_POST['pass'];


  /**
  * Image Information:
  **/
  $file_name = $_FILES['photo']['name'];
  $file_tmp_name = $_FILES['photo']['tmp_name'];
  $file_size = $_FILES['photo']['size'];

  $unique_file_name = md5( time() . $file_tmp_name . $file_name . rand() );

   /**
  * Form Validation:
  **/
  if ( empty($name) || empty($uname) || empty($email) || empty($age) || empty($gender) || empty($location) || empty($pass) ) {
    
    $notice = validation_notice('Fill the required fields');

  }elseif ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
    
    $notice = validation_notice('Invalid Email Address!', 'warning');

  }elseif ( $age <=17 || $age >= 31 ) {
    
    $notice = validation_notice('Your age is not suitable', 'info');

  }else{

    $sql = "INSERT INTO students (name, uname, email, cell, age, gender, location, shift, password, photo) VALUES ('$name', '$uname', '$email', '$cell', '$age', '$gender', '$location', '$shift', '$pass', '$unique_file_name')";
    $connection -> query($sql);

    move_uploaded_file($file_tmp_name, "images/" . $unique_file_name);

    $notice = validation_notice('Registration successful', 'success');
  }

}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- bootstrap Link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Sign Up Form</title>
  </head>
  <body>

    <!-- Form Design -->
    <div class="container w-50 my-5">
      <a href="students.php" class="btn btn-sm btn-danger">See Students</a>
      

      <div class="card py-5 shadow">
        <div class="card-body">
          <h2>Sign Up Form</h2>
          
        <?php 
            if (isset($notice)) {
              echo $notice;
            }
        ?>

      <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label>Name</label>
          <input class="form-control" type="text" name="name">
        </div>

        <div class="form-group">
          <label>Username</label>
          <input class="form-control" type="text" name="uname">
        </div>

        <div class="form-group">
          <label>E-mail</label>
          <input class="form-control" type="text" name="email">
        </div>

        <div class="form-group">
          <label>Cell</label>
          <input class="form-control" type="text" name="cell">
        </div>

        <div class="form-group">
          <label>Age</label>
          <input class="form-control" type="text" name="age">
        </div>

        <div class="form-group">
          <label>Gender</label> <br>
          <input type="radio" name="gender" value="Male">Male
          <input type="radio" name="gender" value="Female">Female
        </div>

        <div class="form-group">
          <label>Location</label> 
          <select class="form-control" name="location">
            <option value="">-Select-</option>
            <option value="Dhaka">Dhaka</option>
            <option value="Chittagong">Chittagong</option>
            <option value="Barishal">Barishal</option>
            <option value="Khulna">Khulna</option>
            <option value="Mymensingh">Mymensingh</option>
            <option value="Rajshahi">Rajshahi</option>
            <option value="Rangpur">Rangpur</option>
            <option value="Sylhet">Sylhet</option>
          </select>
        </div>

        <div class="form-group">
          <label>Shift</label>
          <select class="form-control" name="shift">
            <option value="">-Select-</option>
            <option value="Morning">Morning</option>
            <option value="Day">Day</option>
            <option value="Evening">Evening</option>
            <option value="Night">Night</option>
          </select>
        </div>

        <div class="form-group">
          <label>Password</label>
          <input class="form-control" type="text" name="pass">
        </div>

        <div class="form-group">
          <label>Photo</label>
          <input class="form-control-file" type="file" name="photo">
        </div>

        <div class="form-group">
          <input class="btn btn-success" type="submit" name="send" value="Sign Up">
        </div>

      </form>

        </div>
      </div>
    </div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

















    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>