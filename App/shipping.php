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


$username =  $_SESSION['name'];
$userIdProfile = $_SESSION['user_id'];
$userEmail = $_SESSION['email'];
?>


        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="My freight forwarder" content="">
        <meta name="My freight forwarder" content="">
        <link rel="icon" href="favicon.png">

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles-dashboard.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/components/icon.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/components/step.css" /><!--Icons-->
<script src="js/lumino.glyphs.js"></script>
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
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg><?php echo $username; ?><span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
							<li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li>
							<li><a href="logout.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>

		</div><!-- /.container-fluid -->
	</nav>

	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				User photo Profile
			</div>
		</form>
		<ul class="nav menu">
			<li ><a href="profile.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Profile Account</a></li>
			<li><a href="widgets.html"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Widgets</a></li>
			<li class="active"><a href="shipping.php"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Create a Shipping</a></li>
			<li><a href="tables.html"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Tables</a></li>
			<li><a href="invoice.php"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Invoice</a></li>
			<li><a href="tos.html"><svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window"></use></svg> Terms of Use</a></li>

			<li class="parent ">

			</li>

		</ul>

	</div><!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">

		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Activities Overview    <?php echo $userProfile; ?></div>
					<div class="panel-body">
						<div class="canvas-wrapper">
<!-- ###########################################  -->


</ul>

    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Package</th>
                         <th class="text-center">     </th>
                         <th class="text-left">Weight</th>




                        <th> </th>
                    </tr>
                </thead>
                <tbody>

                  <?php
                         $packages;
                         $numberOfPackages;
                         $totalWeight;
                         $item = $_POST['ItemToSend'];
                            foreach ($item as $value)
                                {

                                    list($productOrigin, $productWeight) = explode("|", $value);
                                    $packages = $packages + " : " + $values;
                                    $totalWeight = $totalWeight +  $productWeight;

                                    $numberOfPackages =  $numberOfPackages + 1;

                                    // $store = preg_replace('/ #Track.*/', '', $value);
                                    // $tnumber = preg_replace('#^.*?(N:.*?#W).*$#i', '$1', $value);


                     echo "<tr>";
                     echo "       <td class='col-md-6'>";
                     echo "       <div class='media'>";
                     echo "           <a class='thumbnail pull-left' href='#'> <img class='media-object' src='img/dashboard/product-icon.png' style='width: 72px; height: 72px;'> </a>";
                     echo "           <div class='media-body'>";
                     echo "               <h4 class='media-heading'><a href='#'>Product name</a></h4>";
                     echo "               <h5 class='media-heading'> Description:  <label>$productOrigin</label></h5>";
                     echo "               <span>Status: </span><span class='text-warning'><strong>Leaves warehouse in 2 - 3 weeks</strong></span>";
                     echo "           </div>";
                     echo "       </div></td>";
                     echo "       <td class='col-md-2' style='text-align: center'>";
                     //echo "       <input type='text' class='form-control' id='trackNumber' value='.$tnumber.'>";
                     echo "       </td>";

                     echo "       <td class='col-md-1 text-center'><strong>$productWeight</strong></td>";
                     echo "       <td class='col-md-1'>";

                     echo "   </tr>";
                                }

                     ?>
                     <tr>
                         <td>   </td>
                         <td>   </td>
                         <td>   </td>
                         <td><h5>Total Weight*</h5></td>
                         <td class="text-right">  <strong><?php echo $totalWeight; ?></strong></h5></td>

                     </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Warehouse service</h5></td>
                        <td class="text-right"><h5><?php echo $numberOfPackages; ?> Packages:  <?php echo $totalWeight; ?> LBS <strong> </strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Estimated shipping</h5></td>
                        <td class="text-right"><h5><strong>$6.94</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong>$31.53</strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td></td>
                        <td>
                        </td>
                        <td>
                        <button type="button" class="btn btn-success">
                            Order <span class="glyphicon glyphicon-play"></span>
                        </button></td>
                    </tr>
                       <td> *lbs measurement (pound), each lbs is approximately 328.9 grams. 1KG is 2.20462 pound. </td>
                </tbody>
            </table>
        </div>
    </div>


<!--############################################# -->

						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->


	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>



<script>

$(document).ready(function() {
  $('#myModal').on('show.bs.modal', function(e) {
    var id = $(e.relatedTarget).data('id');
    alert(id);
    $(".idhere").html(id);
  });
});


</script>


	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){
		        $(this).find('em:first').toggleClass("glyphicon-minus");
		    });
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>
</body>

</html>
