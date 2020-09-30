<?php   include_once "app/autoload.php"; ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<style>
	img{
		width: 50px;
		height: 50px;
	}
</style>
<body>
	<div class="container my-5 py-5">
		<a href="index.php" class="btn btn-info">Back</a>
		<div class="card">
			<div class="card-body shadow">
				<table class="table table-striped">
					<thead class="thead-dark">
						<tr>
							<th>No.</th>
							<th>Name</th>
							<th>ID</th>
							<th>Photo</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php 

								$sql = " SELECT * FROM students ";
								$data = $connection -> query($sql);
								$i = 1;

								while ( $students = $data -> fetch_assoc() ) {
								
							 ?>
						<tr>
							<td> <?php echo $i; $i++; ?> </td>
							<td> <?php echo $students['name']; ?> </td>
							<td> <?php echo $students['id']; ?> </td>
							<td>								
					            <img src="images/<?php echo $students['photo'] ?>" alt="">
							</td>

							<td>
								<?php if($students['status'] == 'inactive') : ?>
									<a class="btn btn-sm btn-dark" href="?active_id=<?php echo $students['id']; ?>">active</a>
								<?php elseif($students['status'] == 'active') : ?>
									<a class="btn btn-sm btn-success" href="?inactive_id=<?php echo $students['id']; ?>">inactive</a>
								<?php endif; ?>


								<a href="profile.php?profile_id=<?php echo $students['id']; ?>" class="btn btn-sm btn-warning" >View</a>
								<a href="edit.php?edit_id=<?php echo $students['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
								<a id="delete_btn" href="?delete_id=<?php echo $students['id']; ?>&photo=<?php echo $students['photo']; ?> " class="btn btn-sm btn-danger">Delete</a>
							</td>
						</tr>

					<?php } ?>

					</tbody>
				</table>
			</div>
		</div>
	</div>



<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<script>
	$('a#delete_btn').click(function(){
		let conf = confirm('Are you sure ?');
		if ( conf == true ) {
			return true;
		}else{
			return false;
		}
	});
</script>

</body>
</html>

