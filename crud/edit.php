<?php   include_once "app/autoload.php"; ?>

<?php 

      /**
       * value isseting
       */

      if (isset($_POST['send'])) {
        
        $edit_id = $_GET['edit_id'];

        $name = $_POST['name'];
        $uname = $_POST['uname'];
        $email = $_POST['email'];
        $cell = $_POST['cell'];
        $age = $_POST['age'];
        
          if (isset($_POST['gender'])) {
               $gender = $_POST['gender'];
          }

        $location = $_POST['location'];
        $shift = $_POST['shift'];

 /**
 * Form Validation:
 */
  if ( empty($name) || empty($uname) || empty($email) || empty($age) || empty($gender) || empty($location) ) {
    
    $notice = validation_notice('Fill the required fields');

  }elseif ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
    
    $notice = validation_notice('Invalid Email Address!', 'warning');

  }elseif ( $age <=17 || $age >= 31 ) {
    
    $notice = validation_notice('Your age is not suitable', 'info');

  }else{

        $photo_name = '';

        if (empty($_FILES['new_photo']['name'])) {
            
            $photo_name = $_POST['old_photo'];
        }else{

             /**
             * Image Information:
             */
              $file_name = $_FILES['new_photo']['name'];
              $file_tmp_name = $_FILES['new_photo']['tmp_name'];
              $file_size = $_FILES['new_photo']['size'];

              $photo_name = md5( time() . $file_tmp_name . $file_name . rand() );  
              move_uploaded_file($file_tmp_name, 'images/'. $photo_name);
          }

          $sql = "UPDATE students SET name='$name', uname='$uname', email='$email', cell='$cell', age='$age', gender='$gender', location='$location', shift='$shift', photo='$photo_name' WHERE id='$edit_id' ";

          $connection -> query($sql);

          $notice = validation_notice('Data Updated', 'success');
      }
   }

 ?>

 <?php 

     /**
     * Edit Page
     */
      if ( isset($_GET['edit_id']) ) {
           
           $edit_id = $_GET['edit_id'];

           $sql = "SELECT * FROM students WHERE id='$edit_id'";

           $edit_data = $connection -> query($sql);

           $edit_single_data = $edit_data -> fetch_assoc();
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
    <div class="container w-50 p-5 my-5 shadow">
      <a href="students.php" class="btn btn-sm btn-danger">Back</a>

        <?php 
          if (isset($notice)) {
            echo $notice;
          }
        ?>

      <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label>Name</label>
          <input class="form-control" type="text" name="name" value="<?php echo $edit_single_data['name']; ?>">
        </div>

        <div class="form-group">
          <label>Username</label>
          <input class="form-control" type="text" name="uname" value="<?php echo $edit_single_data['uname']; ?>">
        </div>

        <div class="form-group">
          <label>E-mail</label>
          <input class="form-control" type="text" name="email" value="<?php echo $edit_single_data['email']; ?>">
        </div>

        <div class="form-group">
          <label>Cell</label>
          <input class="form-control" type="text" name="cell" value="<?php echo $edit_single_data['cell']; ?>">
        </div>

        <div class="form-group">
          <label>Age</label>
          <input class="form-control" type="text" name="age" value="<?php echo $edit_single_data['age']; ?>">
        </div>

        <div class="form-group">
          <label>Gender</label> <br>
          <input <?php if($edit_single_data['gender'] == 'Male'){ echo "checked"; } ?> type="radio" name="gender" value="Male">Male
          <input <?php if($edit_single_data['gender'] == 'Female'){ echo "checked"; } ?> type="radio" name="gender" value="Female">Female
        </div>

        <div class="form-group">
          <label>Location</label> 
          <select class="form-control" name="location">
            <option value="">-Select-</option>
            <option <?php if($edit_single_data['location'] == 'Dhaka'){echo 'selected';} ?> value="Dhaka">Dhaka</option>

            <option <?php if($edit_single_data['location'] == 'Chittagong'){echo 'selected';} ?> value="Chittagong">Chittagong</option>

            <option <?php if($edit_single_data['location'] == 'Barishal'){echo 'selected';} ?> value="Barishal">Barishal</option>

            <option <?php if($edit_single_data['location'] == 'Khulna'){echo 'selected';} ?> value="Khulna">Khulna</option>

            <option <?php if($edit_single_data['location'] == 'Mymensingh'){echo 'selected';} ?> value="Mymensingh">Mymensingh</option>

            <option <?php if($edit_single_data['location'] == 'Rajshahi'){echo 'selected';} ?> value="Rajshahi">Rajshahi</option>

            <option <?php if($edit_single_data['location'] == 'Rangpur'){echo 'selected';} ?> value="Rangpur">Rangpur</option>

            <option <?php if($edit_single_data['location'] == 'Sylhet'){echo 'selected';} ?> value="Sylhet">Sylhet</option>
          </select>
        </div>

        <div class="form-group">
          <label>Shift</label>
          <select class="form-control" name="shift">
            <option value="">-Select-</option>
            <option <?php if($edit_single_data['shift'] == 'Morning'){echo 'selected';} ?> value="Morning">Morning</option>

            <option <?php if($edit_single_data['shift'] == 'Day'){echo 'selected';} ?> value="Day">Day</option>

            <option <?php if($edit_single_data['shift'] == 'Evening'){echo 'selected';} ?> value="Evening">Evening</option>

            <option <?php if($edit_single_data['shift'] == 'Night'){echo 'selected';} ?> value="Night">Night</option>
            
          </select>
        </div>



        <div class="form-group">
          <img style="width: 200px;" src="images/<?php echo $edit_single_data['photo'] ?>">
          <input name="old_photo" value="<?php echo $edit_single_data['photo']; ?>" type="hidden">
        </div> 

        <div class="form-group">
          <label>Photo</label>
          <input class="form-control-file" type="file" name="new_photo">
        </div>



        <div class="form-group">
          <input class="btn btn-success" type="submit" name="send" value="Update Now">
        </div>

      </form>
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