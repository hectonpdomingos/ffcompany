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

                    <li class="active"><a href="tasks.php"><span class="glyphicon glyphicon-tasks"></span> Tasks</a></li>
                    <li><a href="finance.php"><span  class="glyphicon glyphicon-usd" aria-hidden="true"></span > Finance</a></li>
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
                        <h4 class="page-header">Dashboard Tasks Adminitration</h4>


                         <!-- TABS TASKS -->
                        <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#customerTask">Customers Orders</a></li>
                        <li><a data-toggle="tab" href="#myTask">My tasks</a></li>
                        <li><a data-toggle="tab" href="#sendTask">Send a task</a></li>
                        </ul>

          <div class="tab-content">
             <div id="customerTask" class="tab-pane fade in active">   <!--customer task -->
             <h3>Customers Orders</h3>
             <p class="list-group-item list-group-item-warning">All open orders from customers. This is the high priority tasks</p>
         
    
        </div> <!-- class tab-content -->


  <div id="myTask" class="tab-pane fade">  <!-- My task -->
    <h3>My Tasks</h3>
    <p>Every active task you need to complete.</p>



    <table class="table table-bordered table-responsive">
    <thead>
    <tr>
      <th>ticket_id</th>
      <th>User MSG</th>
      <th>Date Time</th>
      <th>Answer</th>
      <th>Action</th>
      
    </tr>
  </thead>
    <?php

require('db.php');
$dbh;

  $statusTicket = '1';
  
  $stmt = $dbh->prepare('SELECT ticket_id, user_msg, date_time FROM ticket_tb WHERE status = :status limit 5 ' );
  $stmt->execute(['status' => $statusTicket]);
  //$resultado = $stmt->fetch();
 
  while($row=$stmt->fetch(PDO::FETCH_ASSOC))
  {
     
     echo '<tr>';
     echo '<td>'.$row['ticket_id'].'</td>'; 
     echo '<td>'.$row['user_msg'].'</td>';
     echo '<td>'.$row['date_time'].'</td>';
     echo '<td> <input type=text name="answer"></td>';
     echo '<td> <button type="submit" class="btn btn-default"> Answer </button></td>';
     echo '</tr>';
    
  }
 

  $dbh = null;
    ?>
</table>
  </div>
  <div id="sendTask" class="tab-pane fade">   <!--Send task -->
    <h3>Send a task</h3>
    <p>Choose a user or staff employee and request a task.</p>
    <br>
    <?php

    echo "Tab 2";
    ?>

  </div>
  </div> <!-- end of tab task -->


                      </div>
                  </div>
                  <!--/.row-->



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
