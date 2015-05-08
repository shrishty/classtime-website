<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login</title>
 
    <!-- Bootstrap -->
  <link href="bootstrap-3.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
 	<link rel="stylesheet" type="text/css" href="css/style.css">
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
        <div class="col-md-4"></div>
        
        <div class="col-md-4">
          <section class="login-form">
            <form method="post" action="checklogin.php" role="login">
              <img src="images/logo_text4.png" class="img-responsive" alt="" />
              <input type="text" name="rollno" placeholder="Enter Roll Number" required class="form-control input-lg" value="B110076CS" />
              
              <input type="password" class="form-control input-lg" name="password" id="password" placeholder="Password" required="" />
              
              <button type="submit" name="go" class="btn btn-lg btn-primary btn-block" onclick="">Sign in</button>
              <div>
                <a href="create.php">Create account</a> or <a href="#">reset password</a>
              </div>
              
            </form>
            
            <div class="form-links">
              <a href="#">www.classtime.com</a>
            </div>
          </section>  
          </div>
          
          <div class="col-md-4"></div>
          

      </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap-3.3.2-dist/js/bootstrap.min.js"></script>
    <script src="javascript/actions.js"></script>
  </body>
</html>
