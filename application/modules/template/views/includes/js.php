<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
<!-- jquery-ui --> 
<script src="<?php echo base_url('/ordermanage/order/showljslang') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('/ordermanage/order/basicjs') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/jquery-ui.min.js') ?>" type="text/javascript"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>" type="text/javascript"></script>
<!-- Bootstrap tag input-->
<script src="<?php echo base_url('assets/js/bootstrap-tagsinput.js') ?>" type="text/javascript"></script>
<!-- lobipanel -->
<script src="<?php echo base_url('assets/js/lobipanel.min.js') ?>" type="text/javascript"></script>
<!-- Pace js -->
<script src="<?php echo base_url('assets/js/pace.min.js') ?>" type="text/javascript"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('assets/js/jquery.slimscroll.min.js') ?>" type="text/javascript"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/js/fastclick.min.js') ?>" type="text/javascript"></script>
<!-- Select2 -->
<script src="<?php echo base_url('assets/js/select2.min.js') ?>" type="text/javascript"></script>
<!-- bootstrap timepicker -->
<script src="<?php echo base_url('assets/js/jquery-ui-sliderAccess.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/jquery-ui-timepicker-addon.min.js') ?>" type="text/javascript"></script>
<!-- tinymce js -->
<script src="<?php echo base_url('assets/tinymce/tinymce.min.js') ?>" type="text/javascript"></script>
<!-- dataTables js -->
<script src="<?php echo base_url('assets/datatables/js/dataTables.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/datatables/js/buttons.colVis.min.js') ?>" type="text/javascript"></script>

<!-- AdminBD frame -->
<script src="<?php echo base_url('assets/js/frame.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/jquery.confirm.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/fontawesome-iconpicker.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/sweetalert/sweetalert.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/toastr/toastr.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/pusher.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/mousetrap-master/mousetrap.min.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/print.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/masonry-package.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/images.loaded.js') ?>" type="text/javascript"></script>
<!-- End Core Plugins -->

<!-- Dashboard js -->
<script src="<?php echo base_url('assets/js/dashboard.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('application/modules/template/assets/js/template.js'); ?>" type="text/javascript"></script>
<?php //echo $this->router->fetch_class(); ?>
<?php if($this->router->fetch_class() == 'purchase'){ ?>
<!-- Select box cdn path -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Include module Script -->
 <?php  } ?>
<?php
    $path = 'application/modules/';
    $map  = directory_map($path);
    if (is_array($map) && sizeof($map) > 0)
    foreach ($map as $key => $value) {
        $js   = str_replace("\\", '/', $path.$key.'assets/js/script.js'); 
        if (file_exists($js)) {
           echo "<script src=".base_url($js)."?v=1.4 type=\"text/javascript\"></script>";
        }   
    }   
?>

<script>
    
$(document).ready(function () {
    $(".sidebar-toggle").on("click", function () {
        if ($("body").hasClass("sidebar-collapse")) {
            console.log("class exist in body");
            $(".leftSidebarPosMain").css("overflow", "hidden");
            $(".slimScrollDiv").css({
                "overflow-y": "auto",
                "overflow-x": "hidden",
                "padding-right": "5px"
            });
           
        } else {
            console.log("class not exist in body");
           
            $(".leftSidebarPosMain").css("overflow", "visible");
            $(".slimScrollDiv").css({
                "overflow-y": "visible",
                "overflow-x": "visible",
                "padding-right": "0px"
            });
        }
    });
});

</script>
