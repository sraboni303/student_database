<?php 

     /**
     * Validation Error Function:
     */
      function validation_notice($notice, $type= 'danger'){
        return '<p class="alert alert-' .$type. '">' . $notice .  ' <button class="close" data-dismiss="alert"> &times; </button> </p>';
      }


     /**
     * DINAMIC PROFILE
     */
    if (isset($_GET['profile_id'])) {
          
          $profile_id = $_GET['profile_id'];

          $sql = "SELECT * FROM students WHERE id='$profile_id'";
          $data = $connection -> query($sql);

          $all_data = $data -> fetch_assoc();
      }


     /**
     * Delete user data
     */
      if (isset($_GET['delete_id'])) {
            
            $delete_id = $_GET['delete_id'];
            $delete_photo = $_GET['photo'];

            $sql = "DELETE FROM students WHERE id='$delete_id'";
            $connection -> query($sql);

            unlink('images/' . $delete_photo);

            header( "location:students.php" );
      }


     /**
     * Active a user:
     */
      if ( isset($_GET['active_id']) ) {
           
           $active_id = $_GET['active_id'];

           $sql = "UPDATE students SET status='active' WHERE id='$active_id'";
           $connection -> query($sql);

           header("location:students.php");
      }

 
     /**
     * Inactive a user:
     */
      if ( isset($_GET['inactive_id']) ) {
           
           $inactive_id = $_GET['inactive_id'];

           $sql = "UPDATE students SET status='inactive' WHERE id='$inactive_id'";
           $connection -> query($sql);

           header("location:students.php");
      }


 


 ?>