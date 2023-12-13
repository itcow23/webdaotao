<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="./assets/img/favicon.ico">
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Elearning</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/css/paper-kit.css?v=2.1.0" rel="stylesheet" />
    <!-- <link href="./assets/css/demo.css" rel="stylesheet" /> -->

    <!--     Fonts and icons     -->
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="./assets/css/nucleo-icons.css" rel="stylesheet">

</head>

<body class="ecommerce">
<nav class="navbar navbar-expand-lg fixed-top navbar-transparent nav-down" color-on-scroll="200">
		<div class="container">
			<div class="navbar-translate">
				<div class="navbar-header">
					<a class="navbar-brand" href="../presentation.html">Elearning</a>
				</div>
				<button class="navbar-toggler navbar-burger" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-bar"></span>
					<span class="navbar-toggler-bar"></span>
					<span class="navbar-toggler-bar"></span>
				</button>
			</div>
		</div>
	</nav>

    <div class="wrapper">
        <div class="page-header" style="background-image: url('./assets/img/img.jpg');">
            <div class="filter"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 ml-auto mr-auto">
                        <div class="card card-register" style="margin-top:100px; background-color:#0b1c2e; width:350px;">
                            <h3 class="card-title" style="color: white;">Đăng Nhập</h3>
                            <?php 
                                    session_start();
                                    if(isset($_SESSION['error'])){
                                    echo '<div class="alert alert-danger" role="alert">'.$_SESSION['error'].'</div>';
                                    unset($_SESSION['error']);
                                }
                            ?>
                            <form class="register-form" action="login_process.php">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control no-border" placeholder="Email">
                                <label>Mật khẩu</label>
                                <input type="password" name="matKhau" class="form-control no-border" placeholder="Mật khẩu">
                                <button class="btn btn-danger btn-block btn-round" >Đăng Nhập</button>
                            </form>
                            <!-- <div class="forgot">
                                <a href="#paper-kit" class="btn btn-link btn-danger">Forgot password?</a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

<!-- Core JS Files -->
<script src="./assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="./assets/js/jquery-ui-1.12.1.custom.min.js" type="text/javascript"></script>
<script src="./assets/js/popper.js" type="text/javascript"></script>
<script src="./assets/js/bootstrap.min.js" type="text/javascript"></script>

<!-- Plugin for Switches -->
<script src="./assets/js/bootstrap-switch.min.js"></script>

<!--  Plugins for Slider -->
<script src="./assets/js/nouislider.js"></script>

<!--  Plugins for Select -->
<script src="./assets/js/bootstrap-select.js"></script>

<!-- Control Center for Paper Kit: parallax effects, scripts for the example pages etc -->
<script src="./assets/js/paper-kit.js?v=2.1.0"></script>

</html>