<?php

if (!function_exists('http_post'))
{

    function http_post($url, $data)
    {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, count($data));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        $output = curl_exec($ch);

        curl_close($ch);
        return $output;
    }

}

if (!function_exists('RandomPassword'))
{
function RandomPassword(){
		$chars = "abcdefghijkmnopqrstuvwxyz023456789";
		srand((double)microtime()*1000000);
		$i = 0;
		$pass = '' ;
		while($i <= 7){
			$num = rand() % 33;
			$tmp = substr($chars, $num, 1);
			$pass = $pass.$tmp;
			$i++;
		}
		return $pass;
	}
}
if (!function_exists('time_elapsed'))
{

    function time_elapsed($datetime, $full = false)
    {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );

        foreach ($string as $k => &$v) {
            if ($diff->$k)
            {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            }
            else
            {
                unset($string[$k]);
            }
        }

        if (!$full)
        {
            $string = array_slice($string, 0, 1);
        }

        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }

}
if (!function_exists('SubscribeEmail'))
{
	function SubscribeEmail($email){
	   
$emailcontent='<!doctype html>
<html>
  <head>
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Subscription/Contact</title>
    <style>
    @media only screen and (max-width: 620px) {
      table[class=body] h1 {
        font-size: 28px !important;
        margin-bottom: 10px !important;
      }
      table[class=body] p,
            table[class=body] ul,
            table[class=body] ol,
            table[class=body] td,
            table[class=body] span,
            table[class=body] a {
        font-size: 16px !important;
      }
      table[class=body] .wrapper,
            table[class=body] .article {
        padding: 10px !important;
      }
      table[class=body] .content {
        padding: 0 !important;
      }
      table[class=body] .container {
        padding: 0 !important;
        width: 100% !important;
      }
      table[class=body] .main {
        border-left-width: 0 !important;
        border-radius: 0 !important;
        border-right-width: 0 !important;
      }
      table[class=body] .btn table {
        width: 100% !important;
      }
      table[class=body] .btn a {
        width: 100% !important;
      }
      table[class=body] .img-responsive {
        height: auto !important;
        max-width: 100% !important;
        width: auto !important;
      }
    }

    @media all {
      .ExternalClass {
        width: 100%;
      }
      .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
        line-height: 100%;
      }
      .apple-link a {
        color: inherit !important;
        font-family: inherit !important;
        font-size: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
        text-decoration: none !important;
      }
      .btn-primary table td:hover {
        background-color: #34495e !important;
      }
      .btn-primary a:hover {
        background-color: #34495e !important;
        border-color: #34495e !important;
      }
    }
    </style>
  </head>
  <body class="" style="background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
    <table border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background-color: #f6f6f6;">
      <tr>
        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
        <td class="container" style="font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; Margin: 0 auto; max-width: 580px; padding: 10px; width: 580px;">
          <div class="content" style="box-sizing: border-box; display: block; Margin: 0 auto; max-width: 580px; padding: 10px;">

            <!-- START CENTERED WHITE CONTAINER -->
            <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">This is preheader text. Some clients will show this text as a preview.</span>
            <table class="main" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background: #ffffff; border-radius: 3px;">

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;">
                  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                    <tr>
                      <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Hi '.$email.',</p>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Thanks for your subscription</p>
                        <table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; box-sizing: border-box;">
                          <tbody>
                            
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

            <!-- END MAIN CONTENT AREA -->
            </table>

            <!-- START FOOTER -->
            
            <!-- END FOOTER -->

          <!-- END CENTERED WHITE CONTAINER -->
          </div>
        </td>
        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
      </tr>
    </table>
  </body>
</html>';
	   
	return $emailcontent;
	}
}
if (!function_exists('ReservationEmail'))
{
	function ReservationEmail($id,$mobile=null){
	  $ci =& get_instance();
	  $reservesql = $ci->db->query("SELECT * FROM tblreservation where reserveid='".$id."'"); 
    $reserveinfo= $reservesql->row();
    $resql = $ci->db->query("SELECT * FROM customer_info where customer_id='".$reserveinfo->cid."'");	
	  $resinfo= $resql->row();
	  $tablesql = $ci->db->query("SELECT * FROM rest_table where tableid='".$reserveinfo->tableid."'");	
	  $tableinfo= $tablesql->row();
    $newdate= date('Y-m-d' , strtotime($reserveinfo->reserveday));

    
$emailcontent='<!doctype html>
<html>
  <head>
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Subscription/Contact</title>
    <style>
    @media only screen and (max-width: 620px) {
      table[class=body] h1 {
        font-size: 28px !important;
        margin-bottom: 10px !important;
      }
      table[class=body] p,
            table[class=body] ul,
            table[class=body] ol,
            table[class=body] td,
            table[class=body] span,
            table[class=body] a {
        font-size: 16px !important;
      }
      table[class=body] .wrapper,
            table[class=body] .article {
        padding: 10px !important;
      }
      table[class=body] .content {
        padding: 0 !important;
      }
      table[class=body] .container {
        padding: 0 !important;
        width: 100% !important;
      }
      table[class=body] .main {
        border-left-width: 0 !important;
        border-radius: 0 !important;
        border-right-width: 0 !important;
      }
      table[class=body] .btn table {
        width: 100% !important;
      }
      table[class=body] .btn a {
        width: 100% !important;
      }
      table[class=body] .img-responsive {
        height: auto !important;
        max-width: 100% !important;
        width: auto !important;
      }
    }

    @media all {
      .ExternalClass {
        width: 100%;
      }
      .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
        line-height: 100%;
      }
      .apple-link a {
        color: inherit !important;
        font-family: inherit !important;
        font-size: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
        text-decoration: none !important;
      }
      .btn-primary table td:hover {
        background-color: #34495e !important;
      }
      .btn-primary a:hover {
        background-color: #34495e !important;
        border-color: #34495e !important;
      }
    }
    </style>
  </head>
  <body class="" style="background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
    <table border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background-color: #f6f6f6;">
      <tr>
        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
        <td class="container" style="font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; Margin: 0 auto; max-width: 580px; padding: 10px; width: 580px;">
          <div class="content" style="box-sizing: border-box; display: block; Margin: 0 auto; max-width: 580px; padding: 10px;">

            <!-- START CENTERED WHITE CONTAINER -->
            <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">This is preheader text. Some clients will show this text as a preview.</span>
            <table class="main" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background: #ffffff; border-radius: 3px;">

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;">
                  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                    <tr>
                      <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Hi '.$resinfo->customer_name.',</p>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Phone:'.$mobile.'</p>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Date:'.$newdate.'</p>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Number Of People:'.$reserveinfo->person_capicity.'</p>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Your Reservation is Booked.Please inform me if anything change.\r\n Thank You</p>
                        <table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; box-sizing: border-box;">
                          <tbody>
                            
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

            <!-- END MAIN CONTENT AREA -->
            </table>

            <!-- START FOOTER -->
            
            <!-- END FOOTER -->

          <!-- END CENTERED WHITE CONTAINER -->
          </div>
        </td>
        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
      </tr>
    </table>
  </body>
</html>';

	return $emailcontent;
	}
}
if (!function_exists('SendorderEmail'))
{
	function SendorderEmail($orderid,$customerid){
	   $ci =& get_instance();
	   $ordersql = $ci->db->query("SELECT * FROM customer_order where order_id='".$orderid."'");	
	   $orderinfo= $ordersql->row();
       $rowdt = $ci->db->query("SELECT order_menu.*,item_foods.ProductsID,item_foods.ProductName,item_foods.ProductImage,variant.variantid,variant.variantName,variant.price FROM order_menu Left Join item_foods ON order_menu.menu_id=item_foods.ProductsID Left Join variant ON order_menu.varientid=variant.variantid where order_menu.order_id='".$orderid."'");	
	   $oredritem= $rowdt->result();
	   $resql = $ci->db->query("SELECT * FROM customer_info where customer_id='".$customerid."'");	
	   $resinfo= $resql->row();
	   $bill = $ci->db->query("SELECT * FROM bill where order_id='".$orderid."'");	
	   $billinfo= $bill->row();
	   $items='';
	   $subtotal=0;
	   foreach($oredritem as $item){
		   $getitemin= $ci->db->query("SELECT item_foods.ProductsID,item_foods.ProductName,variant.variantid,variant.variantName,variant.price FROM item_foods Left Join variant ON item_foods.ProductsID=variant.menuid where item_foods.ProductsID='".$item->menu_id."' AND variant.variantid='".$item->varientid."'");
		   $itemininfo= $getitemin->row();	
		   if(!empty($item->add_on_id)){
			   
			   $addons=explode(",",$item->add_on_id);
			   $addonsqtym=explode(",",$item->addonsqty);
			     $x=0;
				 $addonsname='';
				 $addonsprice='';
				 $addonsqty='';
				 $adstotalprice='';
				 foreach($addons as $addonsid){
					  $getaddons = $ci->db->query("SELECT * FROM add_ons where add_on_id='".$addonsid."'");	
	                  $adonsinfo= $getaddons->row();
					  $addonsname.=$adonsinfo->add_on_name.',';
					  $addonsprice.=$adonsinfo->price.',';
					  $addonsqty.=$addonsqtym[$x].',';
					  $adstotalprice=$adonsinfo->price*$addonsqtym[$x];
					  $x++;
				 }
				  $addonsname=trim($addonsname,',');
				  $addonsprice=trim($addonsprice,',');
				  $addonsqty=trim($addonsqty,',');
				  $isaddons='Addons:'.$addonsname.' - price:'.$adstotalprice;
				  $totalp=($item->menuqty*$itemininfo->price)+$adstotalprice;
			   }
			else{
				$isaddons="";
				$adstotalprice="";
				$totalp=$item->menuqty*$itemininfo->price;
				}
	   $subtotal=$subtotal+$totalp;
	   $items.='<tr><td>'.$itemininfo->ProductName.' '.$isaddons.'</td><td>'.$itemininfo->variantName.'</td><td>'.$item->menuqty.'</td><td>'.$itemininfo->price.'</td><td>'.$totalp.'</td></tr>';
	   }
	   
$emailcontent='<!doctype html>
<html>
  <head>
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Subscription/Contact</title>
    <style>
    @media only screen and (max-width: 620px) {
      table[class=body] h1 {
        font-size: 28px !important;
        margin-bottom: 10px !important;
      }
      table[class=body] p,
            table[class=body] ul,
            table[class=body] ol,
            table[class=body] td,
            table[class=body] span,
            table[class=body] a {
        font-size: 16px !important;
      }
      table[class=body] .wrapper,
            table[class=body] .article {
        padding: 10px !important;
      }
      table[class=body] .content {
        padding: 0 !important;
      }
      table[class=body] .container {
        padding: 0 !important;
        width: 100% !important;
      }
      table[class=body] .main {
        border-left-width: 0 !important;
        border-radius: 0 !important;
        border-right-width: 0 !important;
      }
      table[class=body] .btn table {
        width: 100% !important;
      }
      table[class=body] .btn a {
        width: 100% !important;
      }
      table[class=body] .img-responsive {
        height: auto !important;
        max-width: 100% !important;
        width: auto !important;
      }
    }

    @media all {
      .ExternalClass {
        width: 100%;
      }
      .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
        line-height: 100%;
      }
      .apple-link a {
        color: inherit !important;
        font-family: inherit !important;
        font-size: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
        text-decoration: none !important;
      }
      .btn-primary table td:hover {
        background-color: #34495e !important;
      }
      .btn-primary a:hover {
        background-color: #34495e !important;
        border-color: #34495e !important;
      }
    }
    </style>
  </head>
  <body class="" style="background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
    <table border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background-color: #f6f6f6;">
      <tr>
        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
        <td class="container" style="font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; Margin: 0 auto; max-width: 580px; padding: 10px; width: 580px;">
          <div class="content" style="box-sizing: border-box; display: block; Margin: 0 auto; max-width: 580px; padding: 10px;">

            <!-- START CENTERED WHITE CONTAINER -->
            <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">This is preheader text. Some clients will show this text as a preview.</span>
            <table class="main" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background: #ffffff; border-radius: 3px;">

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;">
                  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                    <tr>
                      <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Hi '.$resinfo->customer_name.',</p>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Thanks for Order.Below Your order Item information.</p>
                        <table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; box-sizing: border-box;">
                          <tbody>
                            <tr>
								<td>Item Name</td>
								<td>Varient</td>
								<td>quantity</td>
								<td align="right">Unit Price</td>
								<td align="right">Total Price</td>
							</tr>
							'.$items.'
							<tr>
								<td colspan="4" align="right">Subtotal</td>
								<td align="right">'.$subtotal.'</td>
							</tr>
                             <tr>
								<td colspan="4" align="right">Vat/Tax</td>
								<td align="right">'.$billinfo->VAT.'</td>
							</tr>
                            <tr>
								<td colspan="4" align="right">Discount</td>
								<td align="right">'.$billinfo->discount.'</td>
							</tr>
                            <tr>
								<td colspan="4" align="right">Service charge</td>
								<td align="right">'.$billinfo->service_charge.'</td>
							</tr>
                            <tr>
								<td colspan="4" align="right">Grand Total</td>
								<td align="right">'.$orderinfo->totalamount.'</td>
							</tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

            <!-- END MAIN CONTENT AREA -->
            </table>

            <!-- START FOOTER -->
            
            <!-- END FOOTER -->

          <!-- END CENTERED WHITE CONTAINER -->
          </div>
        </td>
        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
      </tr>
    </table>
  </body>
</html>';
	   
	return $emailcontent;
	}
}
if (!function_exists('SendSMS'))
{

    function SendSMS($Phone, $SMS)
    {
				// Login Info
				
    }

}
if (!function_exists('generateRandomStr'))
{
function generateRandomStr($length = 4) {
        $UpperStr = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $LowerStr = "abcdefghijklmnopqrstuvwxyz";
        $numbers = "0123456789";
        
        $characters = $numbers;
        $charactersLength = strlen($characters);
        $randomStr = null;
        for ($i = 0; $i < $length; $i++) {
            $randomStr .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomStr;
    }
}

if (!function_exists('getCusineTypeName'))
{
function getCusineTypeName($id=1) {
        // return $id==1 ? 'Restaurant' : 'Banquet';
        switch ($id) {
            case 1:
                return 'Restaurant';
            case 2:
                return 'Banquet';
            case 3:
                return 'Product';
            default:
                return 'Unknown';
        }
    }
}

//function for getting the current date and time [made by Jyotirmoy Saha]
define('LONG_DATE_TIME_FORMAT', 'l jS \of F Y   h:i a');
define('LONG_DATE_FORMAT', 'l jS \of F Y');
define('LONG_TIME_FORMAT', 'h:i a');
if (!function_exists('getFormattedDateTime'))
{
function getFormattedDateTime($date = '', $format = 'd/m/Y')
{
    $date = ($date == '') ? date('Y-m-d') : $date;
    $d = date_format(date_create($date), $format);
    return $d;
}
}
if (!function_exists('getToday'))
{
function getToday($includeTime = true, $dformat = 'Y-m-d', $tformat = 'H:i:s')
{
    $dt = date($dformat);
    if ($includeTime) {
        $dt = date($dformat . ' ' . $tformat);
    }
    return $dt;
}
}

if (!function_exists('get_price_diff_data')) {
  function get_price_diff_data($id) {
      $CI = &get_instance(); // Get CodeIgniter instance
      $CI->load->database(); // Load database if not already loaded

      $query = $CI->db->select('*')
                      ->from('invprice_difference_notification')
                      ->where('ingredient_id', $id)
                      ->order_by('notify_id', 'desc')
                      ->limit(1)
                      ->get();

      return $query->row(); // Returns a single record (or NULL if not found)
  }
}

if (!function_exists('get_price_diff_data_by_purchase_id')) {
  function get_price_diff_data_by_purchase_id($id) {
      $CI = &get_instance(); // Get CodeIgniter instance
      $CI->load->database(); // Load database if not already loaded

      $query = $CI->db->select('*')
                      ->from('invprice_difference_notification')
                      ->where('purchase_id', $id)
                      ->order_by('notify_id', 'desc')
                      ->limit(1)
                      ->get();

      return $query->row(); // Returns a single record (or NULL if not found)
  }
}

if(!function_exists('allcategory_dropdown_by_parent_id')){

  function allcategory_dropdown_by_parent_id($id){

    $CI = &get_instance(); // Get CodeIgniter instance
    $CI->load->database(); // Load database if not already loaded

    $CI->db->select('*');
    $CI->db->from('item_category');
    $CI->db->where('parentid', $id);
    $parent = $CI->db->get();
    $categories = $parent->result();
    $i=0;
    foreach($categories as $p_cat){

        $categories[$i]->sub = sub_categories_by_parent_id($p_cat->CategoryID);

  $scs=0;
  foreach ($categories[$i]->sub as $scat) {
    $categories[$i]->sub[$scs]->sub = sub_categories_by_parent_id($scat->CategoryID);
    $scs++;
  }

        $i++;
    }
    return $categories;
  }
}
if(!function_exists('sub_categories_by_parent_id')){

  function sub_categories_by_parent_id($id){

    $CI = &get_instance(); // Get CodeIgniter instance
    $CI->load->database(); // Load database if not already loaded

    $CI->db->select('*');
    $CI->db->from('item_category');
    $CI->db->where('parentid', $id);

    $child = $CI->db->get();
    $categories = $child->result();
    $i=0;
    foreach($categories as $p_cat){
        $categories[$i]->sub = sub_categories_by_parent_id($p_cat->CategoryID);
        $i++;
    }
    return $categories;       
  }
}

if (!function_exists('get_ingredient_by_id')) {
  function get_ingredient_by_id($id) {
      $CI =& get_instance(); // Get CI instance
      $CI->load->database(); // Load the database library

      $query = $CI->db->get_where('ingredients', ['id' => $id, 'is_active' => 1]);

      if ($query->num_rows() > 0) {
          return $query->row(); // returns as object
      } else {
          return null; // or return false; based on your preference
      }
  }
}


if (!function_exists('get_quantity_consumption_unit')) {
    /**
     * Formula 1: Get quantity in consumption unit
     * Formula: (pack_size * convt_ratio) * purchase quantity
     */
    function get_quantity_consumption_unit($ingredient_id, $purchase_quantity)
    {
        $CI =& get_instance();
        $CI->load->database();

        $CI->db->select('pack_size, convt_ratio');
        $CI->db->from('ingredients');
        $CI->db->where('id', $ingredient_id);
        $ingredient = $CI->db->get()->row();

        if (!$ingredient) return 0.00;

        $result = ($ingredient->pack_size * $ingredient->convt_ratio) * $purchase_quantity;
        return number_format($result, 2, '.', '');
    }
}

if (!function_exists('get_quantity_purchase_unit')) {
    /**
     * Formula 2: Get quantity in purchase unit
     * Formula: quantity / (pack_size * convt_ratio)
     */
    function get_quantity_purchase_unit($ingredient_id, $quantity)
    {
        $CI =& get_instance();
        $CI->load->database();

        $CI->db->select('pack_size, convt_ratio');
        $CI->db->from('ingredients');
        $CI->db->where('id', $ingredient_id);
        $ingredient = $CI->db->get()->row();

        if (!$ingredient || ($ingredient->pack_size * $ingredient->convt_ratio) == 0) return 0.00;

        $result = $quantity / ($ingredient->pack_size * $ingredient->convt_ratio);
        return number_format($result, 4, '.', '');
    }
}

if (!function_exists('get_ingredient_total_cost')) {
    /**
     * Formula 3: Get total cost
     * Formula: ingredient_quantity * cost_perunit
     */
    function get_ingredient_total_cost($ingredient_id, $ingredient_quantity)
    {
        $CI =& get_instance();
        $CI->load->database();

        $CI->db->select('cost_perunit');
        $CI->db->from('ingredients');
        $CI->db->where('id', $ingredient_id);
        $ingredient = $CI->db->get()->row();

        if (!$ingredient) return 0.000;

        $result = $ingredient_quantity * $ingredient->cost_perunit;
        return number_format($result, 3, '.', '');
    }
}

if (!function_exists('get_ingredient_unit')) {
    function get_ingredient_unit($ingredient_id)
    {
        // Get the CodeIgniter instance
        $CI =& get_instance();

        // Ensure the database library is loaded
        $CI->load->database();

        // Build the query
        $CI->db->select('ingredients.*, unit_of_measurement.uom_name');
        $CI->db->from('ingredients');
        $CI->db->join('unit_of_measurement', 'ingredients.uom_id = unit_of_measurement.id', 'left');
        $CI->db->where('ingredients.id', $ingredient_id);
        $CI->db->order_by('ingredients.id', 'desc');

        // Execute the query
        $query = $CI->db->get();

        // Return the result
        if ($query->num_rows() > 0) {
            return $query->row(); // Returns a single object
        }
        return false;
    }
}

if (!function_exists('get_add_on_ingredient_details')) {
    /**
     * Retrieve add-on ingredient details based on add_on_id and ingredient_id.
     *
     * @param int $add_on_id
     * @param int $ingredient_id
     * @return object|bool Returns the detail object if found, otherwise false.
     */
    function get_add_on_ingredient_details($add_on_id, $ingredient_id)
    {
        // Get the CodeIgniter instance
        $CI =& get_instance();

        // Ensure the database library is loaded
        $CI->load->database();

        // Build the query
        $CI->db->select('*');
        $CI->db->from('add_on_ingr_dtls');
        $CI->db->where('add_on_id', $add_on_id);
        $CI->db->where('modifier_ingr_id', $ingredient_id);
        $query = $CI->db->get();

        // Return the result
        if ($query->num_rows() > 0) {
            return $query->row(); // Returns a single object
        }
        return false;
    }
}


if (!function_exists('check_add_on_ingredient_details_exists')) {
  /**
   * Retrieve add-on ingredient details based on add_on_id, modifier group id and ingredient_id.
   *
   * @param int $add_on_id
   * @param int $modifier_group_id
   * @param int $ingredient_id
   * @return object|bool Returns the detail object if found, otherwise false.
   */
  function check_add_on_ingredient_details_exists($add_on_id, $group_id, $ingredient_id)
  {
      // Get the CodeIgniter instance
      $CI =& get_instance();

      // Ensure the database library is loaded
      $CI->load->database();

      // Build the query
      $CI->db->select('*');
      $CI->db->from('add_on_ingr_dtls');
      $CI->db->where('add_on_id', $add_on_id);
      $CI->db->where('modifier_set_id', $group_id);
      $CI->db->where('modifier_ingr_id', $ingredient_id);
      $query = $CI->db->get();

      // Print the last executed SQL query for debugging
      //echo $CI->db->last_query();
      //exit;
      // Return the result
      if ($query->num_rows() > 0) {
          return $query->row(); // Returns a single object
      }
      return false;
  }
}


if (!function_exists('check_add_on_foodingredient_details_exists')) {
  /**
   * Retrieve add-on ingredient details based on add_on_id, modifier group id and ingredient_id.
   *
   * @param int $add_on_id
   * @param int $modifier_group_id
   * @param int $foodid
   * @param int $ingredient_id
   * @return object|bool Returns the detail object if found, otherwise false.
   */
  function check_add_on_food_details_exists($add_on_id, $group_id, $foodid)
  {
      // Get the CodeIgniter instance
      $CI =& get_instance();

      // Ensure the database library is loaded
      $CI->load->database();

      // Build the query
      $CI->db->select('*');
      $CI->db->from('add_on_ingr_dtls');
      $CI->db->where('add_on_id', $add_on_id);
      $CI->db->where('modifier_set_id', $group_id);
      $CI->db->where('modifier_foodid', $foodid);
      $query = $CI->db->get();

      // Print the last executed SQL query for debugging
      // echo $CI->db->last_query();
      // exit;
      // Return the result
      if ($query->num_rows() > 0) {
          return $query->row(); // Returns a single object
      }
      return false;
  }
}

if (!function_exists('is_ingredient_readonly')) {
  function is_ingredient_readonly($ingredient_id) {
      $CI =& get_instance();
      $CI->load->database();

      if (!$ingredient_id) {
          return '';
      }

      $CI->db->select('indredientid');
      $CI->db->from('purchase_details');
      $CI->db->where('indredientid', $ingredient_id);
      $query = $CI->db->get();

      return ($query->num_rows() > 0) ? 'readonly' : '';
  }
}

if (!function_exists('get_unit_detail')) {
  /**
   * Get unit detail by ID
   *
   * @param int $unit_id
   * @return array|null
   */
  function get_unit_detail($unit_id) {
      $CI =& get_instance(); // Get CI instance
      $CI->load->database(); // Load DB if not already loaded

      $query = $CI->db
                  ->where('id', $unit_id)
                  ->where('is_active', 1)
                  ->get('unit_of_measurement');

      if ($query->num_rows() > 0) {
          return $query->row_array(); // return unit details as array
      }

      return null; // if not found
  }
}

if (!function_exists('get_quantity_purchase')) {
    /**
     * Formula 2: Get quantity in purchase unit
     * Formula: quantity * (pack_size * convt_ratio)
     */
    function get_quantity_purchase($ingredient_id, $quantity)
    {
        $CI =& get_instance();
        $CI->load->database();

        $CI->db->select('pack_size, convt_ratio');
        $CI->db->from('ingredients');
        $CI->db->where('id', $ingredient_id);
        $ingredient = $CI->db->get()->row();

        if (!$ingredient || ($ingredient->pack_size * $ingredient->convt_ratio) == 0) return 0.00;

        $result = $quantity * ($ingredient->pack_size * $ingredient->convt_ratio);
        return number_format($result, 4, '.', '');
    }
}



/**
 * Generate a unique employee number like 'ADZ24A1B2C'
 */
if (!function_exists('generate_employee_no')) {
    function generate_employee_no($user_id) {
        $year = date('y'); // e.g., 24 for 2024
        $obfuscated = strtoupper(base_convert($user_id * 98765 + 13579, 10, 36));
        return 'ADZ' . $year . str_pad($obfuscated, 5, '0', STR_PAD_LEFT); // e.g., ADZ24A1B2
    }
}

/**
 * Decode employee number back to user ID (optional)
 */
if (!function_exists('get_user_id_from_employee_no')) {
    function get_user_id_from_employee_no($employee_no) {
        $encoded = substr($employee_no, 5); // Remove 'ADZ' + 2-digit year
        $number = base_convert($encoded, 36, 10);
        return intval(($number - 13579) / 98765); // Reverse obfuscation
    }
}

// Get user detail by user ID
if (!function_exists('get_user_detail')) {
    function get_user_detail($user_id) {
        // Get CI instance
        $CI =& get_instance();
        
        // Load the database if not already loaded
        $CI->load->database();
        
        // Run the query
        $CI->db->where('id', $user_id);
        $query = $CI->db->get('user');

        // Return result as array or null
        if ($query->num_rows() > 0) {
            return $query->row(); // return as object
            // return $query->row_array(); // if you prefer array
        } else {
            return null;
        }
    }
}

//Get Setting Table value
/**
 * Get setting value from the database
 *
 * @param string $key
 * @return string|null
 */
if (!function_exists('get_setting_value')) {
    function get_setting_value($column_name)
    {
        $CI =& get_instance();
        $CI->load->database();

        $CI->db->select($column_name);
        $CI->db->from('common_setting');
        $CI->db->limit(1);
        $query = $CI->db->get();

        if ($query->num_rows() === 1) {
            return $query->row()->$column_name;
        }

        return null;
    }
}

/**
 *  Get menu prices based on menu ID
 *  This function retrieves the prices of a menu item based on its production details.
 */
if (!function_exists('get_menu_prices')) {
    function get_menu_prices($menuid) {
        $CI =& get_instance();
        $CI->load->database();

        // Get production records for the given menuid
        $CI->db->select('is_bom, itemvid');
        $CI->db->from('production');
        $CI->db->where('itemid', $menuid);
        $query = $CI->db->get();

        if ($query->num_rows() == 0) {
            return null; // No production found
        }

        $results = $query->result();
        $variantIds = [];

        foreach ($results as $row) {
            if (!empty($row->itemvid)) {
                $variantIds[] = $row->itemvid;
            }
        }

        if (empty($variantIds)) {
            return null;
        }

        // Get all price types for matched variants
        $CI->db->select('variantid, price, takeaway_price, uber_eats_price, doordash_price, web_order_price, recipe_cost, recipe_weightage');
        $CI->db->from('variant');
        $CI->db->where('menuid', $menuid);
        $CI->db->where_in('variantid', $variantIds);
        $variants = $CI->db->get()->result_array();

        return !empty($variants) ? $variants : null;
    }
}

/**
 * Get Category Name by ID
 */
if (!function_exists('get_category_name')) {
    /**
     * Get category name by CategoryID
     *
     * @param int $categoryID
     * @return string|null
     */
    function get_category_name($categoryID) {
        $CI =& get_instance();
        $CI->load->database();

        $CI->db->select('Name');
        $CI->db->from('item_category');
        $CI->db->where('CategoryID', $categoryID);
        $query = $CI->db->get();

        if ($query->num_rows() > 0) {
            return $query->row()->Name;
        }

        return null; // Not found
    }
}

/**
 * Get Variant Name by ID
 */
if (!function_exists('get_variant_first_letter')) {
    function get_variant_first_letter($variantid) {
        $CI =& get_instance();
        $CI->load->database();

        $CI->db->select('variantName');
        $CI->db->from('variant');
        $CI->db->where('variantid', $variantid);
        $query = $CI->db->get();

        if ($query->num_rows() > 0) {
            $variantName = $query->row()->variantName;
            return strtoupper(substr(trim($variantName), 0, 1));
        }

        return ''; // Return empty string if not found
    }
}

/**
 * Common function to Active and Inactive a record
 */
  if (!function_exists('generate_toggle_url')) {
    function generate_toggle_url($table, $column, $pk_column, $id) {
        return base_url("itemmanage/item_food/toggle_status/$table/$column/$pk_column/$id");
    }
  }

/**
 * convert a string to itemcode
 */
if (!function_exists('get_item_code')) {
    function get_item_code($input) {
        // Step 1: Remove any text within brackets (e.g., "(3 per serve)")
        $input = preg_replace('/\([^)]+\)/', '', $input);

        // Step 2: Split by 'or'
        $phrases = preg_split('/\s+or\s+/i', $input);
        $results = [];
        $counts = [];

        foreach ($phrases as $phrase) {
            $words = preg_split('/\s+/', trim($phrase));
            $acronym = '';

            if (count($words) > 0) {
                // First word: take first 2 letters
                $acronym .= strtoupper(mb_substr($words[0], 0, 2));

                // Remaining words: take first letter
                for ($i = 1; $i < count($words); $i++) {
                    $acronym .= strtoupper(mb_substr($words[$i], 0, 1));
                }
            }

            // Handle duplicates
            if (isset($counts[$acronym])) {
                $counts[$acronym]++;
                $results[] = $acronym . '_' . $counts[$acronym];
            } else {
                $counts[$acronym] = 1;
                $results[] = $acronym;
            }
        }

        return implode(', ', $results);
    }
}