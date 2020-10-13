<?php session_start();
if(isset($_SESSION['login_user'])){
	header("Location:home.php");
}
include("index1.php");
?>

<?php include("Navbar.php")?>
<style>

.form-control {
	min-height: 41px;
	background: #fff;
	box-shadow: none !important;
	border-color: #e3e3e3;
}
.form-control:focus {
	border-color: #70c5c0;
}
.form-control, .btn {        
	border-radius: 2px;
}
.login-form {
	width: 350px;
	margin: -30px auto;
	padding: 100px 0 30px;		
}
.login-form form {
	color: #7a7a7a;
	border-radius: 2px;
	margin-bottom: 10px;
	font-size: 13px;
	background: #fff;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 30px;	
	position: relative;	
}
.login-form h2 {
	font-size: 22px;
	margin: 35px 0 25px;
}
.login-form .avatar {
	position: absolute;
	margin: 0 auto;
	left: 0;
	right: 0;
	top: -50px;
	width: 95px;
	height: 95px;
	border-radius: 50%;
	z-index: 9;
	background: #70c5c0;
	padding: 15px;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
}
.login-form .avatar img {
	width: 100%;
}	
.login-form input[type="checkbox"] {
	position: relative;
	top: 1px;
}
.login-form .btn, .login-form .btn:active {        
	font-size: 16px;
	font-weight: bold;
	background: #70c5c0 !important;
	border: none;
	margin-bottom: 20px;
}
.login-form .btn:hover, .login-form .btn:focus {
	background: #50b8b3 !important;
}    
.login-form a {
	color: #fff;
	text-decoration: underline;
}
.login-form a:hover {
	text-decoration: none;
}
.login-form form a {
	color: #7a7a7a;
	text-decoration: none;
}
.login-form form a:hover {
	text-decoration: underline;
}
.login-form .bottom-action {
	font-size: 14px;
}
</style>

<section class="container-fluid bg-light">
<div class="login-form">
    <form action="users.php" method="post">
		<div class="avatar">
			<img src="Login.png" alt="Avatar">
		</div>
        <h2 class="text-center">Member Login</h2> 
		<?php if(isset($_SESSION['login_error'])){?>
			<div class="alert alert-danger"> <?php echo $_SESSION['login_error'] ?></div>
		<?php } ?>
		<div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email Address" required="required">
        </div> 
		<div class="form-group">
            <input type="password" class="form-control" name="psw" placeholder="Password" required="required">
        </div>        
         
        <div class="form-group">
            <button name="sign-in" type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
        </div>
		<div class="bottom-action clearfix">
            <label class="float-left form-check-label"><input type="checkbox"> Remember me</label>
            <a href="resetPassword.php" class="float-right">Forgot Password?</a>
        </div>
		<br><br>
		<h6><p class="text-center small">Don't have an account? <a href="SignupForm.php">Sign up here!</a></p><h6>
	</form>
</div>
</section>