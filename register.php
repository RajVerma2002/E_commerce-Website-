<?php


?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="css/form.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6 form-block px-4">
				<div class="col-lg-8 col-md-6 col-sm-8 col-xs-12 form-box">
					<div class="text-center mb-3 mt-5">
						LOGO
					</div>
					<h4 class="text-center mb-4">
						Create an account
					</h4>
					<form method="post" name="myForm" action="add-account.php" method="post" onsubmit="return validateForm()" >
						<div class="form-input">
							<span><i class="fa fa-user-o"></i></span>
							<input type="text" name="name" placeholder="Full Name" required>
						</div>
						<div class="form-input">
							<span><i class="fa fa-envelope-o"></i></span>
							<input type="email" name="email" placeholder="Email Address" tabindex="10" required>
						</div>
						
						<div class="form-input">
							<span><i class="fa fa-phone"></i></span>
							<input type="text" name="phone" placeholder="Phone Number" id="mobile-num"  required>
						</div>
						
						<div class="form-input">
							<span><i class="fa fa-key"></i></span>
							<input type="password" name="password" placeholder="Create Password" required>
						</div>
						
						<div class="form-input">
							<span><i class="fa fa-key"></i></span>
							<input type="password" name="confirm_password" placeholder="confirm Password" required>
						</div>
							
				

						<div class="mb-3"> 
							<button type="submit" name="submit" class="btn btn-block">
								Register
							</button>
						</div>

					
							
						<div class="text-center mb-5">
							Already have an account 
							<a class="login-link" href="login.php">Login here</a>
						</div>
					</form>
				</div>
			</div>

			<div class="col-lg-6 d-none d-lg-block image-container"></div>
		</div>
	</div>
	
	<script>
	function validateForm() {
  
  if (document.forms["myForm"]["name"].value == "") {
    alert("Name must be filled out");
	
    return false;
  }
  if (!isNaN(document.forms["myForm"]["name"].value)) {
    alert("Only Characters are allowed");
	
    return false;
  }
  if (document.forms["myForm"]["email"].value == "") {
    alert("Email must be filled out");
	
    return false;
  }
  if (!document.forms["myForm"]["email"].value.match(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/)) {
    alert("invalid must be filled out");
	
    return false;
  }
  if (document.forms["myForm"]["phone"].value == "") {
    alert("Phone must be filled out");
	
    return false;
  }if (isNaN(document.forms["myForm"]["phone"].value)) {
    alert("Only Numbers are allowed");
	
    return false;
  }
  if (document.forms["myForm"]["password"].value == "") {
    alert("Password must be filled out");
	
    return false;
  }
  if (document.forms["myForm"]["confirm_password"].value == "") {
    alert("Confirm password must be filled out");
	
    return false;
  }
  if (document.forms["myForm"]["password"].value != document.forms["myForm"]["confirm_password"].value) {
    alert("Password must be equal");
	
    return false;
  }
  
}
	
$(document).ready(function (e) {
  $("#mobile-num").on("blur", function(){
        var mobNum = $(this).val();
        var filter = /^\d*(?:\.\d{1,2})?$/;

          if (filter.test(mobNum)) {
            if(mobNum.length==10){

              
             } else {
                alert('Please Enter 10  digit mobile number');
                return false;
              }
            }
            else {
              alert('Not a Valid Mobile Number, Please Enter Valid Mobile number   Text not allowed use numbers only');
              
              return false;
           }
    
  });
}
</script>
</body>
</html>