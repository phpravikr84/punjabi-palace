<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo (!empty($setting->title)?$setting->title:null) ?> :: <?php echo (!empty($title)?$title:null) ?></title>
	<link rel="shortcut icon" href="<?php echo base_url((!empty($setting->favicon)?$setting->favicon:'assets/img/icons/favicon.png')) ?>" type="image/x-icon">
    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="<?php echo base_url('assets/css/pe-icon-7-stroke.css') ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url('assets/css/custom.min.css') ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url('assets/css/extra.css') ?>" rel="stylesheet" type="text/css" />
    <style>

  body {
    background: url('assets/img/login-bg.jpeg') no-repeat center;
    background-size: cover;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
  }

   .circle-logo {
    top: -50px;
    left: 50%;
    transform: translateX(-50%);
    width: 100px;
    height: 100px;
    position: absolute;
    background-color: #fff;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    padding:10px;
    border-radius:100%;
  }

  .circle-logo img {
    width: 70%;
    height: auto;
    position: relative;
  }

</style>

</head>

<body>
    <div class="login vh100">
        <div class="login-content login-content_bg">
        <div class="circle-logo text-center">
      <img src="assets/logo.png" alt="Logo" class="rounded-circle img-fluid">
    </div>
        	<div class="mb-3">
                            <!-- alert message -->
                            <?php if ($this->session->flashdata('message') != null) {  ?>
                            <div class="alert alert-info alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo $this->session->flashdata('message'); ?>
                            </div> 
                            <?php } ?>
                            
                            <?php if ($this->session->flashdata('exception') != null) {  ?>
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo $this->session->flashdata('exception'); ?>
                            </div>
                            <?php } ?>
                            
                            <?php if (validation_errors()) {  ?>
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo validation_errors(); ?>
                            </div>
                            <?php } ?> 
                        </div>
                 <div class="text-center mb-5">
                    <h1 class="mt-4 text-white"><?php echo display('login') ?></h1>
                    <!-- <div class="text-white">
                        <?php echo (!empty($setting->title)?$setting->title:null) ?>
                    </div> -->
                </div>
                <?php echo form_open('login','id="loginForm" novalidate'); ?>            
                <div class="form-group">
                    <label for="email"><?php echo display('email') ?></label>
                    <input type="text" placeholder="<?php echo display('email') ?>" name="email" id="email" class="form-control fs-15px" autocomplete="off"> 
                </div>
                <div class="form-group">
                    <label for="password"><?php echo display('password') ?></label>
                    <input type="password"  placeholder="<?php echo display('password') ?>" name="password" id="password" class="form-control fs-15px" autocomplete="off"> 
                </div>
                <div class="form-group">
                    <label class="control-label" for="captcha"><?php echo $captcha_image ?></label>
                    
                    <input type="captcha"  placeholder="<?php echo display('captcha') ?>" name="captcha" id="captcha" class="form-control fs-15px" autocomplete="off"> 
                </div> 
                <button type="submit" class="btn btn-success btn-lg btn-block fw-500 mb-3"><?php echo display('login') ?></button>
                
            </form>
        </div>
    </div>
    <footer class="footer bg-white py-2 shadow-sm">
        <div class="container">
            <div class="row">
            <div class="col-md-6 text-start">
                ©2025 Punjabi Palace
            </div>
            <div class="col-md-6 text-right">
                Developed with ❤️ by Adzguru (PNG) Limited
            </div>
            </div>
        </div>
    </footer>

<!-- Footer Styling -->
<style>
  .footer {
    position: fixed;
    bottom: 0;
    width: 100%;
    padding:10px;
    color: #fff;
    background-color: rgba(255, 255, 255, 0.25);
  }
</style>

    <script src="<?php echo base_url('assets/js/jquery-1.12.4.min.js') ?>" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>" type="text/javascript"></script>
</body>

</html>