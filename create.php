<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Account</title>
 
    <!-- Bootstrap -->
  <link href="bootstrap-3.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
 	<link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-select.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
  
      <div class="row" id="pwd-container">
        <div class="col-md-3"></div>
        
        <div class="col-md-6">
          <section class="login-form">
            <form method="post" action="connectdb.php" role="login">
              <img src="images/logo_text4.png" class="img-responsive" alt="" />
              <input type="text" name="rollno" placeholder="Roll Number" required class="form-control input-lg" value="B110076CS" />

              <input type="text" class="form-control input-lg" name="name" id="name" placeholder="Name" required="" />
              
              <input type="password" class="form-control input-lg" name="password1" id="password1" placeholder="Password" required="" />
              
              <input type="password" class="form-control input-lg" name="password2" id="password2" placeholder="Confirm Password" required="" />
              
              <input type="text" class="form-control input-lg" name="phoneno" id="phoneno" placeholder="Phone Number" required="" />
              
              <input type="text" class="form-control input-lg" name="emailid" id="emailid" placeholder="Email" required=""  value="shrishty_bcs11@nitc.ac.in"/>
              
              <select name="type" class="selectpicker" data-width="100%">
                <option value="1" selected="true">Student</option>
                <option value="2">Teacher</option>
              </select>

              <select name="semester" class="selectpicker" data-width="100%">
                <option value="0" selected="true">Select Semester</option>
                <option value="1">I</option>
                <option value="2">II</option>
                <option value="3">III</option>
                <option value="4">IV</option>
                <option value="5">V</option>
                <option value="6">VI</option>
                <option value="7">VII</option>
                <option value="8">VIII</option>
                <option value="9">Teacher</option>
              </select>
                          
              <div class="pwstrength_viewport_progress"></div>
              
              
              <button type="submit" name="go" class="btn btn-lg btn-primary btn-block">Create Account</button>
              <div>
                <a href="login.php">Login</a> or <a href="#">reset password</a>
              </div>
              
            </form>
            
            <div class="form-links">
              <a href="#">www.classtime.com</a>
            </div>
          </section>  
          </div>
          
          <div class="col-md-3"></div>
          

      </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap-3.3.2-dist/js/bootstrap.min.js"></script>
    <script src="javascript/actions.js"></script>
    <script type="text/javascript" src="javascript/bootstrap-checkbox.js"></script>
    <script type="text/javascript" src="javascript/newjs.js"></script>
    <script type="text/javascript" src="javascript/bootstrap-select.js"></script>
  </body>
</html>
