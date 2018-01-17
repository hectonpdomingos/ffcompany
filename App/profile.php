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


<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

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
			<li class="active"><a href="index.html"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Profile Account</a></li>
			<li><a href="widgets.html"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Widgets</a></li>
			<li><a href="shipping.php"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Create a Shipping</a></li>
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

                <?php
                $userIdProfile;
                require('db.php');

                $servername;
                $username;
                $password;
                $dbname;
                $dbh;

                $dbh;

                $stmt = $dbh->prepare('SELECT * FROM users_tb WHERE user_id = :user_id');
                $stmt->execute(['user_id' => $userIdProfile]);
                $user = $stmt->fetch();

                $user_idfound = $user['user_id'];
                $namefound = $user['name'];
                $surnamefound = $user['surname'];
                $birthfound = $user['birth'];
                $emailfound = $user['email'];
                $addressfound = $user['address'];
                $zipcodefound = $user['zipcode'];
                $phonefound = $user['phone'];
                $phone2found = $user['phone2'];
                $countryfound = $user['country'];
                $languagefound = $user['language'];
                $datetimefound = $user['date_time'];
                $location_first_loginfound = $user['location_first_login'];
                $activefound = $user['active'];
                $levelfound = $user['level'];
                ?>



                <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Basic Info</a></li>
                <li><a data-toggle="tab" href="#menu1">Finance</a></li>
                <li><a data-toggle="tab" href="#menu2">Warehouse Itens</a></li>
                <li><a data-toggle="tab" href="#menu3">Create a package and send</a></li>
                </ul>


                <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
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
                           <select name="edcountry" class="form-control" >
                         <option value="<?php echo $countryfound; ?>"><?php echo $countryfound; ?></option>
                         <option></option>
                      	<option value="Afghanistan">Afghanistan</option>
                      	<option value="Åland Islands">Åland Islands</option>
                      	<option value="Albania">Albania</option>
                      	<option value="Algeria">Algeria</option>
                      	<option value="American Samoa">American Samoa</option>
                      	<option value="Andorra">Andorra</option>
                      	<option value="Angola">Angola</option>
                      	<option value="Anguilla">Anguilla</option>
                      	<option value="Antarctica">Antarctica</option>
                      	<option value="Antigua and Barbuda">Antigua and Barbuda</option>
                      	<option value="Argentina">Argentina</option>
                      	<option value="Armenia">Armenia</option>
                      	<option value="Aruba">Aruba</option>
                      	<option value="Australia">Australia</option>
                      	<option value="Austria">Austria</option>
                      	<option value="Azerbaijan">Azerbaijan</option>
                      	<option value="Bahamas">Bahamas</option>
                      	<option value="Bahrain">Bahrain</option>
                      	<option value="Bangladesh">Bangladesh</option>
                      	<option value="Barbados">Barbados</option>
                      	<option value="Belarus">Belarus</option>
                      	<option value="Belgium">Belgium</option>
                      	<option value="Belize">Belize</option>
                      	<option value="Benin">Benin</option>
                      	<option value="Bermuda">Bermuda</option>
                      	<option value="Bhutan">Bhutan</option>
                      	<option value="Bolivia, Plurinational State of">Bolivia, Plurinational State of</option>
                      	<option value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba</option>
                      	<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                      	<option value="Botswana">Botswana</option>
                      	<option value="Bouvet Island">Bouvet Island</option>
                      	<option value="Brazil">Brazil</option>
                      	<option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                      	<option value="Brunei Darussalam">Brunei Darussalam</option>
                      	<option value="Bulgaria">Bulgaria</option>
                      	<option value="Burkina Faso">Burkina Faso</option>
                      	<option value="Burundi">Burundi</option>
                      	<option value="Cambodia">Cambodia</option>
                      	<option value="Cameroon">Cameroon</option>
                      	<option value="Canada">Canada</option>
                      	<option value="Cape Verde">Cape Verde</option>
                      	<option value="Cayman Islands">Cayman Islands</option>
                      	<option value="Central African Republic">Central African Republic</option>
                      	<option value="Chad">Chad</option>
                      	<option value="Chile">Chile</option>
                      	<option value="China">China</option>
                      	<option value="Christmas Island">Christmas Island</option>
                      	<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                      	<option value="Colombia">Colombia</option>
                      	<option value="Comoros">Comoros</option>
                      	<option value="Congo">Congo</option>
                      	<option value="Congo, the Democratic Republic of the">Congo, the Democratic Republic of the</option>
                      	<option value="Cook Islands">Cook Islands</option>
                      	<option value="Costa Rica">Costa Rica</option>
                      	<option value="Côte d'Ivoire">Côte d'Ivoire</option>
                      	<option value="Croatia">Croatia</option>
                      	<option value="Cuba">Cuba</option>
                      	<option value="Curaçao">Curaçao</option>
                      	<option value="Cyprus">Cyprus</option>
                      	<option value="Czech Republic">Czech Republic</option>
                      	<option value="Denmark">Denmark</option>
                      	<option value="Djibouti">Djibouti</option>
                      	<option value="Dominica">Dominica</option>
                      	<option value="Dominican Republic">Dominican Republic</option>
                      	<option value="Ecuador">Ecuador</option>
                      	<option value="Egypt">Egypt</option>
                      	<option value="El Salvador">El Salvador</option>
                      	<option value="Equatorial Guinea">Equatorial Guinea</option>
                      	<option value="Eritrea">Eritrea</option>
                      	<option value="Estonia">Estonia</option>
                      	<option value="Ethiopia">Ethiopia</option>
                      	<option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                      	<option value="Faroe Islands">Faroe Islands</option>
                      	<option value="Fiji">Fiji</option>
                      	<option value="Finland">Finland</option>
                      	<option value="France">France</option>
                      	<option value="French Guiana">French Guiana</option>
                      	<option value="French Polynesia">French Polynesia</option>
                      	<option value="French Southern Territories">French Southern Territories</option>
                      	<option value="Gabon">Gabon</option>
                      	<option value="Gambia">Gambia</option>
                      	<option value="Georgia">Georgia</option>
                      	<option value="Germany">Germany</option>
                      	<option value="Ghana">Ghana</option>
                      	<option value="Gibraltar">Gibraltar</option>
                      	<option value="Greece">Greece</option>
                      	<option value="Greenland">Greenland</option>
                      	<option value="Grenada">Grenada</option>
                      	<option value="Guadeloupe">Guadeloupe</option>
                      	<option value="Guam">Guam</option>
                      	<option value="Guatemala">Guatemala</option>
                      	<option value="Guernsey">Guernsey</option>
                      	<option value="Guinea">Guinea</option>
                      	<option value="Guinea-Bissau">Guinea-Bissau</option>
                      	<option value="Guyana">Guyana</option>
                      	<option value="Haiti">Haiti</option>
                      	<option value="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option>
                      	<option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                      	<option value="Honduras">Honduras</option>
                      	<option value="Hong Kong">Hong Kong</option>
                      	<option value="Hungary">Hungary</option>
                      	<option value="Iceland">Iceland</option>
                      	<option value="India">India</option>
                      	<option value="Indonesia">Indonesia</option>
                      	<option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                      	<option value="Iraq">Iraq</option>
                      	<option value="Ireland">Ireland</option>
                      	<option value="Isle of Man">Isle of Man</option>
                      	<option value="Israel">Israel</option>
                      	<option value="Italy">Italy</option>
                      	<option value="Jamaica">Jamaica</option>
                      	<option value="Japan">Japan</option>
                      	<option value="Jersey">Jersey</option>
                      	<option value="Jordan">Jordan</option>
                      	<option value="Kazakhstan">Kazakhstan</option>
                      	<option value="Kenya">Kenya</option>
                      	<option value="Kiribati">Kiribati</option>
                      	<option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                      	<option value="Korea, Republic of">Korea, Republic of</option>
                      	<option value="Kuwait">Kuwait</option>
                      	<option value="Kyrgyzstan">Kyrgyzstan</option>
                      	<option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                      	<option value="Latvia">Latvia</option>
                      	<option value="Lebanon">Lebanon</option>
                      	<option value="Lesotho">Lesotho</option>
                      	<option value="Liberia">Liberia</option>
                      	<option value="Libya">Libya</option>
                      	<option value="Liechtenstein">Liechtenstein</option>
                      	<option value="Lithuania">Lithuania</option>
                      	<option value="Luxembourg">Luxembourg</option>
                      	<option value="Macao">Macao</option>
                      	<option value="Macedonia, the former Yugoslav Republic of">Macedonia, the former Yugoslav Republic of</option>
                      	<option value="Madagascar">Madagascar</option>
                      	<option value="Malawi">Malawi</option>
                      	<option value="Malaysia">Malaysia</option>
                      	<option value="Maldives">Maldives</option>
                      	<option value="Mali">Mali</option>
                      	<option value="Malta">Malta</option>
                      	<option value="Marshall Islands">Marshall Islands</option>
                      	<option value="Martinique">Martinique</option>
                      	<option value="Mauritania">Mauritania</option>
                      	<option value="Mauritius">Mauritius</option>
                      	<option value="Mayotte">Mayotte</option>
                      	<option value="Mexico">Mexico</option>
                      	<option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                      	<option value="Moldova, Republic of">Moldova, Republic of</option>
                      	<option value="Monaco">Monaco</option>
                      	<option value="Mongolia">Mongolia</option>
                      	<option value="Montenegro">Montenegro</option>
                      	<option value="Montserrat">Montserrat</option>
                      	<option value="Morocco">Morocco</option>
                      	<option value="Mozambique">Mozambique</option>
                      	<option value="Myanmar">Myanmar</option>
                      	<option value="Namibia">Namibia</option>
                      	<option value="Nauru">Nauru</option>
                      	<option value="Nepal">Nepal</option>
                      	<option value="Netherlands">Netherlands</option>
                      	<option value="New Caledonia">New Caledonia</option>
                      	<option value="New Zealand">New Zealand</option>
                      	<option value="Nicaragua">Nicaragua</option>
                      	<option value="Niger">Niger</option>
                      	<option value="Nigeria">Nigeria</option>
                      	<option value="Niue">Niue</option>
                      	<option value="Norfolk Island">Norfolk Island</option>
                      	<option value="Northern Mariana Islands">Northern Mariana Islands</option>
                      	<option value="Norway">Norway</option>
                      	<option value="Oman">Oman</option>
                      	<option value="Pakistan">Pakistan</option>
                      	<option value="Palau">Palau</option>
                      	<option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                      	<option value="Panama">Panama</option>
                      	<option value="Papua New Guinea">Papua New Guinea</option>
                      	<option value="Paraguay">Paraguay</option>
                      	<option value="Peru">Peru</option>
                      	<option value="Philippines">Philippines</option>
                      	<option value="Pitcairn">Pitcairn</option>
                      	<option value="Poland">Poland</option>
                      	<option value="Portugal">Portugal</option>
                      	<option value="Puerto Rico">Puerto Rico</option>
                      	<option value="Qatar">Qatar</option>
                      	<option value="Réunion">Réunion</option>
                      	<option value="Romania">Romania</option>
                      	<option value="Russian Federation">Russian Federation</option>
                      	<option value="Rwanda">Rwanda</option>
                      	<option value="Saint Barthélemy">Saint Barthélemy</option>
                      	<option value="Saint Helena, Ascension and Tristan da Cunha">Saint Helena, Ascension and Tristan da Cunha</option>
                      	<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                      	<option value="Saint Lucia">Saint Lucia</option>
                      	<option value="Saint Martin (French part)">Saint Martin (French part)</option>
                      	<option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                      	<option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                      	<option value="Samoa">Samoa</option>
                      	<option value="San Marino">San Marino</option>
                      	<option value="Sao Tome and Principe">Sao Tome and Principe</option>
                      	<option value="Saudi Arabia">Saudi Arabia</option>
                      	<option value="Senegal">Senegal</option>
                      	<option value="Serbia">Serbia</option>
                      	<option value="Seychelles">Seychelles</option>
                      	<option value="Sierra Leone">Sierra Leone</option>
                      	<option value="Singapore">Singapore</option>
                      	<option value="Sint Maarten (Dutch part)">Sint Maarten (Dutch part)</option>
                      	<option value="Slovakia">Slovakia</option>
                      	<option value="Slovenia">Slovenia</option>
                      	<option value="Solomon Islands">Solomon Islands</option>
                      	<option value="Somalia">Somalia</option>
                      	<option value="South Africa">South Africa</option>
                      	<option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
                      	<option value="South Sudan">South Sudan</option>
                      	<option value="Spain">Spain</option>
                      	<option value="Sri Lanka">Sri Lanka</option>
                      	<option value="Sudan">Sudan</option>
                      	<option value="Suriname">Suriname</option>
                      	<option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                      	<option value="Swaziland">Swaziland</option>
                      	<option value="Sweden">Sweden</option>
                      	<option value="Switzerland">Switzerland</option>
                      	<option value="Syrian Arab Republic">Syrian Arab Republic</option>
                      	<option value="Taiwan, Province of China">Taiwan, Province of China</option>
                      	<option value="Tajikistan">Tajikistan</option>
                      	<option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                      	<option value="Thailand">Thailand</option>
                      	<option value="Timor-Leste">Timor-Leste</option>
                      	<option value="Togo">Togo</option>
                      	<option value="Tokelau">Tokelau</option>
                      	<option value="Tonga">Tonga</option>
                      	<option value="Trinidad and Tobago">Trinidad and Tobago</option>
                      	<option value="Tunisia">Tunisia</option>
                      	<option value="Turkey">Turkey</option>
                      	<option value="Turkmenistan">Turkmenistan</option>
                      	<option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                      	<option value="Tuvalu">Tuvalu</option>
                      	<option value="Uganda">Uganda</option>
                      	<option value="Ukraine">Ukraine</option>
                      	<option value="United Arab Emirates">United Arab Emirates</option>
                      	<option value="United Kingdom">United Kingdom</option>
                      	<option value="United States">United States</option>
                      	<option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                      	<option value="Uruguay">Uruguay</option>
                      	<option value="Uzbekistan">Uzbekistan</option>
                      	<option value="Vanuatu">Vanuatu</option>
                      	<option value="Venezuela, Bolivarian Republic of">Venezuela, Bolivarian Republic of</option>
                      	<option value="Viet Nam">Viet Nam</option>
                      	<option value="Virgin Islands, British">Virgin Islands, British</option>
                      	<option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                      	<option value="Wallis and Futuna">Wallis and Futuna</option>
                      	<option value="Western Sahara">Western Sahara</option>
                      	<option value="Yemen">Yemen</option>
                      	<option value="Zambia">Zambia</option>
                      	<option value="Zimbabwe">Zimbabwe</option>
                      </select>
     <!--<input name="edcountry" type="text" class="form-control" value="<?php echo $countryfound; ?>" aria-describedby="sizing-addon1">
                        --> </div>
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
                 </div>
                </div>

                <div id="menu1" class="tab-pane fade">
                <h3>Finance</h3>
                <div class="ui steps">
                  <div class="active step">
                    <i class="payment icon"></i>
                    <div class="content">
                      <div class="title">Billing</div>
                      <div class="description">Enter billing information</div>
                    </div>
                  </div>
                </div>
                </div>


        <div id="menu2" class="tab-pane fade">
                <h3>Warehouse itens</h3>

                <?php
                header('Content-Type: text/html; charset=utf-8');
                include('_paginate_config.php');    //include of db config file
                include ('_paginate.php'); //include of paginat page

                $per_page = 20;         // number of results to show per page

                //solving utf8 problem
                mysql_query("SET NAMES 'utf8'");
                mysql_query('SET character_set_connection=utf8');
                mysql_query('SET character_set_client=utf8');
                mysql_query('SET character_set_results=utf8');

                $result = mysql_query("SELECT * FROM warehouse_packages_tb WHERE user_id ='$userIdProfile' AND status <>'Sent to User'");
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
                                    <?php
					echo "<div  id='boxes'>";
					echo "<form name='frm' method='post' action='shipping.php'>";
                    echo "<table class='table table-bordered table-responsive'>";
					echo "<thead><tr><th>Send</th><th class='last'>From</th><th>Track Number</th> <th>Date</th><th>Weight/LBS</th><th>Action</th></tr></thead>";

                    // loop through results of database query, displaying them in the table
                    for ($i = $start; $i < $end; $i++) {
                        // make sure that PHP doesn't try to show results that don't exist
                        if ($i == $total_results) {
                            break;
                        }

						            echo "<tr " . $cls . ">";
						            echo '<td class="last"> <input type="checkbox" name="ItemToSend[]" data-exval='.mysql_result($result, $i, 'weight').' value="' . mysql_result($result, $i, 'origin')."|" .mysql_result($result, $i, 'weight').'"></td>';
                        echo '<td class="last">' . mysql_result($result, $i, 'origin') . '</td>';
                        echo '<td>' . mysql_result($result, $i, 'track_number') . '</td>';
                        echo '<td >' . mysql_result($result, $i, 'date_arrive') . '</td>';
                        echo '<td class="last">' . mysql_result($result, $i, 'weight') . '</td>';
                        echo '<td>

                <form action="functions.php" method="post">
                <button class="btn btn-warning btn-sm actions"  type="submit"  name="disuser" value="'. mysql_result($result, $i, 'email') .'" >Return to Store</button> </form>
			         <button class="btn btn-info btn-sm" name="editOrder" value="'. mysql_result($result, $i, 'email') .'" >New Order</button>

                '
                            ;
                        echo "</tr>";

              }
					// close table>

				echo "</table>";

				echo "<div name='totalWeight' ><class='result' id='result'></div>";


				echo "<input type='submit' name='submit' value='Ship'>";
				echo "</form>";
                     $reload = $_SERVER['PHP_SELF'] . "?tpages=" . $tpages;
                    echo '<div class="pager"><ul>';
                    if ($total_pages > 1) {
                        echo paginate($reload, $show_page, $total_pages);
                    }
                    echo "</ul></div>";
                // pagination
				?>



                            </div>
                      </div>

                <div id="menu3" class="tab-pane fade">
                <h3>Create a package and send</h3>
                <div class="ui steps">
                  <div class="active step">
                    <i class="shipping icon"></i>
                    <div class="content">

                    </div>
                  </div>
                </div>
                </div>


                <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                      </div>
                      <div class="modal-body">
                      <input disabled="" value="<?php echo  mysql_result($result, $i, 'email'); ?> "> </input>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>

                  </div>
                </div>
<!--#####################  -->

						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->


	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
    <script src="js/semantic.min.js"></script>


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

$(document).ready(function(){
 					   var valorDaDiv = $(".result").text();
  					    $("#totalWeight").val(valorDaDiv);
				});

</script>
<!-- sum of selected boxes -->
<script>
    $(document).ready(function () {
        //Set a handler to catch clicking the check box
        $("#boxes input[type='checkbox']").click(function () {
            var total = 0;
            //lOOP THROUGH CHECKED
            $("#boxes input[type='checkbox']:checked").each(function () {
                //Update total
                total += parseFloat($(this).data("exval"), 10);


            });
            $("#result").text(total);


        });

    });
</script> <!-- end sum of selected boxes -->


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
