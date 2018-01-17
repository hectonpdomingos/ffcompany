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

            td.last {
              width: 1px;
              white-space: nowrap;
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
                    <li><a href="tasks.php"><span class="glyphicon glyphicon-tasks"></span> Tasks</a></li>
                    <li><a href="finance.php"><span  class="glyphicon glyphicon-usd" aria-hidden="true"></span > Finance</a></li>
                    <li class="active"><a href="users.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Users</a></li>
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
                        <h4 class="page-header">Dashboard Administrative Users Accounts</h4>

                        <!--BEGINING OF SEARCH MENU -->
                        <?php

                        require_once '_finduser.php';
                        if(isset($_POST['submit'])) {
                        } else {
                        }
                        ?>
                        
                        <form class="form-inline" action="<?php echo $_SERVER['PHP_SELF']?>" method="post" name="registerForm">
                        <form class="searchforuser" action="_finduser.php" method="post">
                        <div class="input-group">
                        <span class="input-group-addon" id="sizing-addon1">@</span>
                        <input name="searchuser" type="text" class="form-control" placeholder="Email" aria-describedby="sizing-addon1">
                        </div>
                        <!-- <input type="submit"  class="btn btn-primary"> -->
                        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                        </form>
                        <!--END OF SEARCH MENU -->
                    </div>
                </div>
                <!--/.row-->

           <div class="jumbotron">
              <!--  <div class="container"> -->

               <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#menuBasicInfo">Search Basic Info</a></li>
                <li><a data-toggle="tab" href="#menuFiance">Finance</a></li>
                <li><a data-toggle="tab" href="#menuUserItens">User Itens at Warehouse</a></li>
                <li><a data-toggle="tab" href="#menuUserSentItens">Packages sent by the user</a></li>
                <li><a data-toggle="tab" href="#menuAllSentItens">Packages sent by all user</a></li>
                <li><a data-toggle="tab" href="#menuWarehouseItens">Warehouse Total Itens</a></li>
                <li><a data-toggle="tab" href="#menuListOfUsers">List of users</a></li>
                </ul>


                <div class="tab-content">
                <div id="menuBasicInfo" class="tab-pane fade in active">


                    <form id="updateuser" class="edituser" action="_updateUser.php" method="post">
                        <div class="form-group row">
                          <div class="row">
                            <div class="col-xs-6 col-sm-4">
                            <input type="hidden" name="iduser" value="<?php echo $user_idfound; ?>" />
                            <label for="surname">First Name</label>
                            <input name="edfirstname" type="text" class="form-control" value="<?php echo $namefound; ?>" aria-describedby="sizing-addon1">
                            </div>
                            <div class="col-xs-6 col-sm-4">
                            <label for="surname">Last Name</label>
                            <input name="edlastname" type="text" class="form-control" value="<?php echo $surnamefound; ?>" aria-describedby="sizing-addon1">
                            </div>
                            <div class="col-xs-6 col-sm-4">
                             <label for="edemail">Email address</label>
                            <input name="edemail" type="text"  class="form-control" value="<?php echo $emailfound; ?>" aria-describedby="sizing-addon1">
                            </div>
                           </div>
                          <div class="row">
                            <div class="col-xs-6 col-sm-4">
                            <label for="address">Address</label>
                            <input name="edaddress" type="text" class="form-control" value="<?php echo  $addressfound; ?>" aria-describedby="sizing-addon1">
                            </div>
                          <div class="col-xs-6 col-md-4">
                           <label for="country">Country</label>
                           <input name="edcountry" type="text" class="form-control" value="<?php echo $countryfound; ?>" aria-describedby="sizing-addon1">
                         </div>
                            <div class="col-xs-6 col-md-4">
                              <label for="zipcode">Zip code</label>
                            <input name="edzipcode" type="text" class="form-control" value="<?php echo  $zipcodefound; ?>" aria-describedby="sizing-addon1">
                            </div>

                        </div>
                            <div class="row">
                             <div class="col-xs-6 col-md-4">
                              <label for="phone">Phone</label>
                            <input name="edphone" type="text" class="form-control" value="<?php echo $phonefound; ?>" aria-describedby="sizing-addon1">
                          </div>
                          <div class="col-xs-6 col-md-4">
                            <label for="phone2">Second Phone </label>
                          <input name="edphone2" type="text" class="form-control" value="<?php echo $phone2found; ?>" aria-describedby="sizing-addon1">
                       </div>
                       <div class="col-xs-6 col-md-4">
                         <label for="birth">Birth</label>
                       <input name="edbirth" type="date" class="form-control" value="<?php echo $birthfound; ?>" aria-describedby="sizing-addon1">
                    </div>
                        </div>
                        <div class="row">
                          <div class="col-xs-6 col-md-4">
                            <label for="edlanguage">Language</label>
                          <input name="edlanguage" type="text" class="form-control" value="<?php echo $languagefound; ?>" aria-describedby="sizing-addon1">
                        </div>
                        <div class="col-xs-6 col-md-4">
                          <label for="eddata">Account Created</label>
                        <input name="edaccountcreated" type="text" disabled="" class="form-control" value="<?php echo $datetimefound; ?>" aria-describedby="sizing-addon1">
                      </div>
                      <div class="col-xs-6 col-md-4">
                        <label for="edfirstlogin">First login</label>
                      <input name="edlocation_first_login" type="text" class="form-control" value="<?php echo $location_first_loginfound; ?>" aria-describedby="sizing-addon1">
                    </div>
                        <button class="btn btn-info btn-sm"  type="submit">Update</button>
                    </form>
                  </div>   <!--end of form -->
                    <p>
                    <!--Active and disable users -->
                    <form action="functions.php" method="post">
                    <button class="btn btn-warning btn-sm actions"  type="submit"  name="disuser" value="<?php echo $emailfound; ?>" >Disable</button>
                  </form>
                    <form action="functions.php" method="post">
                    <button class="btn btn-primary btn-sm"  type="submit"  name="active" value="<?php echo $emailfound; ?>" >Active</button>
                    </form>
                </div>
                </div>

                <div id="menuFiance" class="tab-pane fade">
                <h3>Finance</h3>
                <p>Default Payment Info.</p>

                <div class="row">
                  <div class="col-xs-6 col-sm-4">
                  <label for="creditcardowner">Credit Card Owner</label>
                  <input name="creditcardowner" type="text" class="form-control" value="<?php echo $creditcardownerfound; ?>" aria-describedby="sizing-addon1">
                  </div>
                  <div class="col-xs-6 col-sm-4">
                  <label for="creditcardnumber">Credit Card number</label>
                  <input name="creditcardnumber" type="text" class="form-control" value="<?php echo $creditcardnumberfound; ?>" aria-describedby="sizing-addon1">
                  </div>
                  <div class="col-xs-6 col-sm-4">
                   <label for="vcccode">VCC Code</label>
                  <input name="vcccode" type="text"  class="form-control" value="<?php echo $creditcardvccfound; ?>" aria-describedby="sizing-addon1">
                  </div>
                 </div>

              </div>  <!-- END OF FINANCNE MENU-->

               <div id="menuUserItens" class="tab-pane fade">   <!--BEGGINNING OF USER ITENS -->
               <h3>User itens - All packages here is in our warehouse</h3>

                               <?php
                               header('Content-Type: text/html; charset=utf-8');
                              include('_paginate_config.php');    //include of db config file
                               include ('_paginate.php'); //include of paginat page

                               $per_page = 15;         // number of results to show per page

                               //solving utf8 problem
                               mysql_query("SET NAMES 'utf8'");
                               mysql_query('SET character_set_connection=utf8');
                               mysql_query('SET character_set_client=utf8');
                               mysql_query('SET character_set_results=utf8');

                               $result = mysql_query("SELECT * FROM warehouse_packages_tb WHERE user_email ='$emailfound'");
                               $total_results = mysql_num_rows($result);
                               $total_pages = ceil($total_results / $per_page);//total pages we going to have

                               //-------------if page is setcheck------------------//
                               if (isset($_GET['page'])) {
                               $show_page = $_GET['page'];             //it will telles the current page
                               if ($show_page > 0 && $show_page <= $total_pages) {
                               $start = ($show_page - 1) * $per_page;
                               $end = $start + $per_page;
                               } else {
                               // error - show first set of results
                               $start = 0;
                               $end = $per_page;
                               }
                               } else {
                               // if page isn't set, show first set of results
                               $start = 0;
                               $end = $per_page;
                               }
                               // display pagination
                               $page = intval($_GET['page']);

                               $tpages=$total_pages;
                               if ($page <= 0)
                               $page = 1;
                               ?>




                                         <!--    <div class="span6 offset3">
                                             <div class="mini-layout"> -->
                                  <?php
                                   // display data in table
                                   echo "<table class='table table-bordered table-responsive'>";
                                   echo "<thead><tr><th class='last'>ID Pedido</th><th>ID Cliente</th> <th>Data</th><th>Status</th><th>Action</th></tr></thead>";
                                   // loop through results of database query, displaying them in the table
                                   for ($i = $start; $i < $end; $i++) {
                                       // make sure that PHP doesn't try to show results that don't exist
                                       if ($i == $total_results) {
                                           break;
                                       }


                                     if (mysql_result($result, $i, 'active')  == 2){


                                       // echo out the contents of each row into a table
                                       echo "<tr class='danger'' " . $cls . ">";
                                       echo '<td class="last">' . mysql_result($result, $i, 'origin') . '</td>';
                                       echo '<td>' . mysql_result($result, $i, 'track_number') . '</td>';
                                       echo '<td>' . mysql_result($result, $i, 'date_arrive') . '</td>';
                                       echo '<td>' . mysql_result($result, $i, 'weight') . '</td>';
                                       echo '<td>

                               <form action="functions.php" method="post">
                               <button class="btn btn-warning btn-sm actions"  type="submit"  name="disuser" value="'. mysql_result($result, $i, 'email') .'" >Return to Store</button> </form>



                               <form action="functions.php" method="post">
                               <button class="btn btn-primary btn-sm actions"  type="submit"  name="active" value="'. mysql_result($result, $i, 'email') .'" >Add to Send</button>
                               </form>


                               <button class="btn btn-info btn-sm" name="editOrder" value="'. mysql_result($result, $i, 'email') .'" >New Order</button>

                               '
                                           ;
                                       echo "</tr>";

                                     }else
                                     {
                                         // echo out the contents of each row into a table
                                       echo "<tr " . $cls . ">";
                                       echo '<td class="last">' . mysql_result($result, $i, 'origin') . '</td>';
                                       echo '<td>' . mysql_result($result, $i, 'track_number') . '</td>';
                                       echo '<td>' . mysql_result($result, $i, 'date_arrive') . '</td>';
                                       echo '<td>' . mysql_result($result, $i, 'weight') . '</td>';
                                       echo '<td>

                               <form action="functions.php" method="post">
                               <button class="btn btn-warning btn-sm actions"  type="submit"  name="disuser" value="'. mysql_result($result, $i, 'email') .'" >Return to Store</button> </form>



                               <form action="functions.php" method="post">
                               <button class="btn btn-primary btn-sm actions"  type="submit"  name="active" value="'. mysql_result($result, $i, 'email') .'" >Add to Send</button>
                               </form>



                               <button type="button" class="btn btn-info btn-sm" name="editOrder"  value="'. mysql_result($result, $i, 'email') .'" >New Order</button>

                               '
                                           ;
                                       echo "</tr>";
                               }


                                   }
                                   // close table>
                               echo "</table>";
                                    $reload = $_SERVER['PHP_SELF'] . "?tpages=" . $tpages;
                                   echo '<div class="pager"><ul>';
                                   if ($total_pages > 1) {
                                       echo paginate($reload, $show_page, $total_pages);
                                   }
                                   echo "</ul></div>";
                               // pagination
                               ?>
                               <!--  </div>
                                           </div> -->



                               </div> <!--BEGGINNING OF USER ITENS -->


            <div id="menuUserSentItens" class="tab-pane fade">
                <h3>User Sent itens - All packages that the user sent</h3>
            </div>

            <div id="menuAllSentItens" class="tab-pane fade">
                 <h3>All sent itens</h3>
           </div>

                <div id="menuWarehouseItens" class="tab-pane fade">
                <h3>Warehouse itens</h3>



                      <?php
                      header('Content-Type: text/html; charset=utf-8');

                      $per_page = 5;         // number of results to show per page

                      //solving utf8 problem
                      mysql_query("SET NAMES 'utf8'");
                      mysql_query('SET character_set_connection=utf8');
                      mysql_query('SET character_set_client=utf8');
                      mysql_query('SET character_set_results=utf8');

                      $result = mysql_query("SELECT * FROM warehouse_packages_tb");
                      $total_results = mysql_num_rows($result);
                      $total_pages = ceil($total_results / $per_page);//total pages we going to have

                      //-------------if page is setcheck------------------//
                      if (isset($_GET['page'])) {
                      $show_page = $_GET['page'];             //it will telles the current page
                      if ($show_page > 0 && $show_page <= $total_pages) {
                      $start = ($show_page - 1) * $per_page;
                      $end = $start + $per_page;
                      } else {
                      // error - show first set of results
                      $start = 0;
                      $end = $per_page;
                      }
                      } else {
                      // if page isn't set, show first set of results
                      $start = 0;
                      $end = $per_page;
                      }
                      // display pagination
                      $page = intval($_GET['page']);

                      $tpages=$total_pages;
                      if ($page <= 0)
                      $page = 1;
                      ?>



                        <div class="row">
                                <!--    <div class="span6 offset3">
                                    <div class="mini-layout"> -->
                                          <?php

                          // display data in table

                          echo "<meta name='viewport' content='width=device-width, initial-scale=1'>";
                          echo "<table class='table table-bordered table-responsive'>";
                          echo "<thead><tr><th class='last'>User</th><th class='last'>From</th><th>Track Number</th> <th>Date</th><th>Weight/LBS</th><th>Action</th></tr></thead>";
                          // loop through results of database query, displaying them in the table
                          for ($i = $start; $i < $end; $i++) {
                              // make sure that PHP doesn't try to show results that don't exist
                              if ($i == $total_results) {
                                  break;
                              }


                            if (mysql_result($result, $i, 'active')  == 2){


                              // echo out the contents of each row into a table
                              echo "<tr class='danger'' " . $cls . ">";
                              echo '<td class="last">' . mysql_result($result, $i, 'user_email') . '</td>';
                              echo '<td class="last">' . mysql_result($result, $i, 'origin') . '</td>';
                              echo '<td>' . mysql_result($result, $i, 'track_number') . '</td>';
                              echo '<td>' . mysql_result($result, $i, 'date_arrive') . '</td>';
                              echo '<td>' . mysql_result($result, $i, 'weight') . '</td>';
                              echo '<td>

                      <form action="functions.php" method="post">
                      <button class="btn btn-warning btn-sm actions"  type="submit"  name="disuser" value="'. mysql_result($result, $i, 'email') .'" >Return to Store</button> </form>



                      <form action="functions.php" method="post">
                      <button class="btn btn-primary btn-sm actions"  type="submit"  name="active" value="'. mysql_result($result, $i, 'email') .'" >Add to Send</button>
                      </form>


                      <button class="btn btn-info btn-sm" name="editOrder" value="'. mysql_result($result, $i, 'email') .'" >New Order</button>

                      '
                                  ;
                              echo "</tr>";

                            }else
                            {
                                // echo out the contents of each row into a table
                              echo "<tr " . $cls . ">";
                              echo '<td>' . mysql_result($result, $i, 'user_email') . '</td>';
                              echo '<td>' . mysql_result($result, $i, 'origin') . '</td>';
                              echo '<td>' . mysql_result($result, $i, 'track_number') . '</td>';
                              echo '<td>' . mysql_result($result, $i, 'date_arrive') . '</td>';
                              echo '<td>' . mysql_result($result, $i, 'weight') . '</td>';
                              echo '<td>

                      <form action="functions.php" method="post">
                      <button class="btn btn-warning btn-sm actions"  type="submit"  name="disuser" value="'. mysql_result($result, $i, 'email') .'" >Return to Store</button> </form>



                      <form action="functions.php" method="post">
                      <button class="btn btn-primary btn-sm actions"  type="submit"  name="active" value="'. mysql_result($result, $i, 'email') .'" >Add to Send</button>
                      </form>



                      <button type="button" class="btn btn-info btn-sm" name="editOrder"  value="'. mysql_result($result, $i, 'email') .'" >New Order</button>

                      '
                                  ;
                              echo "</tr>";
                      }


                          }
                          // close table>
                      echo "</table>";
                           $reload = $_SERVER['PHP_SELF'] . "?tpages=" . $tpages;
                          echo '<div class="pager"><ul>';
                          if ($total_pages > 1) {
                              echo paginate($reload, $show_page, $total_pages);
                          }
                          echo "</ul></div>";
                      // pagination
                      ?>
                      <!--  </div>
                                  </div> -->
                              </div>





                <!--- END OF WAREHOUSE ITENS -->
                </div>
                <div id="menuListOfUsers" class="tab-pane fade">
                <h3>List of users</h3>



                <!--LIST OF USERS-->

                                <?php
                header('Content-Type: text/html; charset=utf-8');
                //include('_paginate_config.php');    //include of db config file
                //include ('_paginate.php'); //include of paginat page

                $per_page = 5;         // number of results to show per page

                //solving utf8 problem
                mysql_query("SET NAMES 'utf8'");
                mysql_query('SET character_set_connection=utf8');
                mysql_query('SET character_set_client=utf8');
                mysql_query('SET character_set_results=utf8');

                $result = mysql_query("SELECT * FROM users_tb");
                $total_results = mysql_num_rows($result);
                $total_pages = ceil($total_results / $per_page);//total pages we going to have

                //-------------if page is setcheck------------------//
                if (isset($_GET['page'])) {
                    $show_page = $_GET['page'];             //it will telles the current page
                    if ($show_page > 0 && $show_page <= $total_pages) {
                        $start = ($show_page - 1) * $per_page;
                        $end = $start + $per_page;
                    } else {
                        // error - show first set of results
                        $start = 0;
                        $end = $per_page;
                    }
                } else {
                    // if page isn't set, show first set of results
                    $start = 0;
                    $end = $per_page;
                }
                // display pagination
                $page = intval($_GET['page']);

                $tpages=$total_pages;
                if ($page <= 0)
                    $page = 1;
                ?>




                                  <div class="row">
                                          <!--    <div class="span6 offset3">
                                              <div class="mini-layout"> -->
                                                    <?php

                                    // display data in table
                                    echo "<table class='table table-bordered table-responsive'>";
                                    echo "<thead><tr><th>User ID</th><th>First Name</th> <th>Last Name</th><th>Email</th><th>Action</th></tr></thead>";
                                    // loop through results of database query, displaying them in the table
                                    for ($i = $start; $i < $end; $i++) {
                                        // make sure that PHP doesn't try to show results that don't exist
                                        if ($i == $total_results) {
                                            break;
                                        }


                                      if (mysql_result($result, $i, 'active')  == 2){


                                        // echo out the contents of each row into a table
                                        echo "<tr class='danger'' " . $cls . ">";
                                        echo '<td>' . mysql_result($result, $i, 'user_id') . '</td>';
                                        echo '<td>' . mysql_result($result, $i, 'name') . '</td>';
                                        echo '<td>' . mysql_result($result, $i, 'surname') . '</td>';
                                        echo '<td>' . mysql_result($result, $i, 'email') . '</td>';
                                        echo '<td>

                <form action="functions.php" method="post">
                <button class="btn btn-warning btn-sm actions"  type="submit"  name="disuser" value="'. mysql_result($result, $i, 'email') .'" >Disable</button> </form>



                <form action="functions.php" method="post">
                <button class="btn btn-primary btn-sm actions"  type="submit"  name="active" value="'. mysql_result($result, $i, 'email') .'" >Active</button>
                </form>


                 <form action="functions.php" method="post">
                <button class="btn btn-info btn-sm"  type="submit"  name="disuser" value="'. mysql_result($result, $i, 'email') .'" >Edit</button> </form>

                 '
                                            ;
                                        echo "</tr>";

                                      }else
                                      {
                                          // echo out the contents of each row into a table
                                        echo "<tr " . $cls . ">";
                                        echo '<td>' . mysql_result($result, $i, 'user_id') . '</td>';
                                        echo '<td>' . mysql_result($result, $i, 'name') . '</td>';
                                        echo '<td>' . mysql_result($result, $i, 'surname') . '</td>';
                                        echo '<td>' . mysql_result($result, $i, 'email') . '</td>';
                                        echo '<td>

                <form action="functions.php" method="post">
                <button class="btn btn-warning btn-sm actions"  type="submit"  name="disuser" value="'. mysql_result($result, $i, 'email') .'" >Disable</button> </form>



                <form action="functions.php" method="post">
                <button class="btn btn-primary btn-sm actions"  type="submit"  name="active" value="'. mysql_result($result, $i, 'email') .'" >Active</button>
                </form>


                 <form action="functions.php" method="post">
                <button class="btn btn-info btn-sm"  type="submit"  name="disuser" value="'. mysql_result($result, $i, 'email') .'" >Edit</button> </form>

                 '
                                            ;
                                        echo "</tr>";
                 }


                                    }
                                    // close table>
                                echo "</table>";
                                     $reload = $_SERVER['PHP_SELF'] . "?tpages=" . $tpages;
                                    echo '<div class="pager"><ul>';
                                    if ($total_pages > 1) {
                                        echo paginate($reload, $show_page, $total_pages);
                                    }
                                    echo "</ul></div>";
                            // pagination
                            ?>
                        <!--  </div>
                                            </div> -->
                                        </div>


                                <!--END OF LIST OF USERS-->






              </div>  <!--- END OF LIST OF USERS -->


                </div>



              <!--</div> -->
            </div>  <!--END OF JUMBTRON MAIN -->


            </div>

            </div>
            <!--/.col-->
            </div>
            <!--/.row-->
            </div>
            <!--/.main-->

            <script src="js/jquery-1.11.1.min.js"></script>
            <script src="js/bootstrap.min.js"></script>

            <script src="js/bootstrap-datepicker.js"></script>
            <script src="js/jquery.min.js"></script>

        <!--    <script>
                .menu {
                    display: inline - block;
                    float: none;
                }
-->
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
