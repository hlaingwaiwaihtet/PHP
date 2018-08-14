<!DOCTYPE HTML>  
<html>
<head>
</head>
<body>  

<?php
// define variables and set to empty values
$name = $age = $gender = $nationality = $mgic_no = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $nationality = test_input($_POST["nationality"]);
  $age = test_input($_POST["age"]);
  $gender = test_input($_POST["gender"]);
}
$female = $male= "";
if($gender == "female") $female = "checked";
else if($gender == "male") $male = "checked";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Validation </h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
	<table border="0">
	  <tr><td>Name: </td><td><input type="text" name="name" value="<?php echo isset($_POST["name"])?$_POST["name"]:""; ?>" required></td></tr>
	  <tr><td>Nationality: </td><td><input type="text" name="nationality" value="<?php echo isset($_POST["nationality"])?$_POST["nationality"]:""; ?>"></td></tr>
	  <tr><td>Age: </td><td><input type="number" name="age" value="<?php echo isset($_POST["age"])?$_POST["age"]:""; ?>" required></td></tr>
	  <tr><td>Gender: </td><td>
	  <input <?php echo $female ?> type="radio" name="gender" value="female" required>Female
	  <input <?php echo $male ?> type="radio" name="gender" value="male" required>Male
	  </td></tr>
	<table>
	<input type="submit" name="submit" value="Submit"><br><br>
</form>

<?php
switch($gender) {
	case "male": $sex = "Mg "; break;
	case "female": $sex = "Ma "; break;
	default: $sex="";
}
$mgic_no = strlen($name)*$age;
if($age>18) {
	echo "Mingalarpar ";
	echo $sex.$name;
	if(!empty($nationality)) echo " from ".$nationality;
	echo ". <br>";
	echo "Your magic number is ".$mgic_no.".";
} else if($age>0 && $age<=18) {
	echo "You must be older than 18. ";
}
?>

</body>
</html>
