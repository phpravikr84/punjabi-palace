<?php $webinfo = $this->webinfo;
if (!empty($seoterm)) {
    $seoinfo = $this->db->select('*')->from('tbl_seoption')->where('title_slug', $seoterm)->get()->row();
}
?>
<!--Start Services-->
<section class="about_us sect_pad bg_img_area" style="padding: 50px 0px;">
    <div class="bg_img_left wow fadeIn" data-wow-delay="0.5s"></div>
    <div class="container">
        <div class="row about_inner">
            <div class="col-lg-12 col-xl-12 text-center wow fadeIn">
                <div class="sect_title mb-4">
                    <h2 class="curve_title">Banquet Hall</h2>
                    <h3 class="big_title">Book your next party at Punjabi Palace!</h3>
                    <p>We host a range of birthday, wedding and work parties throughout the year.</p>
                </div>
                <div class="aboutus_text mb-lg-0 mb-5">
                    <p class="mb-4"> Private functions can be hosted in our upstairs function room. The function room can accommodate 100 people for parties. A plasma screen and a full sound system are provided to guarantee the amusement of your guests. To enquire about our packages please call or email us.</p>
                    <!-- <a href="<?php echo base_url() . 'contact'; ?>" class="simple_btn"><?php echo display('contact_us') ?></a> -->
                </div>
            </div>
            <div class="col-lg-12 col-xl-12 text-center wow fadeIn" style="border: solid 1px #b9b9b9;border-radius: 20px;padding: 70px;box-shadow: 0px 0px 4px 0px #c4c4c4;">
                <div class="sect_title mb-4" style="padding-bottom: 15px;">
                    <h2 class="curve_title">Download Menu</h2>
                </div>
                <!-- <a href="<?php //echo base_url('pdf/Punjabi palace_Function MENU_16042025 copy.pdf') ?>" style="text-decoration:none; margin-top:50px;"><i class="fa fa-download" aria-hidden="true"></i>&nbsp;Download Banquet Menu</a><br /> -->
                    <?php if (!empty($pdf_materials)): ?>
                        <?php foreach ($pdf_materials as $pdf): ?>
                            <a href="<?= base_url('pdf/' . rawurlencode($pdf->pdf_file)); ?>" 
                            style="text-decoration:none; display:block; margin: 20px 0;" 
                            target="_blank">
                                <i class="fa fa-download" aria-hidden="true"></i>
                                &nbsp;<?= htmlspecialchars($pdf->btn_text); ?>
                            </a>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No menus available at the moment.</p>
                    <?php endif; ?>
            </div>
        </div>

        <div class="row about_inner" style="margin-top: 20px;">
            <div class="col-lg-12 col-xl-12 text-center wow fadeIn">
                <div class="sect_title mb-4">
                    <h2 class="curve_title">Catering</h2>
                    <!-- <h3 class="big_title">Punjabi Palace can cater to any party or event irrespective of how big or small. We specialize in catering with personalised service and special menus on request. We cater an elegant and interesting cuisine with a sophisticated Indian menu.</h3> -->
                </div>
                <div class="aboutus_text mb-lg-0 mb-5">
                    <p class="mb-4"> Punjabi Palace can cater to any party or event irrespective of how big or small. We specialize in catering with personalised service and special menus on request. We cater an elegant and interesting cuisine with a sophisticated Indian menu.</p>
                    <!-- <a href="<?php echo base_url() . 'contact'; ?>" class="simple_btn"><?php echo display('contact_us') ?></a> -->
                </div>
            </div>
        </div>

        <div class="row about_inner" style="margin-top: 20px; display: none">
            <div class="col-lg-12 col-xl-12 text-center wow fadeIn">
                <div class="sect_title mb-4">
                    <h2 class="curve_title">Home Delivery</h2>
                    <h3 class="big_title">A minimum order of $25 applies</h3>
                </div>
                <div class="aboutus_text mb-lg-0 mb-5">
                    <p class="mb-4"> For delivery outside these areas please talk to us by calling (07) 3846 3884
                        or email us at info@punjabipalace.com.au</p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Location</th>
                                <th>Charge in Dollars</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $delveryCharges = $this->db->select('*')->from('delivery_charges')->where('is_active', 1)->get()->result();
                            // echo "<pre>";
                            // print_r($delveryCharges);
                            // echo "</pre>";
                            // exit;
                                // if(count($delveryCharges)>0){
                                    foreach ($delveryCharges as $k => $v) {
                            ?>
                            <tr>
                                <td><?=$v->location;?></td>
                                <td><?=number_format($v->charge,2);?></td>
                            </tr>
                            <?php
                                    }
                                // }
                            ?>
                        </tbody>
                    </table>
                    <a href="<?php echo base_url() . 'contact'; ?>" class="simple_btn"><?php echo display('contact_us') ?></a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="offer_area bg_two sect_pad" style="padding: 50px 0px;">

        <div class="container">

            <div class="row offer_inner wow fadeIn" data-wow-delay="0.5s">

                <div class="bq_slider owl-carousel">

                    <!-- <div class="img_part mb-4 mb-md-0" style="margin-top: 20%;">
                        <a href="#"><img src="<?php echo base_url('assets/img/ue1.jpg'); ?>" class="img-fluid" alt="Our History"></a>
                    </div> -->

                    <div class="item">

                        <div class="img_area">

                            <img src="<?php echo base_url('assets/img/bq1.jpeg'); ?>" alt="Upcoming Events">

                        </div>

                    </div>
                    <div class="item">

                        <div class="img_area">

                            <img src="<?php echo base_url('assets/img/bq2.jpeg'); ?>" alt="Upcoming Events">

                        </div>

                    </div>
                    <div class="item">

                        <div class="img_area">

                            <img src="<?php echo base_url('assets/img/bq3.jpeg'); ?>" alt="Upcoming Events">

                        </div>

                    </div>
                    <div class="item">

                        <div class="img_area">

                            <img src="<?php echo base_url('assets/img/bq4.jpeg'); ?>" alt="Upcoming Events">

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>
<!-- End Services Area --> 