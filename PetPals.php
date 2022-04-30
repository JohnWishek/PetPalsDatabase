<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PetPals Vetenarian</title>
</head>

<body>
	<h1>New Animal Entry</h1>
	<form method="post" action="" >

		<label for="name">Name</label><br>
		<input type="text" id="name" name="name"><br>

		<label for="species" >Species</label><br>
		<input type="text" id="species" name="species"><br>

		<label for="gender" >Gender (M/F)</label><br>
		<input type="text" id="gender" name="gender"><br>

		<label for="blood" >Blood Type</label><br>
		<input type="text" id="blood" name="blood"><br>

		<label for="birth" >Birth Date (YYYY-MM-DD)</label><br>
		<input type="text" id="birth" name="birth"><br>

		<input type="submit" value="Input">
	  </form>

	  <?php
	  $servername = "ecs-pd-proj-db.ecs.csus.edu";
	  $username = "CSC174156";
	  $password = "Csc134_546031729";
	  $dbname = "CSC174156";
	  
	  // Create connection
	  $conn = new mysqli($servername, $username, $password, $dbname);
	  
	  // Check connection
	  if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	  }
	  	if(isset($_POST["submit"])) {
			$stmt = $conn->prepare("INSERT INTO animal VALUES (?, ?, ?, ?, ?, ?)");
			$name = $_POST["name"];
			$species = $_POST["species"];
			$gender = $_POST["gender"];
			$blood_type = $_POST["blood"];
			$birth_date = $_POST["birth"];
			$animal_id = rand(0, 10000);

			if (empty($name)){
				$name = "NULL";
			}
			if (empty($species)){
				$species = "NULL";
			}
			if (empty($gender)){ 
				$gender = "NULL";
			}
			if (empty($blood_type)){
				$blood_type = "NULL";
			}
			if (empty($birth_date)) {
				$birth_date = "NULL";
			}
			echo "<h1>Hewwo</h1>"

			$stmt->bind_param("isssss", $animal_id, $name, $species, $gender, $blood_type, $birth_date);
			$stmt->execute();

		  }
		$conn->close();
	  ?>

</body>
</html>
