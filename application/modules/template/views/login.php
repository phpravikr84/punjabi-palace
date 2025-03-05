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
    .eye
    {
        font-size: 15px; padding: 7px; cursor:pointer;
    }
    .input-group-append
    {
        align-content: center; background: #F6F7FB;
    }
    .input-group-addon {
        padding: 6px 12px;
        font-size: 14px;
        font-weight: 400;
        line-height: 1;
        color: #ffffff;
        text-align: center;
        background-color: #504a4a;
        border: 1px solid #504a4a;
        border-radius: 10px;
    }
 </style>
</head>

<body>

    <div class="login vh100 d-flex align-items-center justify-content-center">
        <div class="login-content login-content_bg p-4">
            <div class="circle-logo text-center">
                <img src="assets/img/adzguru-icon.png" alt="Logo" class="rounded-circle img-fluid"> 
            </div>
            
            <div class="mt-3">
                <?php if ($this->session->flashdata('message')) { ?>
                <div class="alert alert-info alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $this->session->flashdata('message'); ?>
                </div> 
                <?php } ?>

                <?php if ($this->session->flashdata('exception')) { ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $this->session->flashdata('exception'); ?>
                </div>
                <?php } ?>

                <?php if (validation_errors()) { ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo validation_errors(); ?>
                </div>
                <?php } ?> 
            </div>

            <div class="text-center mt-3">
                <h1 class="text-white login-textheading"><?php echo 'Welcome !'; ?></h1>
            </div>

            <?php echo form_open('login','id="loginForm" novalidate'); ?>   
                <div class="form-group mt-4">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-envelope" style="color: #999;"></i></span>
                        <input type="text" placeholder="<?php echo display('email') ?>" name="email" id="email" class="form-control fs-15px inpt-cuslogform" autocomplete="off">
                    </div>
                </div>

                <div class="form-group">
                    <!-- <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock" style="color: #999;"></i></span>
                        <input type="password" placeholder="<?php echo display('password') ?>" name="password" id="password" class="form-control fs-15px inpt-cuslogform" autocomplete="off">
                    </div> -->
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-lock" style="color: #999;"></i></span>
                        <input type="password" class="form-control" aria-label="<?php echo display('password') ?>" placeholder="<?php echo display('password') ?>" name="password" id="password" autocomplete="off" style="padding-left: 0px !important;" />
                        <span class="input-group-addon eye" onclick="togglePassword($(this));"><i class="fa fa-eye" aria-hidden="true"></i></span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="captcha-row">
                        <div class="col-md-6" style="padding-left: unset; padding-right: 3px;">
                            <label class="control-label" for="captcha"><?php echo $captcha_image ?></label>
                        </div>
                        <div class="col-md-6" style="padding-left: 3px; padding-right: unset;">
                            <input type="text" placeholder="Write captcha"laceholder="<?php echo display('captcha') ?>" name="captcha" id="captcha" class="form-control fs-15px" autocomplete="off" wfd-id="id3">
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-login btn-lg btn-block mb-3"><?php echo 'Sign In'; ?></button>

                <!-- <div class="text-center mt-3">
                    <img src="assets/adzguru-logo.jpg" class="img-fluid" alt="company Image" width="90">
                </div> -->


            </form>
        </div>
    </div>
    
    <footer class="footer bg-white py-2 shadow-sm">
        <div class="container">
            <div class="row">
            <div class="col-md-12 text-right text-light">
                Powered by ❤️ Adzguru (PNG) Limited
            </div>
            </div>
        </div>
    </footer>
    <style>
    body {
    background: url('assets/img/login-bgnew.jpg') no-repeat center;
    background-size: cover;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
}
.footer {
    position: fixed;
    bottom: 0;
    width: 100%;
    padding:10px;
    color: #fff;
    /* background-color: rgba(255, 255, 255, 0.25); */
  }
.login-content {
    width: 400px;
    background-color: rgba(0, 0, 0, 0.8);
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    align-items: center;
}


.circle-logo {
    width: 100px;
    height: 100px;
    position: absolute;
    top: -50px;
    left: 50%;
    transform: translateX(-50%);
    background: url('assets/img/circle-transparent-half.png') no-repeat center/cover;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.circle-logo::before {
    content: "";
    width: 78%;
    height: 78%;
    background-color: #fff;
    border-radius: 50%;
    position: absolute;
    
}

.circle-logo img {
    width: 50%;
    height: auto;
    position: relative;
    z-index: 2;
}

.login-textheading {
    font-size: 2rem;
    text-transform: uppercase;
    font-weight: bold;
    text-align: center;
}

.form-group {
    width: 100%;
}

.input-group {
    width: 100%;
}

.form-control {
    background-color: #504A4A !important;
    color: white !important;
    border: none !important;
    padding: 12px 15px;
    width: 100%;
}

.inpt-cuslogform::placeholder {
    color: rgba(255, 255, 255, 0.7) !important;
}

.input-group-text {
    border: none !important;
    color: white !important;
    padding: 10px 15px;
}

.btn-login {
    background-color: #D4A333 !important;
    color: white !important;
    text-transform: uppercase;
    width: 100%; /* Center and make button full width */
    max-width: 250px;
    display: block;
    text-align: center;
    margin: 10px auto; /* Center the button */
}

.vh100 {
    height: 100vh;
    position: absolute;
    right:18%;
}

.input-group-text {
    position: relative;
    z-index: 9;
    left: 5px;
    bottom:-30px;
}

.inpt-cuslogform {
    border-radius: 9px !important;
    width: 100%;
    z-index: 1;
    position: relative; /* Fixed positioning issue */
    top: 0;
    left: 0;
}

.captcha-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
}

.captcha-row .form-group {
    flex: 1;
    margin-bottom: 0; /* Prevent extra spacing */
}

.captcha-row img {
    max-width: 100%;
    height: auto;
    display: block;
    margin-top: 10px;
}

.error-print {
    margin-top: 30px;
}

/* Apply text indent on focus and remove on focus out, except for captcha-row input */
/* 

/* Apply padding to all inputs except captcha */
.form-control:not(.captcha-row .form-control) {
    padding-left: 40px !important;
}

/* Ensure captcha input remains unchanged */
.captcha-row .form-control:focus,
.captcha-row .form-control:focus-within,
.captcha-row .form-control:focus-out {
    text-indent: 0;
}

    </style>



    <script src="<?php echo base_url('assets/js/jquery-1.12.4.min.js') ?>" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>" type="text/javascript"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <script type="text/javascript">
            const togglePassword = (th) => {
                const pass_input = th.closest('.input-group').find('input'),
                    type = pass_input.attr('type') === 'password' ? 'text' : 'password',
                    iele = (type === 'text') ? `<i class="fa fa-eye-slash" aria-hidden="true"></i>` : `<i class="fa fa-eye" aria-hidden="true"></i>`;
                pass_input.attr('type', type);
                // toggle the eye / eye slash icon
                // th.find('i').addClass('fa fa-eye-slash');
                th.html(iele);
            };
        </script>

</body>

</html>