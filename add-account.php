<?php
error_reporting(0);
include('db.php');
if(isset($_POST['submit'])){
	
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$password=$_POST['password'];
	$confirm_password=$_POST['confirm_password'];
	
	
	  if($password=$confirm_password){
		 $pass=md5($password);
		  $sql=mysqli_query($con,"select * from accounts where phone='$phone'");
	if(mysqli_num_rows($sql) > 0){
		echo"<script>alert('User Already Exist')</script>";
	}else{
	
	$query=mysqli_query($con,"insert into accounts(username,email,phone,password)values('$name','$email','$phone','$pass')");
	  
	 } 
	
	 }else{
		  echo"<script>alert('Password Not Matched')</script>";
	  }
	  
	 if($query){ ?>
	
	 <script type="text/javascript">
alert("Account Created Successfully");
window.location.href = "login.php";
</script>
	<?php
	
}
	
}
?>