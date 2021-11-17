<?php 
session_start();
 ?>
<?php include 'db/dbConnection.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login | SKYPOS</title>
  </head>
  <body> 
    <section class="material-half-bg">
      <div class="cover" style="background : linear-gradient(87deg, rgb(3,3,83) 0px, rgb(239,101,129) 100%)"></div>
    </section>
    <section class="login-content">
      <!-- <div class="logo">
        <h1></h1>
      </div> -->
      <div class="login-box">
        <div class="login-form">
          <h3 class="login-head" style="color:red;">POS + INVENTORY 1.0</h3>
          <div class="form-group">
            <label class="control-label">Email</label>
            <input class="form-control" type="email" placeholder="Email" id="loginEmail" autofocus>
            <label class="control-label" style="color:red;font-size:12px;display:none;" id="validEmailId">Please Enter Valid Email</label>
            <label class="control-label" style="color:red;font-size:12px;display:none;" id="emailReqId">Email Field required</label>
          </div>

          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" type="password" placeholder="Password" id="loginpwd">
            <label class="control-label" style="color:red;font-size:12px;display:none;" id="validPwdId">Password Field required</label>
          </div>
          
          <div class="form-group btn-container" align="center">
            <label class="control-label" style="color:red;font-size:14px;display:none;" id="userFailId">User with that email doesn't exist!</label>
            <label class="control-label" style="color:red;font-size:14px;display:none;" id="loginFailId">Login Failed</label>
            <label class="control-label" style="color:red;font-size:14px;display:none;" id="pwdFailId">Invalid Password</label>
            <button style="background : linear-gradient(87deg, orange 0px, red 100%);border:none !important;" class="btn btn-primary btn-block" onClick="validateLogin()"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
          </div>
        </div>
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
	  <script src="assets/js/core/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="assets/js/plugin/pace.min.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
    <script>

      /*
      *Validate login form
      */
      function validateLogin(params) {

        //login & password Field values
        var loginEmail = document.getElementById("loginEmail").value;
        var loginpwd = document.getElementById("loginpwd").value;

        //Email Regex
        var emailReg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        if (loginEmail==null || loginEmail==""){
          document.getElementById("emailReqId").style.display = "block";
          document.getElementById("validEmailId").style.display = "none";
        }else{
          document.getElementById("emailReqId").style.display = "none";
          if (emailReg.test(loginEmail) == false) {
            document.getElementById("validEmailId").style.display = "block";
            document.getElementById("emailReqId").style.display = "none";
          }else{
            document.getElementById("validEmailId").style.display = "none";
              if (loginpwd==null || loginpwd==""){
                document.getElementById("validPwdId").style.display = "block";
              }else{
                document.getElementById("validPwdId").style.display = "none";

                userLogin(loginEmail,loginpwd);

              }
          }
        }
      }

      /*
      *user Login function
      */
      function userLogin(email,password) {
        
        obj = {
          "email": email,
          "password": password
        }

        $.ajax({
          url: "ajax/login.php",
          type: "POST",
          data: {
            data: obj
          },

          success: function(data) {
            var res = JSON.parse(data);
            
            if (res.status == 1) {//user exit
              document.getElementById("userFailId").style.display = "block";
              document.getElementById("pwdFailId").style.display = "none";
              document.getElementById("loginFailId").style.display = "none";
            } else if (res.status == 2) {//password error
              document.getElementById("pwdFailId").style.display = "block";
              document.getElementById("userFailId").style.display = "none";
              document.getElementById("loginFailId").style.display = "none";
            }else if(res.status == 3){
              window.location = "index.php";
              document.getElementById("userFailId").style.display = "none";
              document.getElementById("pwdFailId").style.display = "none";
              document.getElementById("loginFailId").style.display = "none";
            }else{
              document.getElementById("loginFailId").style.display = "block";
              document.getElementById("userFailId").style.display = "none";
              document.getElementById("pwdFailId").style.display = "none";
            }
          },
          error: function(xhr, status, error) {
            var errorMessage = xhr.status + ': ' + xhr.statusText;
            alert(errorMessage);
          }
        });
      }
    </script>
  </body>
</html>