<?php

// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION)) session_start();

$nivel_necessario = 2;

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['user_id']) OR ($_SESSION['level'] < $nivel_necessario)) {
    // Destrói a sessão por segurança
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location: youneedlogin.html"); exit;
}

//name login on the header
$userlogin =  $_SESSION['name'];

?>

    <!DOCTYPE html>
    <html lang="en">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="My freight forwarder" content="">
        <link rel="icon" href="favicon.png">

        <link href="css/bootstrap.min.css" rel="stylesheet"> s
        <link href="css/styles-dashboard.css" rel="stylesheet">

        <!--Icons-->
        <script src="js/lumino.glyphs.js"></script>

        <link href="css/default.css" rel="stylesheet">
        <style>
            .actions {
                float: left;
                margin-right: 2px;
            }


        </style>




    </head>
    <body>
          <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
                        <a class="navbar-brand" href="#"><span>Your Freight Forwarder company</span> </a>
                        <ul class="user-menu">
                            <li class="dropdown pull-right">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg><?php echo $userlogin; ?><span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="profile.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
                                    <li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li>
                                    <li><a href="logout.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                </div>
                <!-- /.container-fluid -->
            </nav>

            <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
                <form role="search">
                    <div class="form-group">
                        User photo Profile
                    </div>
                </form>
                <ul class="nav menu">
                    <li><a href="dashboard.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>

                    <li><a href="tasks.php"><span class="glyphicon glyphicon-tasks"></span> Tasks</a></li>
                    <li><a href="finance.php"><span  class="glyphicon glyphicon-usd" aria-hidden="true"></span > Finance</a></li>
                    <li><a href="users.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Users</a></li>
                    <li class="active"><a href="warehouse.php"><span class="glyphicon glyphicon-barcode" aria-hidden="true"></span > Warehouse</a></li>
                    <li><a href="alerts.php"><span  class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span > Alerts</a></li>
                    <li><a href="message.php"><span  class="glyphicon glyphicon-envelope" aria-hidden="true"></span > Message</a></li>
                    <li><a href="logout.php"><span  class="glyphicon glyphicon-log-out"aria-hidden="true"></span > Log out</a></li>
                    <li class="parent ">
                    </li>

                </ul>

            </div>
            <!--/.sidebar-->

            <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

                <!--/.row-->

                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="page-header">Dashboard Warehouse Adminitration</h4>

                      </div>
                  </div>
                  <!--/.row-->


<div class="Container">

  <!--BEGINING OF SEARCH MENU -->
  <?php
  require_once '_findpackage.php';
  if(isset($_POST['submit'])) {
  } else {
  }
  ?>
  <form class="form-inline" action="<?php echo $_SERVER['PHP_SELF']?>" method="post" name="registerForm">
  <form class="searchforpackage" action="_findpackage.php" method="post">
  <div class="input-group">

  <input name="searchpackage" type="text" class="form-control" placeholder="Track number" aria-describedby="sizing-addon1">
  </div>
  <!-- <input type="submit"  class="btn btn-primary"> -->
  <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
  </form>


  <!--END OF SEARCH MENU -->
  <div class="alert alert-warning">
     <?php $msg = $_SESSION["error"];
     echo $msg; ?>
  </div>


             <div class="jumbotron">
               <form id="warehousepkg" class="edituser" name="addupdatepakages" action="_warehousePackages.php" method="post"  onsubmit="return validateForm()">
                      <input id="idpkg" hidden="true" name="idpkg" value="<?php echo $pkg_id; ?>" />
                      <div class="row">
                      <div class="col-xs-6 col-sm-3">
                      <label for="packagetracknumber">Package track number</label><br>
                      <input id="packagetracknumber" value="<?php echo $pkgtrack_number; ?>" name="packagetracknumber" type="text" class="form-control" aria-describedby="sizing-addon1">
                      </div>
                      <div class="col-xs-6 col-sm-2">
                      <label for="packagefrom">Package From</label><br>
                      <input id="packagefrom" value="<?php echo $pkgfrom; ?>" name="packagefrom" type="text" class="form-control" aria-describedby="sizing-addon1">
                      </div>
                      <div class="col-xs-6 col-sm-2">
                      <label for="packageweight">Package Weight</label><br>
                      <input id="packageweight"  value="<?php echo $pkgweight; ?>" name="packageweight" type="text" class="form-control" aria-describedby="sizing-addon1">
                      </div>
                      <div class="col-xs-6 col-sm-3">
                      <label for="packageuseremail">User Email</label><br>
                      <input id="packageuseremail"  value="<?php echo $pkguser_email; ?>" name="packageuseremail" type="text" class="form-control" aria-describedby="sizing-addon1">
                      </div>
                      <div class="col-xs-6 col-sm-3">
                      <label for="packagearrived">Package arrived</label><br>
                      <div class='input-group date' id='datetimepkg'>
                      <input class="form-control" disabled="" id="packagearrived" value="<?php echo $pkgdate_arrive; ?>" name="packagearrived" type="datetime" />
                      <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                      </div>
                      </div>
                      <div class="col-xs-6 col-sm-4">
                      <label>Status</label><br>
                      <select  class="form-control"  name="packagestatus">
                        <option value="<?php echo $pkgstatus; ?>"><?php echo $pkgstatus; ?></option>
                        <option> </option>
                        <option value="In hold">In hold</option>
                        <option value="Processing">Processing</option>
                        <option value="Waiting for orders">Waiting for orders</option>
                        <option value="Sent to User">Sent to User</option>
                      </select>
                      </div>
                      <div class="col-xs-6 col-sm-4">
                      </div>

                      </div>

                    <button class="btn btn-info btn-sm"  type="submit"  name="updatepkg">Add / Update</button>


                </form>
              </div> <!--END OF JUMBOTRON -->
  </div>

<div id="movePackage">
  <div class="jumbotron">
    <div class="row">
      <center><h4>Use this form to move a package from a user to another.</h4></center> <br>
    <div class="col-xs-6 col-sm-3">

<label for="moveTrackNumeber">Track Number of the package</label>
<input id="moveTrackNumeber" class="form-control" placeholder="Track number" value="">
</div>
<div class="col-xs-6 col-sm-3">
<label for="moveEmail">Destinator Email</label>
<input id="moveEmail"class="form-control" placeholder="Email" value="">
</div>
</div>
<button id="btMovePackage" class="btn btn-info btn-sm"  type="submit"> Move </button>
</div>


</div>




                  <script src="js/jquery-1.11.1.min.js"></script>
                  <script src="js/bootstrap.min.js"></script>
                  <script src="js/bootstrap-datepicker.js"></script>
                  <script src="js/jquery.min.js"></script>
                  </script>

                  <script>
                      !function($) {
                          $(document).on("click", "ul.nav li.parent > a > span.icon", function() {
                              $(this).find('em:first').toggleClass("glyphicon-minus");
                          });
                          $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
                      }(window.jQuery);

                      $(window).on('resize', function() {
                          if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
                      })
                      $(window).on('resize', function() {
                          if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
                      })

                  </script>
              </body>

          </html>
