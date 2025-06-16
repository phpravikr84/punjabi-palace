<?php $webinfo = $this->webinfo;
if (!empty($seoterm)) {
    $seoinfo = $this->db->select('*')->from('tbl_seoption')->where('title_slug', $seoterm)->get()->row();
}
?>
<!--Start Services-->
<section class="about_us sect_pad bg_img_area">
    <div class="bg_img_left wow fadeIn delivery_left_bg" data-wow-delay="0.5s"></div>
    <div class="container">




        <div class="row about_inner" style="margin-top: 20px;">
            <div class="col-lg-12 col-xl-12 text-center wow fadeIn">
                <div class="sect_title mb-4">
                    <h2 class="curve_title">Home Delivery</h2>
                    <h3 class="big_title">A minimum order of AUD $25 applies</h3>
                </div>
                <div class="aboutus_text mb-lg-0 mb-5">
                    <p class="mb-4"> For delivery outside these areas please talk to us by calling (07) 3846 3884
                        or email us at info@punjabipalace.com.au</p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Location</th>
                                <th>Charges in AUD</th>
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
<!-- End Services Area --> 