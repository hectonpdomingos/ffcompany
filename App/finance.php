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

        <style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>




<?php
$jan = 2;
$feb = 5;

?>










    </head>
    <body>
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
                    <li class="active"><a href="finance.php"><span  class="glyphicon glyphicon-usd" aria-hidden="true"></span > Finance</a></li>
                    <li><a href="users.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Users</a></li>
                    <li><a href="warehouse.php"><span class="glyphicon glyphicon-barcode" aria-hidden="true"></span > Warehouse</a></li>
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
                        <h4 class="page-header">Dashboard Finance Adminitration</h4>

                      </div>
                  </div>
                  <!--/.row-->


  <div class="jumbotron">
    <div class="row">
      <center><h4>Financial Review</h4></center> <br>
    <div class="col-xs-6 col-sm-3">
    <label>Total payments today </label>
   <input readonly="" name="totalPayments" id="totalPayments">
 </div>
  <div class="col-xs-6 col-sm-3">
  <label>Waiting for payment</label>
  <input readonly="" name="totalWaitingPayments" id="totalWaitingPayments">
</div>
  <div class="col-xs-6 col-sm-3">
  <label>Warehouse costs</label>
  <input readonly="" name="warehouseCosts" id="warehouseCosts">
</div>
</div>




  <table>
   <tr >
    <td height=19 class=xl65 width=179 style='height:14.4pt;width:134pt'>Description</td>
    <td class=xl66 width=64 style='border-left:none;width:48pt'>Jan</td>
    <td class=xl66 width=64 style='border-left:none;width:48pt'>Feb</td>
    <td class=xl66 width=64 style='border-left:none;width:48pt'>Mar</td>
    <td class=xl66 width=64 style='border-left:none;width:48pt'>Apr</td>
    <td class=xl66 width=64 style='border-left:none;width:48pt'>May</td>
    <td class=xl66 width=64 style='border-left:none;width:48pt'>Jun</td>
    <td class=xl66 width=64 style='border-left:none;width:48pt'>Jul</td>
    <td class=xl66 width=64 style='border-left:none;width:48pt'>Ago</td>
    <td class=xl66 width=64 style='border-left:none;width:48pt'>Sep</td>
    <td class=xl66 width=64 style='border-left:none;width:48pt'>Oct</td>
    <td class=xl66 width=64 style='border-left:none;width:48pt'>Nov</td>
    <td class=xl66 width=64 style='border-left:none;width:48pt'>Dec</td>
   </tr>
   <tr >
    <td ></td>
    <td ><?php echo $feb; ?></td>
    <td ><?php echo $jan; ?></td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
   </tr>
   <tr >
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
   </tr>
   <tr >
    <td >Active users</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
   </tr>
   <tr >
    <td >Orders</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
   </tr>
   <tr >
    <td >Orders
    Services</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
   </tr>
   <tr >
    <td >Orders
    Services Payments</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
   </tr>
   <tr >
    <td >Warehouse
    costs</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
   </tr>
   <tr >
    <td >Employees
    costs</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
   </tr>
   <tr >
    <td >Eletricity</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
   </tr>
   <tr >
    <td >Water</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
   </tr>
   <tr >
    <td >Internet</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
   </tr>
   <tr >
    <td >Transport</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
   </tr>
   <tr >
    <td >Marketing</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
   </tr>


  </table>

</div>

                  <script src="js/jquery-1.11.1.min.js"></script>
                  <script src="js/bootstrap.min.js"></script>
                  <script src="js/bootstrap-datepicker.js"></script>
                  <script src="js/jquery.min.js"></script>
                  </script>

                  <script>
                      ! function($) {
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
