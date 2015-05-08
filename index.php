<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Classtime</title>
 
    <!-- Bootstrap -->
  <link href="bootstrap-3.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
 	<link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-checkbox.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-select.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php 
      ini_set('display_errors', 1);
      session_start(); 
      if ($_SESSION['sid'] !=session_id()) {
        header("location:login.php");
      }
    ?>
    <?php include 'fetchtimetable.php';?>
    <?php include 'fetchstudentlist.php'; ?>    
    <div class="container">
  
      <nav class="navbar navbar-default" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Classtime</a>
        </div>
      
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav">
            <li><a href="#"><?= $person_name; ?></a></li>
          </ul>
          <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control span10" placeholder="Search">
            </div>
          </form>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#" data-toggle="modal" data-target="#basicModal" >Notification</a></li>
            <li><a href="#" data-toggle="modal" data-target="#createormodify" >Create/Modify Timetable</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#" data-toggle="modal" data-target="#extraclass">Extra Class</a></li>
                <li><a href="#" data-toggle="modal" data-target="#basicModal">Messages</a></li>
                <li><a href="#" data-toggle="modal" data-target="#basicModal">Contact Admin</a></li>
                <li><a href="logout.php">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>

      <div class="modal fade" id="createormodify" tabindex="-1" role="dialog" aria-labelledby="createormodify" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Create/Modify Timetable</h4>
                </div>
                <div class="modal-body">
                    <h4>Select courses you are enrolled in/taking</h4>
                      <form method="post" action="select-sub.php" role="login">
                        <?php include 'choosesub.php';?> 
                        <button type="submit" name="go" class="btn btn-lg btn-primary btn-block">Save Changes</button>
                      </form>
                </div>
            </div>
        </div>
      </div>


      <div class="modal fade" id="extraclass" tabindex="-1" role="dialog" aria-labelledby="extraclass" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Put Extra Class</h4>
                </div>
                <div class="modal-body">
                    <h4>Choose the sub for which you want to put extra class</h4>
                    <form method="post" role="login" onsubmit="alertFreeslots();">
                        <select name="type" class="selectpicker" data-width="100%"> 
                          <option value="-1" selected="true">Choose a subject for which you want to take extra class</option>
                          <?php include 'subj-list.php';?>
                        </select> 
                        <button type="submit" name="go" class="btn btn-lg btn-primary btn-block;">Find Extra Classes</button>
                    </form>
                </div>
            </div>
        </div>
      </div>


      <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                    <h3>Modal Body</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
      </div>

      <div class="container">
        <div class="row col-md-2 my-class">
         <h4>Bunkometer</h4>
          <ul class="list-group">
            <?php include 'sublist.php';?>
          </ul>
        </div>
        <div class="row col-md-6 grid-border">
          <div class="row col-md-12 my-class">
            <h4>Upcoming Class: <?= $upcoming_class; ?> (<?= $day; ?>, <?= $upcoming_class_time_string; ?>)</h4>
          </div>
          <div class="row col-md-12 my-class">
            <h3>Your Timetable</h3>
            <div class="table-responsive">
              <table class="table table-hover table-bordered">
                <tbody>
                  <tr>
                    <th></th>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                    <th>6</th>
                    <th>7</th>
                    <th>8</th>
                    <th>9</th>
                  </tr>
                  <tr>
                    <th>Mon</th>
                    <td><?= $student_timetable["Mon"][0]; ?></td>
                    <td><?= $student_timetable["Mon"][1]; ?></td>
                    <td><?= $student_timetable["Mon"][2]; ?></td>
                    <td><?= $student_timetable["Mon"][3]; ?></td>
                    <td><?= $student_timetable["Mon"][4]; ?></td>
                    <td><?= $student_timetable["Mon"][5]; ?></td>
                    <td><?= $student_timetable["Mon"][6]; ?></td>
                    <td><?= $student_timetable["Mon"][7]; ?></td>
                    <td><?= $student_timetable["Mon"][8]; ?></td>
                  </tr>
                  <tr>
                    <th>Tue</th>
                    <td><?= $student_timetable["Tue"][0]; ?></td>
                    <td><?= $student_timetable["Tue"][1]; ?></td>
                    <td><?= $student_timetable["Tue"][2]; ?></td>
                    <td><?= $student_timetable["Tue"][3]; ?></td>
                    <td><?= $student_timetable["Tue"][4]; ?></td>
                    <td><?= $student_timetable["Tue"][5]; ?></td>
                    <td><?= $student_timetable["Tue"][6]; ?></td>
                    <td><?= $student_timetable["Tue"][7]; ?></td>
                    <td><?= $student_timetable["Tue"][8]; ?></td>
                  </tr>
                  <tr>
                    <th>Wed</th>
                    <td><?= $student_timetable["Wed"][0]; ?></td>
                    <td><?= $student_timetable["Wed"][1]; ?></td>
                    <td><?= $student_timetable["Wed"][2]; ?></td>
                    <td><?= $student_timetable["Wed"][3]; ?></td>
                    <td><?= $student_timetable["Wed"][4]; ?></td>
                    <td><?= $student_timetable["Wed"][5]; ?></td>
                    <td><?= $student_timetable["Wed"][6]; ?></td>
                    <td><?= $student_timetable["Wed"][7]; ?></td>
                    <td><?= $student_timetable["Wed"][8]; ?></td>
                  </tr>
                  <tr>
                    <th>Thu</th>
                    <td><?= $student_timetable["Thu"][0]; ?></td>
                    <td><?= $student_timetable["Thu"][1]; ?></td>
                    <td><?= $student_timetable["Thu"][2]; ?></td>
                    <td><?= $student_timetable["Thu"][3]; ?></td>
                    <td><?= $student_timetable["Thu"][4]; ?></td>
                    <td><?= $student_timetable["Thu"][5]; ?></td>
                    <td><?= $student_timetable["Thu"][6]; ?></td>
                    <td><?= $student_timetable["Thu"][7]; ?></td>
                    <td><?= $student_timetable["Thu"][8]; ?></td>
                  </tr>
                  <tr>
                    <th>Fri</th>
                    <td><?= $student_timetable["Fri"][0]; ?></td>
                    <td><?= $student_timetable["Fri"][1]; ?></td>
                    <td><?= $student_timetable["Fri"][2]; ?></td>
                    <td><?= $student_timetable["Fri"][3]; ?></td>
                    <td><?= $student_timetable["Fri"][4]; ?></td>
                    <td><?= $student_timetable["Fri"][5]; ?></td>
                    <td><?= $student_timetable["Fri"][6]; ?></td>
                    <td><?= $student_timetable["Fri"][7]; ?></td>
                    <td><?= $student_timetable["Fri"][8]; ?></td>
                  </tr>
                  <tr>
                    <th>Sat</th>
                    <td><?= $student_timetable["Sat"][0]; ?></td>
                    <td><?= $student_timetable["Sat"][1]; ?></td>
                    <td><?= $student_timetable["Sat"][2]; ?></td>
                    <td><?= $student_timetable["Sat"][3]; ?></td>
                    <td><?= $student_timetable["Sat"][4]; ?></td>
                    <td><?= $student_timetable["Sat"][5]; ?></td>
                    <td><?= $student_timetable["Sat"][6]; ?></td>
                    <td><?= $student_timetable["Sat"][7]; ?></td>
                    <td><?= $student_timetable["Sat"][8]; ?></td>
                  </tr>
                  <tr>
                    <th>Sun</th>
                    <td><?= $student_timetable["Sun"][0]; ?></td>
                    <td><?= $student_timetable["Sun"][1]; ?></td>
                    <td><?= $student_timetable["Sun"][2]; ?></td>
                    <td><?= $student_timetable["Sun"][3]; ?></td>
                    <td><?= $student_timetable["Sun"][4]; ?></td>
                    <td><?= $student_timetable["Sun"][5]; ?></td>
                    <td><?= $student_timetable["Sun"][6]; ?></td>
                    <td><?= $student_timetable["Sun"][7]; ?></td>
                    <td><?= $student_timetable["Sun"][8]; ?></td>
                  </tr>
                </tbody>  
              </table>
            </div>
          </div>
        </div>
        <div class="row col-md-3 my-class">
          <h4>People in Upcoming class</h4>
          <ul class="list-group">
            <?php include 'liststu.php';?>
          </ul>
        </div>  
      </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="javascript/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap-3.3.2-dist/js/bootstrap.min.js"></script>
    <script src="javascript/actions.js"></script>
    <script src="javascript/bootstrap-checkbox.js"></script>
    <script type="text/javascript">
      var count_array = <?php echo json_encode($count); ?>;
      function alertFreeslots() {
          var msg = "Free slots are: ";
          var freeslots = <?php
          include "put-extra.php";

          // echo "laaaa";
          // print_r($_SESSION);
          // echo isset($_SESSION["free_slots"]);
          if (isset($_SESSION["free_slots"])) {
            echo json_encode($_SESSION["free_slots"]);
          }
          else {
            echo "null";
          }
          ?>;
          console.log(freeslots);
          for(x in freeslots) {
            msg = msg +freeslots[x] + ", ";
            console.log("here");
          };
          console.log(msg);
          alert(msg);
        }
    </script>
    <script src="javascript/newjs.js"></script>
    <script type="text/javascript" src="javascript/bootstrap-select.js"></script>
  </body>
</html>
