<?php
session_start();
$admin_id= isset($_SESSION['admin_id']);
if ($admin_id){
    header('Location: admin_master.php');
}

if (isset($_POST['btn'])) {
    require '../classes/admin.php';
    $obj_admin = new Admin();
    $massage=$obj_admin->admin_login_check($_POST);
}
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Admin Panel  | the independent</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
 <link href="../assets/admin_assets/login/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="../assets/admin_assets/login/css/style.css" rel='stylesheet' type='text/css' />
<link href="../assets/admin_assets/login/css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="../assets/admin_assets/login/js/jquery.min.js"></script>
<!----webfonts--->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<!---//webfonts--->  
<!-- Bootstrap Core JavaScript -->
<script src="../assets/admin_assets/login/js/bootstrap.min.js"></script>
</head>
<body id="login">
  <div class="login-logo">
      <a href="../index.php"><img src="../assets/front_end_assets/images/main_logo.gif" alt=""/></a>
  </div>
  <h2 class="form-heading">login</h2>
  <div class="app-cam">
      <form action="" method="post">
              <input type="text" name="email_address" class="text" value="E-mail address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'E-mail address';}">
              <input type="password" name="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
              <div class="submit"><input type="submit" name="btn" onclick="myFunction()" value="Login"></div>
		
		<ul class="new">
			<li class="new_left"><p></p></li>
                        <li class="new_right"><p class="sign"><a href="../index.php">&larrhk; Back to The Independent</a></p></li>
			<div class="clearfix"></div>
		</ul>
	</form>
  </div>
   <div class="copy_layout login">
      <p>Copyright &copy; 2016 The Independent. All Rights Reserved | Developed by <a href="http://facebook.com/maruf.h.bd" target="_blank">MD. Maruf Hossain</a> </p>
   </div>
</body>
</html>
