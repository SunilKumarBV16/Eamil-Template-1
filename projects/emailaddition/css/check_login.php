<?php

$usernamee1=$_POST['username'];
$passworde1=$_POST['password'];

$servername = "localhost";
$username = "mathruh5_sunilbv";
$password = "Healthheal@123";
$dbname = "mathruh5_hrpeople";

// Create connection
$conn= new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql="SELECT * FROM users WHERE BINARY username='$usernamee1' and BINARY password='$passworde1'";

$result = $conn->query($sql);
$count=mysqli_num_rows($result);

 if($count==1){
        
		session_start();       
	    $_SESSION['name']= $usernamee1;
		
                header("location:emailindex.php");

    }else{

?>

<p> Incorrect Username or Password. </p>
<a href="index.html">Back </a>

<?php

}




 
?>