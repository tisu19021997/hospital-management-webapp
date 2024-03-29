<?php
//include_once "server.php";
include "database-config.php";
include "session.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>PPL Hospital</title>

    <!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.transitions.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>
<!--/head-->

<body id="home" class="homepage">

<header id="header">
    <nav id="main-menu" class="navbar navbar-default navbar-fixed-top" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="logo"></a>
            </div>

            <ul class="collapse navbar-collapse navbar-right">
                <ul class="nav navbar-nav">
                    <li class="scroll active"><a href="#home">Home</a></li>

					<?php

					//IF USER IS GUEST//
					if ( ! isset( $_SESSION['login_user'] ) && ! isset( $_SESSION['login_hos'] ) && ! isset( $_SESSION['login_admin'] ) ) {
						?>
                        <li class="scroll"><a href="" data-toggle="modal" data-target="#registerModal">Register</a></li>
                        <li class="scroll"><a href="" data-toggle="modal" data-target="#signInModal">Sign in</a>

                        </li>

						<?php
					} else {
						?>
                        <!--                    <!--RATING FOR PATIENTS, HOSPITALS, ADMIN-->
                        <!--                    <li class="scroll"><a href="#">Rating</a></li>-->
					<?php }
					?>
                    <li class="scroll"><a href="search.php">Search</a></li>
					<?php //IF USER IS ADMIN//
					if ( isset( $_SESSION['login_admin'] ) ) {
						?>
                        <li class="scroll"><a href="view-hospital.php">Hospitals & Doctors</a></li>
                        <li class=nav-item>
                            <a href="logout.php">Sign out</a>
                        </li>
                        <li class="scroll"><a href="#"
                                              style="color: #ff3100;">Hello, <?php echo $login_session ?></a>
                        </li>
					<?php }
					if ( session_status() == PHP_SESSION_ACTIVE ) {

						//IF USER IS PATIENT//
						if ( isset( $_SESSION['login_user'] ) ) {
							if ( $_SESSION['login_user'] ) { ?>
                                <li class="dropdown" role="presentation">
                                    <a id="dropdownMenu1" class="dropdown-toggle" href="#"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        Your Account <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                        <li><a class="dropdown-item" href="#" data-toggle="modal"
                                               data-target="#changeModal">Change Password</a></li>
                                    </ul>
                                </li>
                                <li class=nav-item>
                                    <a href="logout.php">Sign out</a>
                                </li>
                                <li class="scroll"><a href="#"
                                                      style="color: #ff3100;">Hello, <?php echo $login_session ?></a>
                                </li>
							<?php }
						}

						//IF USER IS HOSPITAL//
						if ( isset( $_SESSION['login_hos'] ) ) {
							if ( $_SESSION['login_hos'] ) { ?>
                                <!--                    <li class="scroll"><a href="#">Your Hospital</a></li>-->

                                <li class="dropdown" role="presentation">
                                    <a id="dropdownMenu2" class="dropdown-toggle" href="#"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        Your Hospital <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <li><a class="dropdown-item" href="#" data-toggle="modal"
                                               data-target="#changeModal">Change Password</a></li>

                                    </ul>
                                </li>
                                <li class="scroll"><a href="logout.php">Sign out</a></li>
                                <li class="scroll"><a href="#"
                                                      style="color: #ff3100;">Hello, <?php echo $login_session ?></a>
                                </li>
								<?php
							}
						}

					} ?>
                </ul>
            </ul>
        </div>

        <!-- Register Modal -->
        <div id="registerModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Registration</h4>
                    </div>
                    <div class="modal-body">
                        <div class="fluid-container">
                            <h2>Register a Patient/Hospital</h2>

                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#patient">Patient</a></li>
                                <li><a data-toggle="tab" href="#hospital">Hospital</a></li>

                            </ul>

                            <div class="tab-content">
                                <div id="patient" class="tab-pane fade in active">
                                    <h3>Register a patient</h3>
                                    <form id="regist-form"
                                          action="<?php echo htmlspecialchars( "register.php" ); ?>" method="post">

                                        <input type='hidden' name='submitted' id='submitted' value='1'/>

                                        <!--                                                Name-->
                                        <div class="form-group">
                                            <label for="fname">Your first name:</label>
                                            <input name="fname" type="text" class="form-control" id="fname">
                                            <label for="lname">Your last name:</label>
                                            <input name="lname" type="text" class="form-control" id="lname">
                                        </div>

                                        <!--                                                ID-->
                                        <div class="form-group">
                                            <label for="patient__id">Your ID:</label>
                                            <input name="id" type="text" class="form-control" id="id">
                                            <!--                                                Email-->
                                            <div class="form-group">
                                                <label for="email">Your email:</label>
                                                <input name="patient_email" type="email" class="form-control"
                                                       id="email">
                                            </div>

                                            <!--                                                Password-->
                                            <div class="form-group">
                                                <label for="passwd">Password:</label>
                                                <input name="password" type="password" class="form-control"
                                                       id="passwd">
                                            </div>

                                            <!--                                                Address-->
                                            <div class="form-group">
                                                <label for="patient__add">Address:</label>
                                                <input name="address" type="text" class="form-control"
                                                       id="patient_add">
                                            </div>

                                            <!--                                                Gender-->
                                            <div class="radio">
                                                <label><input type="radio" name="optradio"
                                                              checked="checked" value="Male">Male </label>
                                            </div>
                                            <div class="radio">
                                                <label><input type="radio" name="optradio" value="Female">Female
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label><input type="radio" name="optradio" value="Others">Others
                                                </label>
                                            </div>

                                            <!--                                                Languages-->
                                            <div class="form-group">
                                                <label for="input__language">Language</label>
                                                <select name="lang" id="input__language" class="form-control">
                                                    <option selected value="vietnamese">Vietnamese</option>
                                                    <option value="english">English</option>
                                                </select>
                                            </div>

                                            <button name="register" type="submit" class="btn btn-primary">Register
                                            </button>
                                    </form>
                                </div>
                            </div>
                            <!--                                        Hospital-->
                            <div id="hospital" class="tab-pane fade">
                                <h3>Register a hospital</h3>
                                <form id="regist-form-hospital"
                                      action="<?php echo htmlspecialchars( "register-hospital.php" ); ?>"
                                      method="post">

                                    <!--                                                Name-->

                                    <div class="form-group">
                                        <label for="hospital__name">Hospital Name:</label>
                                        <input name="hosname" type="text" class="form-control"
                                               id="hospital__name">
                                    </div>

                                    <!--                                                ID-->
                                    <div class="form-group">
                                        <label for="hospital__id">Hospital ID:</label>
                                        <input name="hosid" type="text" class="form-control" id="hospital__id">
                                    </div>

                                    <!--                                                Password-->
                                    <div class="form-group">
                                        <label for="hospital__pwd">Hospital Password:</label>
                                        <input name="hospwd" type="password" class="form-control"
                                               id="hospital__pwd">
                                    </div>

                                    <!--                                                Address-->
                                    <div class="form-group">
                                        <label for="hospital__add">Address:</label>
                                        <input name="hosadd" type="text" class="form-control"
                                               id="hospital__add">
                                    </div>

                                    <!--Hospital Admin Name-->
                                    <div class="form-group">
                                        <label for="hospital__admin--name">Hospital Admin Name:</label>
                                        <input name="hosadmin" type="text" class="form-control"
                                               id="hospital__admin--name">
                                    </div>

                                    <!--Hospital Admin Email-->
                                    <div class="form-group">
                                        <label for="hospital__admin--email">Hospital Admin Email:</label>
                                        <input name="hosemail" type="email" class="form-control"
                                               id="hospital__admin--email">
                                    </div>
                                    <button name="hosregister" type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <!-- Sign in Modal -->
        <div id="signInModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Sign in</h4>
                    </div>
                    <div class="modal-body">
                        <div class="fluid-container">
                            <h2>Sign in as a Patient/Hospital</h2>

                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#patient__signin">Patient</a></li>
                                <li><a data-toggle="tab" href="#hospital__signin">Hospital</a></li>

                            </ul>

                            <div class="tab-content">
                                <div id="patient__signin" class="tab-pane fade in active">
                                    <h3>Sign in as a patient</h3>
                                    <form id="patient__signin" action="<?php echo htmlspecialchars( "login.php" ); ?>"
                                          method="post">

                                        <!--                                                ID-->
                                        <div class="form-group">
                                            <label for="patientid">Your ID:</label>
                                            <input name="myid" type="text" class="form-control" id="patientid">
                                        </div>

                                        <!--                                                Password-->
                                        <div class="form-group">
                                            <label for="pwd">Password:</label>
                                            <input name="mypwd" type="password" class="form-control" id="pwd">
                                        </div>

                                        <button name="patient_login" type="submit" class="btn btn-primary">Sign in
                                        </button>
                                    </form>
                                </div>

                                <!--                                        Hospital-->
                                <div id="hospital__signin" class="tab-pane fade">
                                    <h3>Sign in as a hospital</h3>
                                    <form id="hospital__signin"
                                          action="<?php echo htmlspecialchars( "login-hospital.php" ); ?>"
                                          method="POST">


                                        <!--                                                Name-->

                                        <!--                                        <div class="form-group">-->
                                        <!--                                            <label for="hospitalname">Hospital Name:</label>-->
                                        <!--                                            <input type="text" class="form-control" id="hospitalname">-->
                                        <!--                                        </div>-->

                                        <!--                                                ID-->
                                        <div class="form-group">
                                            <label for="hospitalid">Hospital ID:</label>
                                            <input name="hospital-id" type="text" class="form-control" id="hospitalid">
                                        </div>

                                        <!--                                    Password-->
                                        <div class="form-group">
                                            <label for="hospitalpwd">Hospital Password:</label>
                                            <input name="hospital-pwd" type="password" class="form-control"
                                                   id="hospitalpwd">
                                        </div>

                                        <!--                                        Hospital Admin Name-->
                                        <!--                                        <div class="form-group">-->
                                        <!--                                            <label for="hospitaladmin--name">Hospital Admin Name:</label>-->
                                        <!--                                            <input type="email" class="form-control" id="hospitaladmin--name">-->
                                        <!--                                        </div>-->
                                        <!--                                        Hospital Admin Email-->
                                        <!--                                        <div class="form-group">-->
                                        <!--                                            <label for="hospitaladmin--email">Hospital Admin Email:</label>-->
                                        <!--                                            <input type="email" class="form-control" id="hospitaladmin--email">-->
                                        <!--                                        </div>-->

                                        <button name="login_hos" type="submit" class="btn btn-primary">Sign in</button>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                        data-target="#resetModal">Forgot your password?
                                </button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <!-- Change Password Modal -->
        <div id="changeModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Change your password</h4>
                    </div>
                    <div class="modal-body">
                        <div class="fluid-container">

                            <form id="patient__change" action="<?php echo htmlspecialchars( "change.php" ); ?>"
                                  method="post">

                                <!--Old Password-->
                                <div class="form-group">
                                    <label for="oldpassword">Your old password:</label>
                                    <input name="oldpwd" type="password" class="form-control" id="oldpassword">
                                </div>

                                <!-- New Password-->
                                <div class="form-group">
                                    <label for="newpwd">New password:</label>
                                    <input name="newpwd" type="password" class="form-control" id="newpwd">
                                </div>

                                <!-- Confirm New Password-->
                                <div class="form-group">
                                    <label for="conpwd">Confirm password:</label>
                                    <input name="conpwd" type="password" class="form-control" id="conpwd">
                                </div>

                                <button name="change_password" type="submit" class="btn btn-primary">Confirm
                                </button>
                            </form>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!--Reset Password Modal-->
        <div id="resetModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Reset your password</h4>
                    </div>
                    <div class="modal-body">
                        <div class="fluid-container">

                            <form id="patient__reset" action="<?php echo htmlspecialchars( "reset.php" ); ?>"
                                  method="post">

                                <!--ID-->
                                <div class="form-group">
                                    <label for="yourid">Your ID:</label>
                                    <input name="yourid" type="text" class="form-control" id="yourid">
                                </div>

                                <!--Email -->
                                <div class="form-group">
                                    <label for="youremail">Your email:</label>
                                    <input name="youremail" type="email" class="form-control" id="youremail">
                                </div>

                                <div class="form-group">
                                    <label for="objectu">Patient</label>
                                    <input type="checkbox" name="object" id="objectu" value="Patient">
                                    <label for="objecth">Hospital</label>
                                    <input type="checkbox" name="object" id="objecth" value="Hospital">
                                </div>

                                <button action="<?php echo htmlspecialchars( "sendMail/smtp.php" ); ?>"
                                        name="reset_password" type="submit" class="btn btn-primary">Confirm
                                </button>
                            </form>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!--/.container-->
    </nav>
    <!--/nav-->
</header>
<!--/header-->

<section id="main-slider">
    <div class="owl-carousel">
        <div class="item" style="background-image: url(images/slider/bg1.jpg);">
            <div class="slider-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="carousel-content">
                                <h2><span>PPL Hospital</span> is the best hospital website in Vietnam</h2>
                                <a class="btn btn-primary btn-lg" href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/.item-->
        <div class="item" style="background-image: url(images/slider/bg2.jpg);">
            <div class="slider-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="carousel-content">
                                <h2>Connect to our website now for <span>free</span></h2>
                                <p>Thousands of doctors and hospitals for your healthcare service. </p>
                                <a class="btn btn-primary btn-lg" href="#">Sign up</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/.item-->
    </div>
    <!--/.owl-carousel-->
</section>
<!--/#main-slider-->

<!--/#cta-->

<section id="services">
    <div class="container">

        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">Medical Services</h2>
            <p class="text-center wow fadeInDown">We always offer the best healthcare for you.
                <service></service>
            </p>
        </div>

        <div class="row">
            <div class="features">
                <div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">
                    <div class="media service-box">
                        <div class="pull-left">
                            <i class="fa fa-line-chart"></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Responsibility</h4>
                            <p>Reliable and energetic doctors.</p>
                        </div>
                    </div>
                </div>
                <!--/.col-md-4-->

                <div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="100ms">
                    <div class="media service-box">
                        <div class="pull-left">
                            <i class="fa fa-cubes"></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Cost-effective</h4>
                            <p>We offer wide range services that suitable for everybody.</p>
                        </div>
                    </div>
                </div>
                <!--/.col-md-4-->

                <div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="200ms">
                    <div class="media service-box">
                        <div class="pull-left">
                            <i class="fa fa-pie-chart"></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">World Class service</h4>
                            <p>Our services have been validated by Son Tung MTP Cop.</p>
                        </div>
                    </div>
                </div>
                <!--/.col-md-4-->

                <div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="300ms">
                    <div class="media service-box">
                        <div class="pull-left">
                            <i class="fa fa-bar-chart"></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Sameless Care</h4>
                            <p>Every aspect of your care is coordinated and teams of experts work together to provide
                                exactly the care you need.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/.row-->
    </div>
    <!--/.container-->
</section>
<!--/#services-->

<section id="portfolio">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">Our Works</h2>
            <p class="text-center wow fadeInDown">You can trust on us <br> Yeah trust on us.</p>
        </div>

        <div class="text-center">
            <ul class="portfolio-filter">
                <li><a class="active" href="#" data-filter="*">Our services</a></li>
            </ul>
            <!--/#portfolio-filter-->
        </div>

        <div class="portfolio-items">
            <div class="portfolio-item creative">
                <div class="portfolio-item-inner">
                    <img class="img-responsive" src="images/portfolio/ppl6.jpg" alt="">
                    <div class="portfolio-info">
                        <h3>Portfolio Item 1</h3>
                        Lorem Ipsum Dolor Sit
                        <a class="preview" href="images/portfolio/full.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                    </div>
                </div>
            </div>
            <!--/.portfolio-item-->

            <div class="portfolio-item corporate portfolio">
                <div class="portfolio-item-inner">
                    <img class="img-responsive" src="images/portfolio/ppl.jpg" alt="">
                    <div class="portfolio-info">
                        <h3>Portfolio Item 2</h3>
                        Lorem Ipsum Dolor Sit
                        <a class="preview" href="images/portfolio/full.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                    </div>
                </div>
            </div>
            <!--/.portfolio-item-->

            <div class="portfolio-item creative">
                <div class="portfolio-item-inner">
                    <img class="img-responsive" src="images/portfolio/ppl2.jpg" alt="">
                    <div class="portfolio-info">
                        <h3>Portfolio Item 3</h3>
                        Lorem Ipsum Dolor Sit
                        <a class="preview" href="images/portfolio/full.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                    </div>
                </div>
            </div>
            <!--/.portfolio-item-->

            <div class="portfolio-item corporate">
                <div class="portfolio-item-inner">
                    <img class="img-responsive" src="images/portfolio/ppl3.jpg" alt="">
                    <div class="portfolio-info">
                        <h3>Portfolio Item 4</h3>
                        Lorem Ipsum Dolor Sit
                        <a class="preview" href="images/portfolio/full.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                    </div>
                </div>
            </div>
            <!--/.portfolio-item-->

            <div class="portfolio-item creative portfolio">
                <div class="portfolio-item-inner">
                    <img class="img-responsive" src="images/portfolio/ppl4.jpg" alt="">
                    <div class="portfolio-info">
                        <h3>Portfolio Item 5</h3>
                        Lorem Ipsum Dolor Sit
                        <a class="preview" href="images/portfolio/full.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                    </div>
                </div>
            </div>
            <!--/.portfolio-item-->

            <div class="portfolio-item corporate">
                <div class="portfolio-item-inner">
                    <img class="img-responsive" src="images/portfolio/ppl.jpg" alt="">
                    <div class="portfolio-info">
                        <h3>Portfolio Item 5</h3>
                        Lorem Ipsum Dolor Sit
                        <a class="preview" href="images/portfolio/full.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                    </div>
                </div>
            </div>
            <!--/.portfolio-item-->

            <div class="portfolio-item creative portfolio">
                <div class="portfolio-item-inner">
                    <img class="img-responsive" src="images/portfolio/ppl5.jpg" alt="">
                    <div class="portfolio-info">
                        <h3>Portfolio Item 7</h3>
                        Lorem Ipsum Dolor Sit
                        <a class="preview" href="images/portfolio/full.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                    </div>
                </div>
            </div>
            <!--/.portfolio-item-->

            <div class="portfolio-item corporate">
                <div class="portfolio-item-inner">
                    <img class="img-responsive" src="images/portfolio/ppl3dsa.jpg" alt="">
                    <div class="portfolio-info">
                        <h3>Portfolio Item 8</h3>
                        Lorem Ipsum Dolor Sit
                        <a class="preview" href="images/portfolio/full.jpg" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                    </div>
                </div>
            </div>
            <!--/.portfolio-item-->
        </div>
    </div>
    <!--/.container-->
</section>
<!--/#portfolio-->

<section id="about">
    <div class="container">

        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">About Us</h2>
            <p class="text-center wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
        </div>

        <div class="row">
            <div class="col-sm-6 wow fadeInLeft">
                <h3 class="column-title">Video Intro</h3>
                <!-- 16:9 aspect ratio -->
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe src="//player.vimeo.com/video/58093852?title=0&amp;byline=0&amp;portrait=0&amp;color=e79b39"
                            frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                </div>
            </div>

            <div class="col-sm-6 wow fadeInRight">
                <h3 class="column-title">Multi Capability</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                    and scrambled it to make a type specimen book.</p>

                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                    took a galley of type and scrambled it to make a type specimen book.</p>

                <div class="row">
                    <div class="col-sm-6">
                        <ul class="nostyle">
                            <li><i class="fa fa-check-square"></i> Ipsum is simply dummy</li>
                            <li><i class="fa fa-check-square"></i> When an unknown</li>
                        </ul>
                    </div>

                    <div class="col-sm-6">
                        <ul class="nostyle">
                            <li><i class="fa fa-check-square"></i> The printing and typesetting</li>
                            <li><i class="fa fa-check-square"></i> Lorem Ipsum has been</li>
                        </ul>
                    </div>
                </div>

                <a class="btn btn-primary" href="#">Learn More</a>

            </div>
        </div>
    </div>
</section>
<!--/#about-->

<section id="work-process">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">Our Process</h2>
            <p class="text-center wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
        </div>

        <div class="row text-center">
            <div class="col-md-2 col-md-4 col-xs-6">
                <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                    <div class="icon-circle">
                        <span>1</span>
                        <i class="fa fa-coffee fa-2x"></i>
                    </div>
                    <h3>MEET</h3>
                </div>
            </div>
            <div class="col-md-2 col-md-4 col-xs-6">
                <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="100ms">
                    <div class="icon-circle">
                        <span>2</span>
                        <i class="fa fa-bullhorn fa-2x"></i>
                    </div>
                    <h3>PLAN</h3>
                </div>
            </div>
            <div class="col-md-2 col-md-4 col-xs-6">
                <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="200ms">
                    <div class="icon-circle">
                        <span>3</span>
                        <i class="fa fa-image fa-2x"></i>
                    </div>
                    <h3>TESTING</h3>
                </div>
            </div>
            <div class="col-md-2 col-md-4 col-xs-6">
                <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="300ms">
                    <div class="icon-circle">
                        <span>4</span>
                        <i class="fa fa-heart fa-2x"></i>
                    </div>
                    <h3>ADVICES</h3>
                </div>
            </div>
            <div class="col-md-2 col-md-4 col-xs-6">
                <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="400ms">
                    <div class="icon-circle">
                        <span>5</span>
                        <i class="fa fa-shopping-cart fa-2x"></i>
                    </div>
                    <h3>MEDICINE</h3>
                </div>
            </div>
            <div class="col-md-2 col-md-4 col-xs-6">
                <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="500ms">
                    <div class="icon-circle">
                        <span>6</span>
                        <i class="fa fa-space-shuttle fa-2x"></i>
                    </div>
                    <h3>CURE</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/#work-process-->




<section id="get-in-touch">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">Get in Touch</h2>
            <p class="text-center wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
        </div>
    </div>
</section>
<!--/#get-in-touch-->


<section id="contact">
    <div id="google-map" style="height:650px" data-latitude="52.365629" data-longitude="4.871331"></div>
    <div class="container-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-8">
                    <div class="contact-form">
                        <h3>Contact Info</h3>

                        <address>
                            <strong>PPL, Inc.</strong><br>
                            18/20 NDK, <br>
                            HCMC, Vietnam<br>
                            <abbr title="Phone">P:</abbr> (123) 456-7890
                        </address>

                        <form id="main-contact-form" name="contact-form" method="post" action="#">
                            <div class="form-group">
                                <input type="text" name="name1" class="form-control" placeholder="Name" required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email1" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="subject" class="form-control" placeholder="Subject" required>
                            </div>
                            <div class="form-group">
                                <textarea name="message" class="form-control" rows="8" placeholder="Message"
                                          required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/#bottom-->

<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
 
            </div>
            <div class="col-sm-6">
                <ul class="social-icons">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    <li><a href="#"><i class="fa fa-behance"></i></a></li>
                    <li><a href="#"><i class="fa fa-flickr"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-github"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!--/#footer-->

<script src="js/jquery.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/mousescroll.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/jquery.isotope.min.js"></script>
<script src="js/jquery.inview.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/main.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/additional-methods.min.js"></script>
<script type="text/javascript" src="js/form-validate.js"></script>
</body>

</html>
