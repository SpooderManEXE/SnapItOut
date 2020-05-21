<!doctype html>
<body>
<?php
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$pass=$_POST['password'];
$servername = "localhost";
$db="shop";
$username = "root";
$password = "root";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
    die("window.alert('Connection failed: ' . $conn->connect_error)");
}


$sql = "INSERT INTO login VALUES ('$name', '$email', $phone,'$pass')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>





</body>
</html>
