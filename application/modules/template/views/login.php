<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo (!empty($setting->title) ? $setting->title : null) ?> :: <?php echo (!empty($title) ? $title : null) ?></title>
    <link rel="shortcut icon" href="<?php echo base_url((!empty($setting->favicon) ? $setting->favicon : 'assets/img/icons/favicon.png')) ?>" type="image/x-icon">
    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/pe-icon-7-stroke.css') ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/custom.min.css') ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/extra.css') ?>" type="text/css" />
    <style>
        body {
            background: url('assets/img/login-background.webp') no-repeat center;
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
            padding: 10px;
            color: #fff;
        }

        .login-content {
            width: 400px;
            background-color: rgba(0, 0, 0, 0.8);
            padding: 50px;
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
            background-color: #efe6d7 !important;
            color: #000 !important;
            text-transform: uppercase;
            width: 100%;
            max-width: 250px;
            display: block;
            text-align: center;
            margin: 10px auto;
        }

        .vh100 {
            height: 100vh;
            position: absolute;
            right: 6%;
        }

        .inpt-cuslogform {
            border-radius: 9px !important;
            width: 100%;
            z-index: 1;
            position: relative;
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
            margin-bottom: 0;
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

        .form-control:not(.captcha-row .form-control) {
            padding-left: 40px !important;
        }

        .captcha-row .form-control:focus,
        .captcha-row .form-control:focus-within,
        .captcha-row .form-control:focus-out {
            text-indent: 0;
        }

        .eye {
            font-size: 15px;
            padding: 7px;
            cursor: pointer;
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

        .pin-input {
            width: 50px;
            text-align: center;
            margin-right: 10px;
        }

        .pin-input:last-child {
            margin-right: 0;
        }

        .nav-tabs {
            display: flex;
            flex-wrap: nowrap;
            width: 100%;
            border-bottom: 1px solid #efe6d7;
        }

        .nav-tabs .nav-item {
            flex: 1;
            text-align: center;
        }

        .nav-tabs .nav-link {
            color: #fff;
            padding: 8px 10px;
            font-size: 14px;
            white-space: nowrap;
            border-radius: 4px 4px 0 0;
        }

        .nav-tabs .nav-link.active {
            background-color: #504A4A;
            color: #efe6d7;
            border-color: #efe6d7;
            border-bottom: none;
        }

        .nav-tabs .nav-link:hover {
            color: #efe6d7;
        }

        @media (max-width: 400px) {
            .login-content {
                width: 100%;
                padding: 20px;
            }

            .nav-tabs .nav-link {
                font-size: 12px;
                padding: 6px 8px;
            }
        }

        @media (min-width:320px) {
            .main_content .col-lg-7,
            .main_content .col-lg-5 {
                text-align: center;
                justify-content: center;
            }
            .main_content .login-img img {
                width: 95%;
            }
        }

        @media (min-width:481px) {
            .main_content .col-lg-7,
            .main_content .col-lg-5 {
                text-align: center;
                justify-content: center;
            }
            .main_content .login-img img {
                width: 95%;
            }
        }
    </style>
</head>

<body>
    <div class="row main_content">
        <div class="col-lg-7 col-sm-12 col-md-7 d-flex justify-content-left text-left">
            <div class="p-4 login-img">
                <img src="<?php echo base_url('assets/img/pp-big-logo.png'); ?>" alt="Logo" class="img-fluid">
            </div>
        </div>
        <div class="col-lg-5 col-sm-12 col-md-5 d-flex justify-content-right text-right">
            <div class="login-content login-content_bg p-4">
                <?php //if ($this->session->flashdata('form_submitted')) { ?>
                    <div class="mt-3">
                        <?php if ($this->session->flashdata('message')) { ?>
                            <div class="alert alert-info alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <?php echo $this->session->flashdata('message'); ?>
                            </div>
                        <?php } ?>

                        <?php if ($this->session->flashdata('exception')) { ?>
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <?php echo $this->session->flashdata('exception'); ?>
                            </div>
                        <?php } ?>

                        <?php if (validation_errors()) { ?>
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <?php echo validation_errors(); ?>
                            </div>
                        <?php } ?>
                    </div>
                <?php //} ?>

                <div class="text-center mt-3">
                    <h1 class="text-white login-textheading"><?php echo 'Welcome !'; ?></h1>
                </div>

                <!-- Tabs for Login Options -->
                <ul class="nav nav-tabs" id="loginTabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($this->session->flashdata('active_tab') !== 'pin' ? 'active' : ''); ?>" id="username-tab" data-toggle="tab" href="#username" role="tab" aria-controls="username" aria-selected="<?php echo ($this->session->flashdata('active_tab') !== 'pin' ? 'true' : 'false'); ?>">Login with Username</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($this->session->flashdata('active_tab') === 'pin' ? 'active' : ''); ?>" id="pin-tab" data-toggle="tab" href="#pin" role="tab" aria-controls="pin" aria-selected="<?php echo ($this->session->flashdata('active_tab') === 'pin' ? 'true' : 'false'); ?>">Login with PIN</a>
                    </li>
                </ul>

                <div class="tab-content" id="loginTabContent">
                    <!-- Username Login Tab -->
                    <div class="tab-pane fade <?php echo ($this->session->flashdata('active_tab') !== 'pin' ? 'show active' : ''); ?>" id="username" role="tabpanel" aria-labelledby="username-tab">
                        <?php echo form_open('login', 'id="loginFormUsername" novalidate'); ?>
                        <input type="hidden" name="login_type" value="username">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-envelope" style="color: #999;"></i></span>
                                <input type="text" class="form-control" aria-label="<?php echo display('email') ?>" placeholder="<?php echo display('email') ?>" name="email" id="email" value="<?php echo set_value('email', $this->session->flashdata('email')); ?>" autocomplete="off" style="padding-left: 0px !important;" />
                            </div>
                        </div>

                        <div class="form-group">
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
                                    <input type="text" placeholder="Write captcha" name="captcha" id="captcha" class="form-control fs-15px" autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-login btn-lg btn-block mb-3"><?php echo 'Sign In'; ?></button>
                        </form>
                    </div>

                    <!-- PIN Login Tab -->
                    <div class="tab-pane fade <?php echo ($this->session->flashdata('active_tab') === 'pin' ? 'show active' : ''); ?>" id="pin" role="tabpanel" aria-labelledby="pin-tab">
                        <?php echo form_open('login', 'id="loginFormPin" novalidate'); ?>
                        <input type="hidden" name="login_type" value="pin">
                        <div class="form-group">
                            <div class="input-group d-flex justify-content-between">
                                <?php
                                $pin = $this->session->flashdata('login_pin') ?? '';
                                $pin_digits = str_split($pin);
                                ?>
                                <input type="text" class="form-control pin-input" maxlength="1" oninput="moveToNext(this, 'pin2')" id="pin1" value="<?php echo isset($pin_digits[0]) ? $pin_digits[0] : ''; ?>" autocomplete="off">
                                <input type="text" class="form-control pin-input" maxlength="1" oninput="moveToNext(this, 'pin3')" id="pin2" value="<?php echo isset($pin_digits[1]) ? $pin_digits[1] : ''; ?>" autocomplete="off">
                                <input type="text" class="form-control pin-input" maxlength="1" oninput="moveToNext(this, 'pin4')" id="pin3" value="<?php echo isset($pin_digits[2]) ? $pin_digits[2] : ''; ?>" autocomplete="off">
                                <input type="text" class="form-control pin-input" maxlength="1" oninput="moveToNext(this, null)" id="pin4" value="<?php echo isset($pin_digits[3]) ? $pin_digits[3] : ''; ?>" autocomplete="off">
                                <input type="hidden" name="login_pin" id="login_pin" value="<?php echo $pin; ?>">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-login btn-lg btn-block mb-3"><?php echo 'Sign In'; ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer bg-white py-2 shadow-sm">
        <div class="container"></div>
    </footer>

    <script src="<?php echo base_url('assets/js/jquery-1.12.4.min.js') ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>" type="text/javascript"></script>
    <script type="text/javascript">
        const togglePassword = (th) => {
            const pass_input = th.closest('.input-group').find('input').not('[type=hidden]'),
                type = pass_input.attr('type') === 'password' ? 'text' : 'password',
                iele = (type === 'text') ? `<i class="fa fa-eye-slash" aria-hidden="true"></i>` : `<i class="fa fa-eye" aria-hidden="true"></i>`;
            pass_input.attr('type', type);
            th.html(iele);
        };

        // Move to next input field for PIN
        function moveToNext(current, nextFieldId) {
            if (current.value.length >= 1 && nextFieldId) {
                document.getElementById(nextFieldId).focus();
            }
            // Update hidden input with combined PIN
            const pin = $('#pin1').val() + $('#pin2').val() + $('#pin3').val() + $('#pin4').val();
            $('#login_pin').val(pin);
        }

        // Restrict PIN inputs to numbers only
        $('.pin-input').on('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        // Handle PIN form submission
        $('#loginFormPin').on('submit', function(e) {
            const pin = $('#login_pin').val();
            if (pin.length !== 4) {
                e.preventDefault();
                alert('Please enter a 4-digit PIN.');
            }
        });

        $(document).ready(function () {
            // Get active tab from PHP flashdata, fallback to 'username'
            const activeTab = '<?php echo ($this->session->flashdata('active_tab') === 'pin') ? 'pin' : 'username'; ?>';

            // Show the correct tab using Bootstrap's tab method
            $('#loginTabs a[href="#' + activeTab + '"]').tab('show');

            // Bootstrap handles tab switching automatically, but this ensures we maintain state
            $('#loginTabs a').on('shown.bs.tab', function (e) {
                // e.target: newly activated tab
                // e.relatedTarget: previous tab
                const target = $(e.target).attr('href');
                $('.tab-pane').removeClass('show active');
                $(target).addClass('show active');
            });
        });

    </script>
    <style>
        #loginTabContent {
            margin-top: 20px;
        }
        .pin-input {
            text-align: center;
        }
        
        .pin-input.form-control:not(.captcha-row .form-control) {
            padding-left: 0 !important;
        }

    </style>
</body>

</html>