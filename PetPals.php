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
