<?php
$webinfo = $this->webinfo;
$activethemeinfo = $this->themeinfo;
$acthemename = $activethemeinfo->themename;
?>
<section class="about_us sect_pad bg_img_area">
    <div class="bg_img_right bg_overlay" data-wow-delay="0.5s"></div>
    <div class="container wow fadeIn">
        <div class="row about_inner">            
        <div class="bg_img_left bg_overlay" data-wow-delay="0.5s" style="background: url('<?php echo base_url('application/views/themes/defaults/assets_web/images/background/3.png');?>') no-repeat;background-size: 10%;"></div>
            <div class="col-lg-7 col-xl-7 text-center wow fadeIn">
                <div class="sect_title mb-4">
                    <h2 class="curve_title">Download Menu</h2>
                    <div class="row" style="margin-top: 25px;">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="img_part mb-4 mb-md-0">
                                <a href="<?=base_url('our-menu');?>">
                                    <img src="<?php echo base_url('assets/img/menu1.jpeg') ?>" class="img-fluid" alt="Menu" style="width: 100%;" />
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6" style="padding: 50px;text-align: start;">
                            <!-- <a href="<?php //echo base_url('pdf/menu1.pdf') ?>" style="text-decoration:none; margin-top:50px;"><i class="fa fa-download" aria-hidden="true"></i>&nbsp;Download Dining Menu</a><br />
                            <br />
                            <a href="<?php //echo base_url('pdf/menu2.pdf') ?>" style="text-decoration:none;"><i class="fa fa-download" aria-hidden="true"></i>&nbsp;Download Take Away Menu</a><br />
                            <br />
                            <a href="<?php //echo base_url('pdf/Punjabi palace_Function MENU_16042025 copy.pdf') ?>" style="text-decoration:none; margin-top:50px;"><i class="fa fa-download" aria-hidden="true"></i>&nbsp;Download Banquet Menu</a><br /> -->
                            <?php if (!empty($pdf_materials)): ?>
                                <?php foreach ($pdf_materials as $material): ?>
                                    <a href="<?php echo base_url('pdf/' . $material->pdf_file); ?>" style="text-decoration:none; margin-top:20px;" target="_blank">
                                        <i class="fa fa-download" aria-hidden="true"></i>&nbsp;<?php echo htmlspecialchars($material->btn_text); ?>
                                    </a>
                                    <br><br>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p>No downloadable menus found for this page.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-5 col-xl-5 text-center wow fadeIn" style="border: solid 1px #b9b9b9;border-radius: 20px;padding: 70px;">
                <div class="sect_title mb-4">
                    <h2 class="curve_title">Place Your Request</h2>
                    <!-- <h3 class="big_title">Punjabi Palace can cater to any party or event irrespective of how big or small. We specialize in catering with personalised service and special menus on request. We cater an elegant and interesting cuisine with a sophisticated Indian menu.</h3> -->
                </div>
                <div class="aboutus_text mb-lg-0 mb-5">
                    <!-- <p class="mb-4"> Punjabi Palace can cater to any party or event irrespective of how big or small. We specialize in catering with personalised service and special menus on request. We cater an elegant and interesting cuisine with a sophisticated Indian menu.</p> -->
                    <!-- <a href="<?php echo base_url() . 'contact'; ?>" class="simple_btn"><?php echo display('contact_us') ?></a> -->
                </div>
                <div style="display: flex; justify-content:center;">
                <a class="button0">
                    <span class="glf-button" data-glf-cuid="ca8e1931-ace7-4935-bab3-13fec84504c7" data-glf-ruid="91be0740-f53e-4786-98f6-8c8d50e5e5c7">Order Online</span>
                </a>
                <!-- <a href="http://www.mylocalrestaurant.com.au/venue/punjabi-palace/"> -->
                <a href="https://www.opentable.com.au/r/punjabi-palace-reservations-south-brisbane?restref=278084&lang=en-AU&ot_source=Restaurant%20website">
                    <span class=gloriafood-button>
                        <span id=glf-restaurant-order-online>
                            <span style='mso-ansi-font-size:12.0pt;mso-bidi-font-size:12.0pt;mso-ascii-font-family:"Times New Roman";mso-hansi-font-family:"Times New Roman"'>Book Your Table</span>
                        </span>
                    </span>
                </a>
                </div>
                
            </div>
        </div>
    </div>
</section>

<script src="https://www.fbgcdn.com/widget/js/ewm2.js" defer async></script>