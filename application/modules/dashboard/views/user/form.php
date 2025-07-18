<div class="row">
<div class="col-sm-12 col-md-12">
<div class="panel">
                <div class="panel-body">
                    <p class="dashboard_sms_form">
                    <?php echo display('managementsection') ?>
                 </p>
             </div>
         </div>
</div>
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?php echo (!empty($title)?$title:null) ?></h4>
                </div>
            </div>
            <div class="panel-body">
                <?php echo form_open_multipart("dashboard/user/form/$user->id") ?>
                    
                    <?php echo form_hidden('id',$user->id) ?>
                    
                    <div class="form-group row">
                        <label for="firstname" class="col-sm-3 col-form-label"><?php echo display('firstname') ?> *</label>
                        <div class="col-sm-9">
                            <input name="firstname" class="form-control" type="text" placeholder="<?php echo display('firstname') ?>" id="firstname"  value="<?php echo $user->firstname ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="lastname" class="col-sm-3 col-form-label"><?php echo display('lastname') ?> *</label>
                        <div class="col-sm-9">
                            <input name="lastname" class="form-control" type="text" placeholder="<?php echo display('lastname') ?>" id="lastname" value="<?php echo $user->lastname ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label"><?php echo display('email') ?> *</label>
                        <div class="col-sm-9">
                            <input name="email" class="form-control" type="text" placeholder="<?php echo display('email') ?>" id="email" value="<?php echo $user->email ?>">
                        </div>
                    </div> 

                    <div class="form-group row">
                        <label for="password" class="col-sm-3 col-form-label"><?php echo display('password') ?> *</label>
                        <div class="col-sm-9">
                            <input name="password" class="form-control" type="password" placeholder="<?php echo display('password') ?>" id="password">
                        </div>
                    </div>

                    <!-- Add after password input -->
                    <div class="form-group row">
                        <label for="confirm_password" class="col-sm-3 col-form-label"><?php echo display('confirm_password') ?> *</label>
                        <div class="col-sm-9">
                            <input name="confirm_password" class="form-control" type="password" placeholder="<?php echo display('confirm_password') ?>" id="confirm_password">
                            <small id="match-error" class="text-danger" style="display:none;">Passwords do not match.</small>
                        </div>
                    </div>

                    <!-- Add Login PIN field -->
                    <div class="form-group row">
                        <label for="login_pin" class="col-sm-3 col-form-label">Login Pin (4-digit)</label>
                        <div class="col-sm-9">
                            <input name="login_pin" class="form-control" type="text" maxlength="4" pattern="\d{4}" placeholder="e.g., 1234" id="login_pin" value="<?php echo (!empty($user->login_pin) ? $user->login_pin : '') ?>">
                            <span class="text-danger" id="pin-error" style="display:none;"></span>
                            <small class="text-muted">Enter a 4-digit numeric PIN.</small><br>
                            <button type="button" class="btn btn-sm btn-secondary mt-2" id="generate_pin">Generate PIN</button>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="pos_id" class="col-sm-3 col-form-label">Select Position as Employee *</label>
                        <div class="col-sm-9">
                            <select name="pos_id" id="pos_id" class="form-control" required>
                                <option value="">Select Position</option>
                                <?php foreach ($positions as $position): ?>
                                    <option value="<?php echo $position->pos_id; ?>" 
                                        <?php echo ($user->pos_id == $position->pos_id ? 'selected' : ''); ?>>
                                        <?php echo htmlspecialchars($position->position_name); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="role_id" class="col-sm-3 col-form-label">Role *</label>
                        <div class="col-sm-9">
                            <select name="role_id" id="role_id" class="form-control" required>
                                <option value="">Select Role</option>
                                <?php foreach ($roles as $role): ?>
                                    <option value="<?php echo $role->role_id; ?>" 
                                        <?php echo ($user->role_id == $role->role_id ? 'selected' : ''); ?>>
                                        <?php echo htmlspecialchars($role->role_name); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="about" class="col-sm-3 col-form-label"><?php echo display('about') ?></label>
                        <div class="col-sm-9">
                            <textarea name="about" placeholder="<?php echo display('about') ?>" class="form-control" id="about"><?php echo $user->about ?></textarea>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="preview" class="col-sm-3 col-form-label"><?php echo display('preview') ?></label>
                        <div class="col-sm-2">
                            <img src="<?php echo base_url(!empty($user->image)?$user->image: "./assets/img/icons/default.jpg") ?>" class="img-thumbnail" width="125" height="100">
                        </div>
                        <div class="col-sm-7">
                        
                        </div>
                        <input type="hidden" name="old_image" value="<?php echo $user->image ?>">
                    </div> 

                    <div class="form-group row">
                        <label for="image" class="col-sm-3 col-form-label"><?php echo display('image') ?></label>
                        <div class="col-sm-9">
                            <input type="file" name="image" id="image" aria-describedby="fileHelp">
                            <small id="fileHelp" class="text-muted"></small>
                        </div>
                    </div> 
				 <div class="form-group row">
                 <label for="istatus" class="col-sm-3 col-form-label"><?php echo display('isdisplaymonitor') ?></label>
                     <div class="col-sm-9">
                     		<div class="checkbox checkbox-success">
                               <input type="checkbox" name="ismonitor" <?php if($user->counter==1){ echo "checked";}?> value="1" id="ismonitor">
                               <label for="ismonitor"></label>
                         </div>
                     </div>
                 </div>
         
                    <div class="form-group row">
                        <label for="status" class="col-sm-3 col-form-label"><?php echo display('status') ?> *</label>
                        <div class="col-sm-9">
                            <label class="radio-inline">
                                <?php echo form_radio('status', '1', (($user->status==1 || $user->status==null)?true:false), 'id="status"'); ?><?php echo display('active') ?>
                            </label>
                            <label class="radio-inline">
                                <?php echo form_radio('status', '0', (($user->status=="0")?true:false) , 'id="status"'); ?><?php echo display('inactive') ?>
                            </label> 
                        </div>
                    </div>
         
                    <div class="form-group text-right">
                        <button type="reset" class="btn btn-primary w-md m-b-5"><?php echo display('reset') ?></button>
                        <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('save') ?></button>
                    </div>
                <?php echo form_close() ?>

            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function () {
    function validatePasswords() {
        var pass = $('#password').val();
        var confirmPass = $('#confirm_password').val();

        if (confirmPass.length > 0 && pass !== confirmPass) {
            $('#match-error').show();
            return false;
        } else {
            $('#match-error').hide();
            return true;
        }
    }

    // Realtime validation
    $('#confirm_password, #password').on('keyup blur', function () {
        validatePasswords();
    });

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
});

</script>

<script>
$(document).ready(function(){
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
