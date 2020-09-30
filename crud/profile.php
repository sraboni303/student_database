<?php   include_once "app/autoload.php"; ?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- bootstrap Link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>
    	img{
    		width: 200px;
    		height: 200px;
    		border: 10px solid #fff;
    		border-radius: 50%;
    		display: block;
    		margin: auto;
    	}
    	table td, th{
    		border: 1px solid #ddd;
    		text-align: center;
    	}

    </style>

</head>
<body>
		<div class="container w-50 my-5 py-5 shadow">
			<a href="students.php" class="btn btn-info">Back</a>
			<img class="shadow" src="images/<?php echo $all_data['photo']; ?>">
			<h2 class="text-center"> <?php echo $all_data['name']; ?> </h2>
			<h4 class="text-center"> <?php echo $all_data['uname']; ?> </h4>

			<br>
			<br>

			<table class="table">
				<tbody>
					<tr>
						<th>ID</th>
						<td> <?php echo $all_data['id']; ?> </td>
					</tr>

					<tr>
						<th>Location</th>
						<td> <?php echo $all_data['location']; ?> </td>
					</tr>

					<tr>
						<th>Cell</th>
						<td> <?php echo $all_data['cell']; ?> </td>
					</tr>

					<tr>
						<th>Email</th>
						<td> <?php echo $all_data['email']; ?> </td>
					</tr>

					<tr>
						<th>Age</th>
						<td> <?php echo $all_data['age']; ?> </td>
					</tr>

					<tr>
						<th>Gender</th>
						<td> <?php echo $all_data['gender']; ?> </td>
					</tr>

					<tr>
						<th>Shift</th>
						<td> <?php echo $all_data['shift']; ?> </td>
					</tr>

					<tr>
						<th>Password</th>
						<td> <?php echo $all_data['password']; ?> </td>
					</tr>

				</tbody>
			</table>

		</div>


</body>
</html>