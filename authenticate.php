<?php
session_start();
include('db.php');
// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if ( !isset($_POST['phone'], $_POST['password']) ) {
	// Could not get the data that should have been sent.
	exit('Please fill both the phone and password fields!');
}
// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE phone = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the phone is a string so we use "s"
	$stmt->bind_param('i', $_POST['phone']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();


}

if ($stmt->num_rows > 0) {
	$stmt->bind_result($id, $password);
	$stmt->fetch();
	// Account exists, now we verify the password.
	// Note: remember to use password_hash in your registration file to store the hashed passwords.
	if (md5($_POST['password'], $password)) {
		// Verification success! User has logged-in!
		// Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $_POST['username'];
		$_SESSION['phone'] = $_POST['phone'];
		$_SESSION['id'] = $id; 
		
		?>
		 <script type="text/javascript">
alert("Logged in Successfully");
window.location.href = "index.php";
</script>
<?php	} else {
		// Incorrect password
		echo 'Incorrect phone and/or password!';
	}
} else {
	// Incorrect phone
	echo 'Incorrect phone and/or password!';
}
?>