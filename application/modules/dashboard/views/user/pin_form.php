<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel">
            <div class="panel-body">
                <p class="dashboard_sms_form">
                    <?php echo display('pin_management'); ?>
                </p>
            </div>
            <div class="flex pull-right">
                <a href="<?php echo base_url('dashboard/user/pin_list'); ?>" class="btn btn-primary btn-md">
                    <i class="fa fa-plus"></i> <?php echo 'Back to List'; ?>
                </a>
            </div>
        </div>
    </div>

    <div class="col-sm-12 col-md-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?php echo (!empty($title) ? $title : 'Change PIN'); ?></h4>
                </div>
            </div>

            <div class="panel-body">
                <?php echo form_open('dashboard/user/pin_management'); ?>
                <input type="hidden" name="id" value="<?php echo $selected_user->id; ?>">

                <div class="form-group row">
                    <label for="user_id" class="col-sm-3 col-form-label"><?php echo display('user'); ?> *</label>
                    <div class="col-sm-9">
                        <select name="user_id" id="user_id" class="form-control" required>
                            <?php foreach ($users as $user): ?>
                                <option value="<?php echo $user->id; ?>"
                                    <?php
                                        echo set_select('user_id', $user->id); // retains selection after POST error
                                        if (!empty($selected_user) && $selected_user->id == $user->id && !set_value('user_id')) {
                                            echo ' selected';
                                        }
                                    ?>>
                                    <?php echo $user->firstname . ' ' . $user->lastname; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="login_pin" class="col-sm-3 col-form-label"><?php echo 'Login PIN'; ?></label>
                    <div class="col-sm-9">
                        <input name="login_pin" class="form-control" type="text" maxlength="4" pattern="\d{4}" placeholder="e.g., 1234" id="login_pin" value="<?php echo (!empty($selected_user->login_pin) ? $selected_user->login_pin : '') ?>">
                        <span class="text-danger" id="pin-error" style="display:none;"></span>
                        <small class="text-muted">Enter a 4-digit numeric PIN.</small><br>
                        <button type="button" class="btn btn-sm btn-secondary mt-2" id="generate_pin">Generate PIN</button>
                    </div>
                </div>


                <div class="form-group text-right">
                    <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('save') ?></button>
                </div>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    $('form').on('submit', function (e) {
        var isPasswordValid = validatePasswords();
        var pin = $('#login_pin').val();

        if (!isPasswordValid) {
            e.preventDefault();
        }

        if (pin && !/^\d{4}$/.test(pin)) {
            alert("Login PIN must be a 4-digit number.");
            e.preventDefault();
        }
    });
    // Validate on blur
    $('#login_pin').on('blur', function(){
        var loginPin = $(this).val();
        var myurl = baseurl + 'dashboard/user/check_login_pin_unique';
        var csrf = $('#csrfhashresarvation').val();

        if (loginPin.length === 4 && /^\d{4}$/.test(loginPin)) {
            $.ajax({
                type: "GET",
                url: myurl,
                data: { login_pin: loginPin, csrf_test_name: csrf },
                dataType: "json",
                success: function(response) {
                    if (!response.status) {
                        $('#pin-error').text(response.message).show();
                        $('#login_pin').val('').focus();
                    } else {
                        $('#pin-error').hide();
                    }
                },
                error: function(xhr) {
                    console.error('AJAX Error:', xhr);
                }
            });
        }
    });

    // Generate unique 4-digit PIN
    $('#generate_pin').click(function(){
        var myurl = baseurl + 'dashboard/user/check_login_pin_unique';
        var csrf = $('#csrfhashresarvation').val();

        function tryGeneratePin() {
            let randomPin = Math.floor(1000 + Math.random() * 9000); // 4-digit number
            $.ajax({
                type: "GET",
                url: myurl,
                data: { login_pin: randomPin, csrf_test_name: csrf },
                dataType: "json",
                success: function(response) {
                    if (response.status) {
                        $('#login_pin').val(randomPin);
                        $('#pin-error').hide();
                    } else {
                        tryGeneratePin(); // Try again
                    }
                },
                error: function(xhr) {
                    console.error('AJAX Error:', xhr);
                }
            });
        }

        tryGeneratePin();
    });
});
</script>

