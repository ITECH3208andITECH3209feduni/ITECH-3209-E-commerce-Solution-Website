<style>
body {
    color: #fff;
    font-family: 'Istok Web', sans-serif;
    background: #0f0c29;
    /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #24243e, #302b63, #0f0c29);
    /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #24243e, #302b63, #0f0c29);
    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

}

.form-control {
    font-size: 15px;
}

.form-control,
.form-control:focus,
.input-group-text {
    border-color: #e1e1e1;
}

.form-control,
.btn {
    border-radius: 3px;
}

.signup-form {
    width: 400px;
    margin: -13px auto;
    padding: 30px 0;
}

.signup-form form {
    color: #999;
    border-radius: 3px;
    margin-bottom: 15px;
    background: #fff;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 30px;
}

.signup-form h4 {
    color: #333;
    font-weight: bold;
    margin-top: 0;
}

.signup-form hr {
    margin: 0 -30px 20px;
}

.signup-form .form-group {
    margin-bottom: 20px;
}

.signup-form label {
    font-weight: normal;
    font-size: 15px;
}

.signup-form .form-control {
    min-height: 38px;
    box-shadow: none !important;
}

.signup-form .input-group-addon {
    max-width: 42px;
    text-align: center;
}

.signup-form .btn,
.signup-form .btn:active {
    font-size: 16px;
    font-weight: bold;
    background: #19aa8d !important;
    border: none;
    min-width: 140px;
}

.signup-form .btn:hover,
.signup-form .btn:focus {
    background: #179b81 !important;
}

.signup-form a {
    color: #fff;
    text-decoration: underline;
}

.signup-form a:hover {
    text-decoration: none;
}

.signup-form form a {
    color: #19aa8d;
    text-decoration: none;
}

.signup-form form a:hover {
    text-decoration: underline;
}

.signup-form .fa {
    font-size: 21px;
}

.signup-form .fa-paper-plane {
    font-size: 18px;
}

.signup-form .fa-check {
    color: #fff;
    left: 17px;
    top: 18px;
    font-size: 7px;
    position: absolute;
}
</style>
</head>

<body>
    <h3 style="text-align:center; margin-top:12px; font-family: 'Source Serif Pro', serif;">E-commerce Solution</h3>
    <div class="signup-form">
        <form action="password.php" method="post">
            <h4>Forget Password?</h4>
            <p>Please fill in this form to change your password!</p>
            <hr>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <span class="fa fa-user"></span>
                        </span>
                    </div>
                    <input type="text" class="form-control" name="uname" placeholder="Username" required="required">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-paper-plane"></i>
                        </span>
                    </div>
                    <input type="email" class="form-control" name="email" placeholder="Email Address"
                        required="required">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-lock"></i>
                        </span>
                    </div>
                    <input type="password" class="form-control" name="psw" placeholder="Password" required="required">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-lock"></i>
                            <i class="fa fa-check"></i>
                        </span>
                    </div>
                    <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password"
                        required="required">
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg">Login</button>
            </div>
        </form>

        <div class="text-center">Remember your password? <a href="Login.php">Login here</a></div>
    </div>