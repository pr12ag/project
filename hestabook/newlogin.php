<?php 

if(isset($user)){
    header("location:home.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login with registration - Bootsnipp.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="#" class="active" id="login-form-link">Login</a>
                            </div>
                            <div class="col-xs-6">
                                <a href="#" id="SignUp-form-link">SignUp</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                        <form id="login-form" action="login.php" method="post" role="form" style="display: block;">
                                    <div class="form-group">
                    <input type="email" name="email" id="Email" tabindex="1" class="form-control" placeholder="Email" value="" onblur="validateEmail(this)" required>
                                    </div>
                                <div class="form-group">
                <input type="password" name="password" id="passwordlogin" tabindex="2" class="form-control" placeholder="Password" required>
                                    </div>
                                    <!--<div class="form-group text-center">
                                <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                        <label for="remember"> Remember Me</label>
                                    </div>-->
                                    <div class="form-group">
                                        <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
        <input type="submit" name="loginsubmit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                                            </div>
                                        </div>
                                    </div>
                                    <!--<div class="form-group">
                                            <div class="row">
                                               <div class="col-lg-12">
                                                <div class="text-center">
                                         <a href="forget.php" tabindex="5" class="forgot-password">Forgot Password?</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>-->
                                </form>
                        <form id="SignUp-form" action="signup.php" method="POST" role="form" style="display: none;">
                                    <div class="form-group">
            <input type="text" name="name" id="name" tabindex="1" class="form-control" placeholder="name" value="" required>
                                    </div>
                                    <div class="form-group">
            <input type="email" name="email" id="email" tabindex="2" class="form-control" placeholder="email" value="" onblur="validateEmail(this);"" required>
                                    </div>
                                    <div class="form-group">
                <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="password" required>
                                    </div>                                    
                                <div class="form-group">
            <input type="password" id="confirm_password" tabindex="1" class="form-control" placeholder="confirm password" value="" required>
            <span id='message'></span>
                                    </div>
                                <div class="form-group">
                <input type="number" name="number" id="number" tabindex="2" class="form-control" placeholder="Mobile No." required>
                                    </div>
                                    <div class="form-group">
                <input type="date" name="dateofbirth" id="dateofbirth" tabindex="2" class="form-control" placeholder="D.O.B - yyyy/mm/dd" required>
                                    </div>
                                     <div class="form-group">
            <input type="text" name="description" id="description" tabindex="1" class="form-control" placeholder="description" value="">
                                     </div>
                                      <div class="form-group">
            <input type="text" name="gender" id="gender-0" tabindex="1" class="form-control" placeholder="your gender" value="" required>
                                     </div>
                                     <div class="form-group">
            <input type="file" name="image" id="image" tabindex="1" class="form-control" value="" required>
                                     </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
<input type="submit" name="SignUp-submit" id="SignUp-submit" tabindex="4" class="form-control btn btn-SignUp" value="SignUp Now">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
$(function() {

    $('#login-form-link').click(function(e) {
        $("#login-form").delay(100).fadeIn(100);
         $("#SignUp-form").fadeOut(100);
        $('#SignUp-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
    });
    $('#SignUp-form-link').click(function(e) {
        $("#SignUp-form").delay(100).fadeIn(100);
         $("#login-form").fadeOut(100);
        $('#login-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
    });

});
function validateEmail(emailField){
            var reg =/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

                if (reg.test(emailField.value) == false) 
                    {
                        alert('Invalid Email Address');
                        this.value=NULL;
                        return false;
                    }

                return true;

                }

$('#password, #confirm_password').on('keyup', function () {
  if ($('#password').val() == $('#confirm_password').val()) {
    $('#message').html('Matching').css('color', 'green');
  } else 
    $('#message').html('Not Matching').css('color', 'red');
});
</script>
</body>
</html>


