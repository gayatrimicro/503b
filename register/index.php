<?php
include '../database-con.php';
// Always start this first
session_start();
$now = time();
 error_reporting(0);

if ($now < $_SESSION['expire']) { 
    
    header("Location: /503b/order/");
    
    // Grab user data from the database using the user_id
    // Let them access the "logged in only" pages
} else {
    
    if (isset($_POST['email'] ) && isset( $_POST['password'] ) ) {

        $email = $_POST['email'];
        $password = $_POST['password'];
        $SQLSELECT = "SELECT * FROM users";
        $result_set =  mysqli_query($conn, $SQLSELECT);
        while($row = mysqli_fetch_array($result_set))
                {
                    $demail= $row['email'];
                    $dpass= $row['password'];
                }
        
        // Getting submitted user data from database
        // $con = new mysqli($db_host, $db_user, $db_pass, $db_name);
          
        // Verify user password and set $_SESSION
        if($email == $demail && $password == $dpass){
            $_SESSION['email'] = $email;
            $_SESSION['start'] = time();
            $_SESSION['expire'] = $_SESSION['start'] + (2 * 60);
            header("Location: /503b/order/");
        }
        else{
            echo "Username or password wrong";
        }
      // if ( password_verify( $_POST['password'], $user->password ) ) {
      //  $_SESSION['email'] = $user->ID;
      // }
    }

?>
<!DOCTYPE html>
<html lang="en-US" class="loading-site no-js">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
      <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
      <link rel="profile" href="http://gmpg.org/xfn/11" />
      <link rel="pingback" href="xmlrpc.php" />
      <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet">
      <script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>
      <title>ASP Cares</title>
      <link rel='dns-prefetch' href='http://s.w.org/' />
      <link rel="alternate" type="application/rss+xml" title="ASP Cares &raquo; Feed" href="feed/index.html" />
      <link rel="alternate" type="application/rss+xml" title="ASP Cares &raquo; Comments Feed" href="comments/feed/index.html" />
      
      <style type="text/css">
         img.wp-smiley,
         img.emoji {
         display: inline !important;
         border: none !important;
         box-shadow: none !important;
         height: 1em !important;
         width: 1em !important;
         margin: 0 .07em !important;
         vertical-align: -0.1em !important;
         background: none !important;
         padding: 0 !important;
         }
      </style>
      <link rel='stylesheet' id='contact-form-7-css'  href='../assets/css/styles3c21.css?ver=5.1.1' type='text/css' media='all' />
      <style id='woocommerce-inline-inline-css' type='text/css'>
         .woocommerce form .form-row .required { visibility: visible; }
      </style>
      <link rel='stylesheet' id='yith_wcas_frontend-css'  href='../assets/css/yith_wcas_ajax_searchd87f.css?ver=4.9.9' type='text/css' media='all' />
      <link rel='stylesheet' id='flatsome-icons-css'  href='../assets/css/fl-icons6de8.css?ver=3.3' type='text/css' media='all' />
      <link rel='stylesheet' id='flatsome-main-css'  href='../assets/css/flatsome1aae.css?ver=3.5.3' type='text/css' media='all' />
      <link rel='stylesheet' id='flatsome-shop-css'  href='../assets/css/flatsome-shop1aae.css?ver=3.5.3' type='text/css' media='all' />
      <link rel='stylesheet' id='flatsome-style-css'  href='../assets/css/style1aae.css?ver=3.5.3' type='text/css' media='all' />
      <link rel='stylesheet' id='dgwt-wcas-style-css'  href='../assets/css/style1576.css?ver=1.2.1' type='text/css' media='all' />
      <script type='text/javascript' src='../assets/js/jqueryb8ff.js?ver=1.12.4'></script>
      <script type='text/javascript' src='../assets/js/jquery-migrate.min330a.js?ver=1.4.1'></script>
      <link rel='https://api.w.org/' href='' />
      <link rel="EditURI" type="application/rsd+xml" title="RSD" href="" />
      <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="wp-includes/wlwmanifest.xml" />
      <meta name="generator" content="" />
      <meta name="generator" content="" />
      <link rel="canonical" href="" />
      <link rel='shortlink' href='' />
      <link rel="alternate" type="application/json+oembed" href="../assets/js/embed9f3f.json?url=https%3A%2F%2Ftemp.503bfacility.com%2F" />
      <link rel="alternate" type="text/xml+oembed" href="wp-json/oembed/1.0/embedfc78?url=https%3A%2F%2Ftemp.503bfacility.com%2F&amp;format=xml" />
      <style type="text/css">.dgwt-wcas-search-wrapp{max-width:600px}.dgwt-wcas-search-wrapp .dgwt-wcas-sf-wrapp .dgwt-wcas-search-submit::before{border-color:transparent #ee2a32}.dgwt-wcas-search-wrapp .dgwt-wcas-sf-wrapp .dgwt-wcas-search-submit:hover::before,.dgwt-wcas-search-wrapp .dgwt-wcas-sf-wrapp .dgwt-wcas-search-submit:focus::before{border-right-color:#ee2a32}.dgwt-wcas-search-wrapp .dgwt-wcas-sf-wrapp .dgwt-wcas-search-submit{background-color:#ee2a32}.dgwt-wcas-search-wrapp .dgwt-wcas-ico-magnifier{}.dgwt-wcas-search-wrapp .dgwt-wcas-sf-wrapp .dgwt-wcas-search-submit::before{border-color:transparent #ee2a32}.dgwt-wcas-search-wrapp .dgwt-wcas-sf-wrapp .dgwt-wcas-search-submit:hover::before,.dgwt-wcas-search-wrapp .dgwt-wcas-sf-wrapp .dgwt-wcas-search-submit:focus::before{border-right-color:#ee2a32}.dgwt-wcas-search-wrapp .dgwt-wcas-sf-wrapp .dgwt-wcas-search-submit{background-color:#ee2a32}.dgwt-wcas-search-wrapp .dgwt-wcas-ico-magnifier{}</style>
      <style>.bg{opacity: 0; transition: opacity 1s; -webkit-transition: opacity 1s;} .bg-loaded{opacity: 1;}</style>


       <script type="text/javascript">
         WebFontConfig = {
           google: { families: [ "Lato:regular,700","Lato:regular,400","Lato:regular,700","Dancing+Script", ] }
         };
         (function() {
           var wf = document.createElement('script');
           wf.src = '../assets/js/webfont.js';
           wf.type = 'text/javascript';
           wf.async = 'true';
           var s = document.getElementsByTagName('script')[0];
           s.parentNode.insertBefore(wf, s);
         })(); 
      </script>
      <noscript>
         <style>.woocommerce-product-gallery{ opacity: 1 !important; }</style>
      </noscript>
      <link rel="icon" href="../assets/images/cropped-cropped-cropped-favicon-32x32-32x32.png" sizes="32x32" />
      <link rel="icon" href="../assets/images/cropped-cropped-cropped-favicon-32x32-192x192.png" sizes="192x192" />
      
      <link rel="apple-touch-icon-precomposed" href="../assets/images/cropped-cropped-cropped-favicon-32x32-180x180.png" />
      <meta name="msapplication-TileImage" content="../assets/images/cropped-cropped-cropped-favicon-32x32-270x270.png" />
      <style id="custom-css" type="text/css">:root {--primary-color: #446084;}/* Site Width */.header-main{height: 93px}#logo img{max-height: 93px}#logo{width:265px;}.header-bottom{min-height: 55px}.header-top{min-height: 30px}.transparent .header-main{height: 265px}.transparent #logo img{max-height: 265px}.has-transparent + .page-title:first-of-type,.has-transparent + #main > .page-title,.has-transparent + #main > div > .page-title,.has-transparent + #main .page-header-wrapper:first-of-type .page-title{padding-top: 295px;}.header.show-on-scroll,.stuck .header-main{height:79px!important}.stuck #logo img{max-height: 79px!important}.header-bottom {background-color: #f1f1f1}.header-main .nav > li > a{line-height: 16px }.stuck .header-main .nav > li > a{line-height: 50px }.header-bottom-nav > li > a{line-height: 16px }@media (max-width: 549px) {.header-main{height: 70px}#logo img{max-height: 70px}}.nav-dropdown{font-size:100%}body{font-family:"Lato", sans-serif}body{font-weight: 400}.nav > li > a {font-family:"Lato", sans-serif;}.nav > li > a {font-weight: 700;}h1,h2,h3,h4,h5,h6,.heading-font, .off-canvas-center .nav-sidebar.nav-vertical > li > a{font-family: "Lato", sans-serif;}h1,h2,h3,h4,h5,h6,.heading-font,.banner h1,.banner h2{font-weight: 700;}.alt-font{font-family: "Dancing Script", sans-serif;}@media screen and (min-width: 550px){.products .box-vertical .box-image{min-width: 300px!important;width: 300px!important;}}.footer-2{background-color: #1c62af}.absolute-footer, html{background-color: #1a3c34}.label-new.menu-item > a:after{content:"New";}.label-hot.menu-item > a:after{content:"Hot";}.label-sale.menu-item > a:after{content:"Sale";}.label-popular.menu-item > a:after{content:"Popular";}</style>
   </head>
   <style>
      /*.top-divider{*/
      /*        border-top: none;*/
      /*}*/
   </style>
   <body class="home page-template page-template-page-blank page-template-page-blank-php page page-id-305 woocommerce-no-js dgwt-wcas-bc-1-1-7 lightbox nav-dropdown-has-arrow">
      <a class="skip-link screen-reader-text" href="#main">Skip to content</a>
      <div id="wrapper">
        <?php
        include '../header.php'
        ?>
         <style>
            #modalContainer {
            background-color:rgba(25, 23, 23, 0.59);
            position:absolute;
            width:100%;
            height:100% !important;
            top:0px;
            left:0px;
            z-index:10000;
            background-image:url(tp.html); /* required by MSIE to prevent actions on lower z-index elements */
            }
            #alertBox {
            position: relative !important;
            width: 400px;
            min-height: 191px;
            margin-top: 23%;
            margin-left: 38%;
            padding-bottom: 27px;
            border: 1px solid #666;
            background-color: rgb(236, 241, 249);
            background-repeat: no-repeat;
            background-position: 20px 30px;
            }
            #modalContainer > #alertBox {
            position:fixed;
            }
            #alertBox h1 {
            margin: 0;
            background-color: rgba(237,241,250,0.95);
            border-bottom: none;
            /*font-size: 26px;*/
            padding: 23px 0px 40px 5px;
            text-align: center;
            /*font-family: 'Crimson Text', serif;*/
            font-size: 21px !important;
            font-weight: 400 !important;
            font-family: 'Montserrat', sans-serif;
            color: #5b5b5b;
            }
            #alertBox p {
            font:0.7em verdana,arial;
            height:50px;
            padding-left:5px;
            margin-left:55px;
            }
            #alertBox #closeBtn {
            line-height: 0;
            background-color: #1c62af !important;
            opacity: 1 !important;
            /*font-size: 16px !important;*/
            color: #cac2c2 !important;
            /*font-weight: bold !important;*/
            display: block;
            position: relative;
            margin: 5px auto;
            padding: 20px;
            border: 0 none;
            width: 100px;
            /*font-family: 'Crimson Text', serif;*/
            text-transform: uppercase;
            text-align: center;
            border-radius: 3px;
            text-decoration: none;
            font-weight: 400 !important;
            font-family: 'Montserrat', sans-serif;
            }
            /* unrelated styles */
            #mContainer {
            position:relative;
            width:600px;
            margin:auto;
            padding:5px;
            border-top:2px solid #000;
            border-bottom:2px solid #000;
            font:0.7em verdana,arial;
            }
            h1,h2 {
            margin:0;
            padding:4px;
            font:bold 1.5em verdana;
            }
            code {
            font-size:1.2em;
            color:#069;
            }
            #credits {
            position:relative;
            margin:25px auto 0px auto;
            width:350px; 
            font:0.7em verdana;
            border-top:1px solid #000;
            border-bottom:1px solid #000;
            height:90px;
            padding-top:4px;
            }
            #credits img {
            float:left;
            margin:5px 10px 5px 0px;
            border:1px solid #000000;
            width:80px;
            height:79px;
            }
            .important {
            background-color:#F5FCC8;
            padding:2px;
            }
            code span {
            color:green;
            }
            .page-wrapper {
            padding-top: 0;
            padding-bottom: 0;
            }
         </style>
         <style>
            .col-2.large-12.col.pb-0 {
            display: none;
            }
            li {
            list-style: none;
            }
            h3.uppercase_reg {
            color: #555 !important;
            font-family: 'Montserrat', sans-serif !important;
            font-size: 28px !important;
            text-transform: initial !important;
            font-weight: normal !important;
            text-align: left !important;
            }
            button.woocommerce-Button.button {
            background: #0311b6;
            font-size: 15px;
            font-weight: 400;
            font-family: 'Montserrat', sans-serif;
            }
            /*for popup*/
            .popup {
            z-index: 999;
            width:100%;
            height:100%;
            display:none;
            position:fixed;
            top:0px;
            left:0px;
            background:rgba(0,0,0,0.75);
            }
            /* Inner */
            .popup-inner {
            max-width: 63%;
            width: 90%;
            height: 588px;
            padding: 40px;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -40%);
            box-shadow: 0px 2px 6px rgba(0,0,0,1);
            border-radius: 3px;
            background: #fff;
            overflow: scroll;
            }
            /* Close Button */
            .popup-close {
            width: 43px;
            height: 43px;
            padding-top: 9px;
            display: inline-block;
            position: absolute;
            top: 40px;
            right: 70px;
            transition: ease 0.25s all;
            -webkit-transform: translate(50%, -50%);
            transform: translate(50%, -50%);
            border-radius: 1000px;
            background: rgba(0,0,0,0.8);
            font-family: Arial, Sans-Serif;
            font-size: 20px;
            text-align: center;
            line-height: 100%;
            color: #fff;
            }
            .popup-close:hover {
            -webkit-transform:translate(50%, -50%) rotate(180deg);
            transform:translate(50%, -50%) rotate(180deg);
            background:rgba(0,0,0,1);
            text-decoration:none;
            }
            .checkbox input[type=checkbox], .checkbox-inline input[type=checkbox], .radio input[type=radio], .radio-inline input[type=radio]{
            margin-top:12px;
            }
            input#register {
            margin-top: 52px;
            margin-left: -2px;
            }
            p.termsamdcond {
            text-align: center;
            font-size: 18px !important;
            font-family: 'Montserrat', sans-serif;
            font-weight: 900;
            color: #2f3492;
            padding-bottom: 31px;
            }
            .applicable {
            color: #000;
            font-family: 'Montserrat', sans-serif;
            list-style: none;
            margin-bottom: 117px;
            }
            li
            {
            padding-top:18px;
            }
            .popup-data {
            color: #000;
            font-family: 'Montserrat', sans-serif;
            list-style: none;
            }
            p.order {
            color: #000;
            font-family: 'Montserrat', sans-serif;
            font-size: 14px;
            }
            p.exist {
            color: #000;
            font-family: 'Montserrat', sans-serif;
            font-size: 14px;
            font-weight: 600;
            }
            label.woocommerce-form__label.woocommerce-form__label-for-checkbox.checkbox {
            font-family: 'Montserrat', sans-serif !important;
            font-size: 14px !important;
            }
            .popup-inner li {
            padding-top: 5px;
            }
            .popup-inner strong {
            font-size: 15px;
            font-family: 'Montserrat', sans-serif;
            color: #2f3492;
            }
            .popup-inner li {
            color: #000;
            font-family: 'Montserrat', sans-serif;
            /* list-style: none; */
            font-size: 14px;
            }
            input[type=number]::-webkit-inner-spin-button, input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none !important;
            -moz-appearance: none !important;
            appearance: none !important;
            margin: 0 !important;
            }
            p.termsamdcond2{
                text-align: center;
                font-size: 18px !important;
                font-family: 'Montserrat', sans-serif;
                font-weight: 900;
                color: #2f3492;
                padding-top: 36px;
            }
            .pop-inner2{
                height:188px;
            }
            #lost_password_pop{
              display:none;
            }
            #noemail{display:none;}
            #chkemail{display: none}
            /*pop up nds*/
            /*download form white box*/
            .whitebox{
               padding: 50px 20px;
            }
            .whitebox .row{
               background-color: #fff;
               transform: translateZ(0);
               box-shadow: 3px 3px 20px 0 rgb(0 0 0 / 15%);
            }
            .m-left10{
               margin-left: 20px !important;
            }
            @media only screen and (max-width: 600px) {
              .m-left10{
               margin-left: 0px !important;
            }
            }
         </style>
        </div>
        <main id="main" class="main">
         <div class="whitebox">
            <div class="row" id="row-1765825053">
            
        
               <div class="col regreg small-12 large-12">
                   <div class="col-inner m-left10" style="margin:50px 0px 0px 0px;">                 
                        <h1 style="margin-bottom: 0px;">Not an ASP Cares Pharmacy Customer yet?</h1>
                     
                        
                  <!-- <a rel="noopener noreferrer" href="../assets/pdf/Order-Form.pdf" target="_blank" class="button secondary is-large lowercase mobile_btn_d">
                           <span>Download Order Form</span>
                       </a> -->

                   </div>

               </div>
               <div class="col regreg small-12 large-12">
                  <div class="col-inner m-left10" >
                     <ul>
                           <li style="margin-top: 0px; padding-top: 0px;margin-left: 0px;">1. Click below to Download Account Setup Form </li>
                           <li style="margin-top: 0px; padding-top: 0px;margin-left: 0px;">2. Once downloaded, fill, scan and send it to Orders503b@aspcares.com</li>
                        </ul>
                        <a rel="noopener noreferrer" href="../assets/pdf/New Account Setup Packet April 2021.pdf" target="_blank" class="button secondary is-large lowercase ">
                           <span>Download Account Set-up Form</span>
                       </a>
                   </div>
               </div>
               <div class="col regreg small-12 large-12 text-center">
                   <div class="col-inner">
                     <?php
                     if( isset($_SESSION['error']) )
                     {
                        echo '<p style="color: red;">'.$_SESSION['error'].'</p>';
                        unset($_SESSION['error']);
                     } ?>
                     <?php
                     if( isset($_SESSION['success']) )
                     {
                        echo '<p style="color: green;">'.$_SESSION['success'].'</p>';
                        unset($_SESSION['success']);
                     } ?>
                   </div>
               </div>
            </div>
        </div>
        <div id="login-form-popup" class="lightbox-content">         
         <div class="popup" data-popup="popup-1">
            <div style="height: 335px;margin-top: 48px;"  class="popup-inner">
               <p class="termsamdcond">Purchase of Compounded Office Use Medication</p>
               <div class="popup-data">The practitioner agrees to purchase compounded medications for office use from ASP Cares under the following guidelines: 1. The compounded drug may only be administered to the patient and may not be dispensed to the patient or sold to any other person or entity.  2. The practitioner shall include on the patient’s chart, medication order, or medication administration record the lot number and the beyond-use-date of any compounded drug administered to the patient that was provided by the pharmacy.   3. The practitioner will provide notification to the patient for the reporting of any adverse reaction or complaint in order to facilitate any recall of batches of compounded drugs.</div>
               <p><a style="color: #2f3492; float:right;background: #0311b6;color: #fff !important;border-radius: 4px;padding: 5px;margin-top: 37px;" data-popup-close="popup-1" href="#">Close</a></p>
               <a class="popup-close" data-popup-close="popup-1" href="#">x</a>
            </div>
         </div>
         <!-- second box -->
         <div class="popup" data-popup="popup-2">
            <div style="height: 367px;" class="popup-inner">
               <p class="termsamdcond">Recurring Credit Card Charge Authorization</p>
               <div class="applicable">I hereby authorize ASP Cares to make recurring charges to the credit card listed below, and, if necessary, initiate adjustments for any transactions credited/debited in error. This authorization will remain in effect until ASP Cares is notified in writing to cancel it. ASP Cares will bill on the date of shipment unless other terms have been agreed upon.</div>
               <p><a style="float:right;color:#2f3492;background: #0311b6;color: #fff !important;border-radius: 4px;padding: 5px;" data-popup-close="popup-2" href="#">Close</a></p>
               <a class="popup-close" data-popup-close="popup-2" href="#">x</a>
            </div>
         </div>
         <!-- second box ends -->
         <!--third box starts -->
         <div class="popup" data-popup="popup-3">
            <div class="popup-inner">
               <p class="termsamdcond">TERMS AND CONDITIONS OF SALE</p>
               <li>These terms and conditions, together with any other agreement entered to between ASPCares and customer, are the sole and complete contract between customer and ASPCares in respect of the products purchased by customer from ASPCares and supersede all prior oral or written understandings. ASPCares rejects those provisions of any order, offer, or other communication from customer, which are additional to, different from, or conflict with the terms hereof.  Neither ASPCares delivery of the products nor any other action at ay time on the part of ASPCares shall constitute acceptance of such additional, different, or conflicting terms.  Customers shall be bound by all the terms of the agreement, including these terms and conditions when customer accepts this agreement by failing to object in writing hereto within a reasonable time and acceptance of delivery of the products.</li>
               </li>
               </li>
               </li>
               <li start="2">
               <li><strong>CLAIMS AND RETURNS</strong>
               <li>
               <li>ASPCares does not accept returned products in the normal course of its business and will only accept returns and provide credit in limited circumstances.</li>
               <li>Credit will be issued in the following circumstances:
               <li>
               <li>Products shipped in error or in incomplete quantity by ASPCares are subject to full replacement or credit will be given for the amount invoiced provided ASPCares Customer Service Department is notified within three (3) business days of receipt of the shipment.</li>
               <li>Product shipments that have been damaged during shipment will be replaced or credit will be given provided damaged items are reported and appropriate documentation has ben provided to ASPCares Customer Service Department within three (3) business days of receipt for credit to be issued.</li>
               </li>
               </li>
               </li>
               </li>
               </li>
               <li>
               <li>The customer must contact ASPCares Customer Service Department at 503b@aspcares.com to determine the appropriate disposition of the damaged shipment.</li>
               </li>
               <li>
               <li>Products that are demonstrated to not meet the agreed product specifications of ASPCares will be replaced or credit will be given for the amount invoiced provided ASPCares Customer Service Department is notified within (3) business days of first discovery of defect.Products that recalled.</li>
               </li>
               <li>
                  For all product return requests the customer should contact ASPCares Customer Service Department at 503b@aspcares.com or 1-888-412-5929
               </li>
               <br/>
               <li start="3">
               <li><strong>LIMITATIONS OF LIABILITY</strong>
               <li>
               <li>ASPCares shall have no liability for punitive, indirect, incidental, consequential, or special losses or damages of any kind, including, without limitation, lost profits, even if ASPCares has been notified of the possibility of such damages. These limitations are agreed allocations of risk.</li>
               </li>
               </li>
               </li>
               <p><a style="color: #2f3492; float:right; background: #0311b6;color: #fff !important;border-radius: 4px;padding: 5px;" data-popup-close="popup-3" href="#">Close</a></p>
               <a class="popup-close" data-popup-close="popup-3" href="#">x</a>
            </div>
         </div>
         <!--box ends -->
         <!--fourth box starts -->
         <div class="popup" data-popup="popup-4">
            <div class="popup-inner">
               <p class="termsamdcond">Practitioner Statement Regarding Office Visit Requirements</p>
               <p class="order">In order to ensure that all orders received by ASP Cares are pursuant to a valid practitioner/patient relationship, we require that our practitioners agree that the following elements are satisfied prior to sending an order.</p>
               <p class="exist">The existence of these elements is an indication that a legitimate practitioner/patient relationship has been established:</p>
               <li>A patient has a medical complaint</li>
               <li>A medical history has been taken </li>
               <li>A physical examination has been performed </li>
               <li>Some logical connection exists between the medical complaint, the medical history, the physical examination, and the drug ordered </li>
               <li>All medication ordered as “office use” will come clearly marked as “office use” and “not for resale”. These medications are provided for the practitioner to administer to the patient in the office ONLY. </li>
               <br />
               <p style="color: #000;font-family: 'Montserrat', sans-serif;font-size: 15px;">I, agree that all orders sent to ASP Cares meet the criteria above. I agree that there is no other agreement written, oral, or otherwise that negates this one.</p>
               <p><a style="color: #2f3492; float:right; background: #0311b6;color: #fff !important;border-radius: 4px;padding: 5px;" data-popup-close="popup-4" href="#">Close</a></p>
               <a class="popup-close" data-popup-close="popup-4" href="#">x</a>
            </div>
         </div>
         <div id="popup-5" class="popup" data-popup="popup-5">
            <div class="popup-inner">
               <p class="termsamdcond">You have successfully registered !</p>
               
               <p style="color: #000;font-family: 'Montserrat', sans-serif;font-size: 15px;">Click here to login</p>

               <p><a style="color: #2f3492; float:right; background: #0311b6;color: #fff !important;border-radius: 4px;padding: 5px;" data-popup-close="popup-5" href="#">Close</a></p>
               <a class="popup-close" data-popup-close="popup-5" href="#">x</a>
            </div>
         </div>
         <div id="popup-6" class="popup" data-popup="popup-6">
            <div class="popup-inner pop-inner2">
               <p class="termsamdcond2">You have successfully registered !</p>
               <a class="popup-close" data-popup-close="popup-6" href="#">x</a>
            </div>
         </div>
         <!--fourth box ends -->
         <p class="registration"></p>
         <div class="woocommerce-notices-wrapper"></div>
         <div class="account-container lightbox-inner" style="display: none">
            
            
            <div class="col2-set row row-divided row-large" id="customer_login" style="display: none">
               <div class="col-1 large-12 col pb-0" id="login-pop">
                  <div class="account-login-inner" >
                     <h3 class="uppercase_reg">Register &nbsp;&nbsp;&nbsp;</h3>
                     <form id="register-frm1" method="post" class="register" enctype="multipart/form-data" action="register-api-form.php">
                        <input type="hidden" name="from" value="register">
                        <p class="form-row form-row-first">
                           <label for="billing_first_name">Practitioner First Name<span class="required">*</span></label>
                           <input type="text" class="input-text" name="billing_first_name" id="billing_first_name" placeholder="First Name"  value="" required />
                        </p>
                        <p class="form-row form-row-last">
                           <label for="billing_last_name">Practitioner Last Name<span class="required">*</span></label>
                           <input type="text" class="input-text" name="billing_last_name" id="billing_last_name" placeholder="Last Name" value="" required />
                        </p>
                        <p class="form-row form-row-first">
                           <label for="billing_company">Facility Name<span class="required">*</span></label>
                           <input type="text" class="input-text" name="billing_company" id="billing_company" placeholder="Facility Name" value="" required/>
                        </p>
                        <p class="form-row form-row-last now">
                           <label for="billing_dea_number">DEA Number (Required if ordering controlled Substances)<span class="required">*</span></label>
                           <input type="text" class="input-text" name="billing_dea_number" id="billing_dea_number" placeholder="DEA Number" value="" required />
                        </p>
                        <p class="form-row form-row-first">
                           <label for="billing_dea_upload">Upload DEA License</label>
                           <input type="file" name="fileToUpload" id="fileToUpload">
                        </p>
                        <p class="form-row form-row-last  now">
                           <label for="billing_license_upload">Upload State License<span class="required">*</span></label>
                           <input type="file" name="fileToUpload1" id="fileToUpload1" required >
                        </p>
                        <!-- <div class="clear"></div> -->
                        <!-- <p class="form-row form-row-first  now">
                           <label for="billing_license_number">License Number<span class="required">*</span></label>
                           <input type="number" class="input-text" name="billing_license_number" id="billing_license_number" placeholder="License Number" value="" required />
                        </p> -->

                        <p class="form-row form-row-first">
                           <label for="billing_npi_number">NPI Number<span class="required">*</span></label>
                           <input type="number" class="input-text" name="billing_npi_number" id="billing_npi_number" placeholder="NPI Number" value=""required />
                        </p>
                        <div class="clear"></div>
                        
                        <h4>Facility Address</h4>
                        <hr />
                        <p class="form-row form-row-first">
                           <label for="facility_address_1">Address<span class="required">*</span></label>
                           <input type="text" class="input-text" name="facility_address_1" id="facility_address_1" placeholder="Address" value="" required />
                        </p>
                        <p class="form-row form-row-last">
                           <label for="facility_address_2">Address Line 2</label>
                           <input type="text" class="input-text" name="facility_address_2" id="facility_address_2" placeholder="Address Line 2" value="" />
                        </p>
                        <p class="form-row form-row-first">
                           <label for="facility_city">City<span class="required">*</span></label>
                           <input type="text" class="input-text" name="facility_city" id="facility_city" placeholder="City" value="" required />
                        </p>
                        <p class="form-row form-row-last address-field validate-required validate-state address-field validate-required validate-state" id="billing_state_field">
                           <label for="billing_state" class="">State <abbr class="required" title="required">*</abbr></label>
                           <select name="facility_state" id="facility_state" class="state_select" autocomplete="address-level1" placeholder="">
                              <option value="">Select a state…</option>
                              <option value="AL" selected="selected">Alabama</option>
                              <option value="AK">Alaska</option>
                              <option value="AZ">Arizona</option>
                              <option value="AR">Arkansas</option>
                              <option value="CA">California</option>
                              <option value="CO">Colorado</option>
                              <option value="CT">Connecticut</option>
                              <option value="DE">Delaware</option>
                              <option value="DC">District Of Columbia</option>
                              <option value="FL">Florida</option>
                              <option value="GA">Georgia</option>
                              <option value="HI">Hawaii</option>
                              <option value="ID">Idaho</option>
                              <option value="IL">Illinois</option>
                              <option value="IN">Indiana</option>
                              <option value="IA">Iowa</option>
                              <option value="KS">Kansas</option>
                              <option value="KY">Kentucky</option>
                              <option value="LA">Louisiana</option>
                              <option value="ME">Maine</option>
                              <option value="MD">Maryland</option>
                              <option value="MA">Massachusetts</option>
                              <option value="MI">Michigan</option>
                              <option value="MN">Minnesota</option>
                              <option value="MS">Mississippi</option>
                              <option value="MO">Missouri</option>
                              <option value="MT">Montana</option>
                              <option value="NE">Nebraska</option>
                              <option value="NV">Nevada</option>
                              <option value="NH">New Hampshire</option>
                              <option value="NJ">New Jersey</option>
                              <option value="NM">New Mexico</option>
                              <option value="NY">New York</option>
                              <option value="NC">North Carolina</option>
                              <option value="ND">North Dakota</option>
                              <option value="OH">Ohio</option>
                              <option value="OK">Oklahoma</option>
                              <option value="OR">Oregon</option>
                              <option value="PA">Pennsylvania</option>
                              <option value="RI">Rhode Island</option>
                              <option value="SC">South Carolina</option>
                              <option value="SD">South Dakota</option>
                              <option value="TN">Tennessee</option>
                              <option value="TX">Texas</option>
                              <option value="UT">Utah</option>
                              <option value="VT">Vermont</option>
                              <option value="VA">Virginia</option>
                              <option value="WA">Washington</option>
                              <option value="WV">West Virginia</option>
                              <option value="WI">Wisconsin</option>
                              <option value="WY">Wyoming</option>
                              <option value="AA">Armed Forces (AA)</option>
                              <option value="AE">Armed Forces (AE)</option>
                              <option value="AP">Armed Forces (AP)</option>
                           </select>
                        </p>
                        <p class="form-row form-row-first address-field validate-required address-field validate-required" id="billing_country_field">
                           <label class="">Country</label><strong>United States (US)</strong>
                           <input type="hidden" name="facility_country" id="facility_country" value="US" autocomplete="country" class="country_to_state">
                        </p>
                        <p class="form-row form-row-last">
                           <label for="facility_postcode">Zip<span class="required">*</span></label>
                           <input type="number" class="form-control" name="facility_postcode" id="facility_postcode" placeholder="Zip" value="" required />
                        </p>
                        <p class="form-row form-row-first">
                           <label for="facility_phone">Phone<span class="required">*</span></label>
                           <input type="number" maxlength="10" class="input-text" name="facility_phone" id="facility_phone"  placeholder="Phone" value="" />
                        </p>
                        <div class="clear"></div>

                        <p class="form-row form-row-first  now">
                           <label for="billing_card_name">Name On Credit Card</label>
                           <input type="text" class="input-text" name="billing_card_name" id="billing_card_name" placeholder="Name On Credit Card" value="" />
                        </p>
                        <p class="form-row form-row-last  now">
                           <label for="billing_date">Expiration Date</label>
                           <input type="date" class="input-text" name="billing_date" id="billing_date" placeholder="Expiration Date" value="" />
                        </p>
                        <p class="form-row form-row-first  now">
                           <label for="billing_card_number">Card Number</label>
                           <input type="number" class="input-text" name="billing_card_number" id="billing_card_number" placeholder="Card Number" value="" />
                        </p>
                        <p class="form-row form-row-last  now">
                           <label for="billing_cvv">CVV Code</label>
                           <input type="number" class="input-text" name="billing_cvv" id="billing_cvv" placeholder="CVV Code" value="" />
                        </p>
                        <h4>Billing Address</h4>
                        <hr />
                        <p class="form-row form-row-first">
                           <label for="billing_address_1">Address<span class="required">*</span></label>
                           <input type="text" class="input-text" name="billing_address_1" id="billing_address_1" placeholder="Address" value="" required />
                        </p>
                        <p class="form-row form-row-last">
                           <label for="billing_address_2">Address Line 2</label>
                           <input type="text" class="input-text" name="billing_address_2" id="billing_address_2" placeholder="Address Line 2" value="" />
                        </p>
                        <p class="form-row form-row-first">
                           <label for="billing_city">City<span class="required">*</span></label>
                           <input type="text" class="input-text" name="billing_city" id="billing_city" placeholder="City" value="" required />
                        </p>
                        <p class="form-row form-row-last address-field validate-required validate-state address-field validate-required validate-state" id="billing_state_field">
                           <label for="billing_state" class="">State <abbr class="required" title="required">*</abbr></label>
                           <select name="billing_state" id="billing_state" class="state_select" autocomplete="address-level1" placeholder="">
                              <option value="">Select a state…</option>
                              <option value="AL" selected="selected">Alabama</option>
                              <option value="AK">Alaska</option>
                              <option value="AZ">Arizona</option>
                              <option value="AR">Arkansas</option>
                              <option value="CA">California</option>
                              <option value="CO">Colorado</option>
                              <option value="CT">Connecticut</option>
                              <option value="DE">Delaware</option>
                              <option value="DC">District Of Columbia</option>
                              <option value="FL">Florida</option>
                              <option value="GA">Georgia</option>
                              <option value="HI">Hawaii</option>
                              <option value="ID">Idaho</option>
                              <option value="IL">Illinois</option>
                              <option value="IN">Indiana</option>
                              <option value="IA">Iowa</option>
                              <option value="KS">Kansas</option>
                              <option value="KY">Kentucky</option>
                              <option value="LA">Louisiana</option>
                              <option value="ME">Maine</option>
                              <option value="MD">Maryland</option>
                              <option value="MA">Massachusetts</option>
                              <option value="MI">Michigan</option>
                              <option value="MN">Minnesota</option>
                              <option value="MS">Mississippi</option>
                              <option value="MO">Missouri</option>
                              <option value="MT">Montana</option>
                              <option value="NE">Nebraska</option>
                              <option value="NV">Nevada</option>
                              <option value="NH">New Hampshire</option>
                              <option value="NJ">New Jersey</option>
                              <option value="NM">New Mexico</option>
                              <option value="NY">New York</option>
                              <option value="NC">North Carolina</option>
                              <option value="ND">North Dakota</option>
                              <option value="OH">Ohio</option>
                              <option value="OK">Oklahoma</option>
                              <option value="OR">Oregon</option>
                              <option value="PA">Pennsylvania</option>
                              <option value="RI">Rhode Island</option>
                              <option value="SC">South Carolina</option>
                              <option value="SD">South Dakota</option>
                              <option value="TN">Tennessee</option>
                              <option value="TX">Texas</option>
                              <option value="UT">Utah</option>
                              <option value="VT">Vermont</option>
                              <option value="VA">Virginia</option>
                              <option value="WA">Washington</option>
                              <option value="WV">West Virginia</option>
                              <option value="WI">Wisconsin</option>
                              <option value="WY">Wyoming</option>
                              <option value="AA">Armed Forces (AA)</option>
                              <option value="AE">Armed Forces (AE)</option>
                              <option value="AP">Armed Forces (AP)</option>
                           </select>
                        </p>
                        <p class="form-row form-row-first address-field validate-required address-field validate-required" id="billing_country_field">
                           <label class="">Country</label><strong>United States (US)</strong>
                           <input type="hidden" name="billing_country" id="billing_country" value="US" autocomplete="country" class="country_to_state">
                        </p>
                        <p class="form-row form-row-last">
                           <label for="billing_postcode">Zip<span class="required">*</span></label>
                           <input type="number" class="form-control" name="postcode" id="postcode" placeholder="Zip" value="" required />
                        </p>
                        <p style="display:none;" class="form-row form-row-wide address-field validate-required address-field validate-required" id="billing_country_field">
                           <input type="radio" name="guest" value="guest" class="guest" checked> My shipping details are same as above<br>
                           <input type="radio" name="guest" value="reg_acc" class="reg_acc" id="reg_acc"> My shipping details are different<br>
                        </p>
						 <p class="form-row form-row-first">
							 <label for="billing_phone">Phone<span class="required">*</span></label>
							 <input type="number" maxlength="10" class="input-text" name="billing_phone" id="billing_phone"  placeholder="Phone" value="" />
						 </p>
						 <p class="form-row form-row-last">
							 <label for="reg_email">Email address <span class="required">*</span></label>
							 <input type="email" placeholer="Email" class="woocommerce-Input woocommerce-Input--text input-text" name="reg_email" id="reg_email" required value="" />
						 </p>
                        <!-- shipping address started -->
                        <div class="shipping_address" id="shipping_address">
                           <p class="form-row form-row-first">
                              <label for="shipping_address_1">Address</label>
                              <input type="text" class="input-text" name="shipping_address_1" id="shipping_address_1" placeholder="Address" value="" />
                           </p>
                           <p class="form-row form-row-last">
                              <label for="shipping_address_2">Address Line 2</label>
                              <input type="text" class="input-text" name="shipping_address_2" id="shipping_address_2" placeholder="Address Line 2" value="" />
                           </p>
                           <p class="form-row form-row-first">
                              <label for="shipping_city">City</label>
                              <input type="text" class="input-text" name="shipping_city" id="shipping_city" placeholder="City" value=""/>
                           </p>
                           <p class="form-row form-row-last address-field validate-required validate-state address-field validate-required validate-state" id="shipping_state_field">
										<label for="shipping_state" class="">State <abbr class="required" title="required">*</abbr></label>
										<select name="shipping_state" id="shipping_state" class="state_select" autocomplete="address-level1" placeholder="">
											<option value="">Select a state…</option>
											<option value="AL" selected="selected">Alabama</option>
											<option value="AK">Alaska</option>
											<option value="AZ">Arizona</option>
											<option value="AR">Arkansas</option>
											<option value="CA">California</option>
											<option value="CO">Colorado</option>
											<option value="CT">Connecticut</option>
											<option value="DE">Delaware</option>
											<option value="DC">District Of Columbia</option>
											<option value="FL">Florida</option>
											<option value="GA">Georgia</option>
											<option value="HI">Hawaii</option>
											<option value="ID">Idaho</option>
											<option value="IL">Illinois</option>
											<option value="IN">Indiana</option>
											<option value="IA">Iowa</option>
											<option value="KS">Kansas</option>
											<option value="KY">Kentucky</option>
											<option value="LA">Louisiana</option>
											<option value="ME">Maine</option>
											<option value="MD">Maryland</option>
											<option value="MA">Massachusetts</option>
											<option value="MI">Michigan</option>
											<option value="MN">Minnesota</option>
											<option value="MS">Mississippi</option>
											<option value="MO">Missouri</option>
											<option value="MT">Montana</option>
											<option value="NE">Nebraska</option>
											<option value="NV">Nevada</option>
											<option value="NH">New Hampshire</option>
											<option value="NJ">New Jersey</option>
											<option value="NM">New Mexico</option>
											<option value="NY">New York</option>
											<option value="NC">North Carolina</option>
											<option value="ND">North Dakota</option>
											<option value="OH">Ohio</option>
											<option value="OK">Oklahoma</option>
											<option value="OR">Oregon</option>
											<option value="PA">Pennsylvania</option>
											<option value="RI">Rhode Island</option>
											<option value="SC">South Carolina</option>
											<option value="SD">South Dakota</option>
											<option value="TN">Tennessee</option>
											<option value="TX">Texas</option>
											<option value="UT">Utah</option>
											<option value="VT">Vermont</option>
											<option value="VA">Virginia</option>
											<option value="WA">Washington</option>
											<option value="WV">West Virginia</option>
											<option value="WI">Wisconsin</option>
											<option value="WY">Wyoming</option>
											<option value="AA">Armed Forces (AA)</option>
											<option value="AE">Armed Forces (AE)</option>
											<option value="AP">Armed Forces (AP)</option>
										</select>
									</p>
									<p class="form-row form-row-first address-field validate-required address-field validate-required" id="shipping_country_field">
										<label class="">Country</label><strong>United States (US)</strong>
										<input type="hidden" name="shipping_country" id="shipping_country" value="US" autocomplete="country" class="country_to_state">
									</p>
									<p class="form-row form-row-last">
										<label for="shipping_postcode">Zip</label>
										<input type="number" class="input-text" name="shipping_postcode" id="shipping_pin_code" placeholder="Zip*" value="" />
									</p>
									
								</div>
								<!-- shipping adddress ends -->
								
								
								<!--<p class="form-row-last">
								   <label for="reg_password">Password <span class="required">*</span></label>
								   <input type="password" placeholer="Password"  class="woocommerce-Input woocommerce-Input--text input-text" name="reg_password" id="reg_password" value="" />
								</p>-->
								<label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox now" style="padding-top: 32px;">
								<input type="checkbox" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox now" name="terms" id="terms" required>I agree Terms &amp; Conditions of Sale <a style="border-bottom: none; font-size: 15px; margin-bottom: 4px; margin-left: 10px;color: #337ab7;" class="btn" data-popup-open2="popup-3" href="#">(View Terms and Conditon)</a>
								</label>
								<label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox now">
								<input type="checkbox" class="now woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" name="terms" id="terms" required>I agree Recurring Credit Card Charge Authorization<a style="border-bottom: none; font-size: 15px; margin-bottom: 4px; margin-left: 10px;color: #337ab7;" class="btn" data-popup-open1="popup-2" href="#">(View Authorization)</a>
								</label>
								<label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox now">
									<input type="checkbox" class="now woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" name="terms" id="terms" required>I agree to Purchase of Compounded Office Use Medication<a style="border-bottom: none; font-size: 15px; margin-bottom: 4px; margin-left: 10px;color: #337ab7;" class="btn" data-popup-open="popup-1" href="#">(View Terms for  for Purchase of Compounded Office Use Medication)</a>
								</label>
								<label class="now woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
									<input type="checkbox" class="now woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" name="terms" id="terms" required>I agree to Practitioner Statement Regarding Office Visit Requirements<a style="border-bottom: none; font-size: 15px; margin-bottom: 4px; margin-left: 10px;color: #337ab7;" class="btn" data-popup-open3="popup-4" href="#">(View Terms)</a>
								</label>
								<div class="woocommerce-privacy-policy-text"></div>
								<p >* Fields are Mandatory</p>
                        <p style="clear:both;" class="woocommerce-FormRow form-row">
                           <input type="hidden" id="woocommerce-register-nonce" name="woocommerce-register-nonce" value="ea7b47fc24" /><input type="hidden" name="_wp_http_referer" value="/" />    <button type="submit" style="margin-top: 32px;" class="woocommerce-Button button" name="register" value="Submit">Submit</button>
                        </p>
                     </form>
                  </div>
                  <!-- .login-inner -->
               </div>
               <div class="col-1 large-12 col pb-0" id="lost_password_pop">
                  <div class="account-login-inner" >
                     <h3 class="uppercase_reg">Lost Password &nbsp;&nbsp;&nbsp;
                         <!-- <button style="margin:0" id="showregister" type="button" class="woocommerce-Button button" >Register</button> -->
                         
                        </h3>
                     <form action="" id="lost-pas-frm" class="woocommerce-form woocommerce-form-login login" method="post">
                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                           <label for="username">Enter your registered email :<span class="required">*</span></label>
                           <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="lossemail" id="lossemail" value="" />
                        </p>
                       
                        <p class="form-row">
                           <input type="hidden" id="woocommerce-login-nonce" name="woocommerce-login-nonce" value="d1023e82bf" /><input type="hidden" name="_wp_http_referer" value="/" />          <button type="submit" class="woocommerce-Button button" name="login" value="Login">Submit</button>
                           <label class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
                           
                        </p>
                        <p id="noemail" style="color:red">Email doesn't exist</p>
                        <p id="chkemail" style="color:green">Check your email to recover password</p>
                        <p class="woocommerce-LostPassword lost_password">
                           <a style="cursor: pointer;" id="showlogin">Back to login</a>
                        </p>
                        
                     </form>
                  </div>
                  <!-- .login-inner -->
               </div>
               <div class="col-2 large-12 col pb-0" id="register-pop">
                  <div class="account-register-inner">
                     <h3 class="uppercase_reg">Register OR &nbsp;&nbsp;&nbsp;
                         <button style="margin:0" id="showlogin" type="button" class="woocommerce-Button button" name="register" >Login</button>
                         <!-- <br><span style="font-size:16px;cursor:pointer;"><a id="showlogin">New User - Login</a></span> -->
                        </h3> 
                     
                  </div>
                  <!-- .register-inner -->
               </div>
               <!-- .large-6 -->
            </div>
            <!-- .row -->
         </div>

         <!-- .account-login-container -->
      </div>
        </main>
        <script src="/assets/js/jquery-2.2.4.min.js"></script>
        <?php include '../footer.php' ?>
         <script>
           /* attach a submit handler to the form */
           jQuery(document).ready(function($) {
                  $('#lost-pas-frm').submit(function(event) {
                      var email=document.getElementById("lossemail").value; 
                         
                  
                     
                   /* stop form from submitting normally */
                   event.preventDefault();
                   $.ajax({
                       type: "post",
                       url: "../ordering/recover-pas.php",
                       data: {email:email},
                       success: function (data) {
                           
                           if(data.status == 'success'){
                            $('#lost-pas-frm')[0].reset();
                               $("#chkemail").css("display", "block");
                              $("#noemail").css("display", "none");
                           }
                           
                           else if(data.status == 'noemail'){
                            $("#noemail").css("display", "block");
                            $("#chkemail").css("display", "none");
                          }
                           else{alert("Fail");}
                       }
                   });
                   /* get the action attribute from the <form action=""> element */
                   
                   //   $("#login-pop").css("display", "block");
                   //   $("#popup-6").css("display", "block");
                     
                     
                   });
                  $('#login-frm').submit(function(event) {
                      var email=document.getElementById("username").value; 
                       var passcode=document.getElementById("password").value;  
                  
                     
                   /* stop form from submitting normally */
                   event.preventDefault();
                   $.ajax({
                       type: "post",
                       url: "../ordering/login-to-order.php",
                       data: {email:email,passcode:passcode},
                       success: function (data) {
                           
                           if(data.status == 'success2'){
                               
                               window.location.href = "/503b/order/";
                           }
                           else if(data.status == 'userpass'){alert("Username or password wrong!");}
                           else if(data.status == 'error'){alert("Error on query!");}
                           else{alert("Fail");}
                       }
                   });
                  });
                   
                 
                    $('#register-frm').submit(function(event) {
                     
                      
                      /* stop form from submitting normally */
                      event.preventDefault();

                      /* get the action attribute from the <form action=""> element */
                      var $form = $( this ),
                          url = '../ordering/register-api-form.php';
                          var email=document.getElementById("reg_email").value; 
                          var passcode=document.getElementById("reg_password").value;  
                          alert($('#newfile').val());
                        
                      /* Send the data using post with element id name and name2*/
                      var posting = $.post( url, { billing_first_name: $('#billing_first_name').val(), billing_last_name: $('#billing_last_name').val(),billing_company: $('#billing_company').val(), billing_dea_number: $('#billing_dea_number').val(), fileToUpload: $('#fileToUpload').val(), fileToUpload1: $('#fileToUpload1').val(), billing_license_number: $('#billing_license_number').val(), billing_npi_number: $('#billing_npi_number').val(), billing_card_name: $('#billing_card_name').val(), billing_date: $('#billing_date').val(), billing_card_number: $('#billing_card_number').val(), billing_cvv: $('#billing_cvv').val(), billing_address_1: $('#billing_address_1').val(), billing_address_2: $('#billing_address_2').val(), billing_city: $('#billing_city').val(), billing_state: $('#billing_state').val(), billing_country: $('#billing_country').val(), postcode: $('#postcode').val(), billing_phone: $('#billing_phone').val(), reg_email: $('#reg_email').val(), reg_password: $('#reg_password').val() } );
                     
                      /* Alerts the results */
                      posting.done(function( data ) {
                          if(data.status == 'duplicate'){
                              alert("Email already exist");
                          }
                          else{
                        $("#successmessage").css("display", "block");
                       
                        var form = document.getElementById("register-frm");
                        form.reset();
                        
                        $("#register-pop").css("display", "none");
                        $.ajax({
                          type: "post",
                          url: "../ordering/reg-to-login.php",
                          data: {email:email,passcode:passcode},
                          success: function (data) {
                              
                              if(data.status == 'success'){
                                  
                                  window.location.href = "/503b/order/";
                              }
                              else if(data.status == 'error'){alert("Error on query!");}
                              else{alert("Fail");}
                          }
                      });
                          }
                      //   $("#login-pop").css("display", "block");
                      //   $("#popup-6").css("display", "block");
                        
                        setTimeout(function(){  $("#popup-6").css("display","none"); }, 2500);
                        
                      //   sessionStorage.setItem("Email", email);
                      //  var value = sessionStorage.getItem("Email");
                      //  alert(value);
                          
                        
                      });
                      
                    });

                    $("#showlogin").click(function () {
                      $("#lost_password_pop").css("display", "none");
                      $("#register-pop").css("display", "none");
                      $("#login-pop").css("display", "block");
                      
                      
                      }); 
                    $("#lost_password_btn").click(function () {
                      $("#lost_password_pop").css("display", "block");
                      $("#register-pop").css("display", "none");
                      $("#login-pop").css("display", "none");
                      
                      
                      }); 
                       
                      $("#showregister").click(function () {
                          $("#login-pop").css("display", "none");
                          $("#lost_password_pop").css("display", "none");
                          $("#register-pop").css("display", "block");
                      
                      
                      });
                   });
         </script>
         <script>
            jQuery(".shipping_address").hide();
             jQuery(function(){
                jQuery('.reg_acc').click(function(){
                     //alert('helllo1111');
                     jQuery('.shipping_address').css('display','block','!important');
                    //$('#createaccount').is(':checked');
                    //$('#createaccount').val(this.checked);
                    jQuery('#shipping_address').css({
                      'display':'block'  
                    });
                });
                });
            
               jQuery(function(){
                jQuery('.guest').click(function(){
                     //alert('helllo');
                     jQuery('.shipping_address').css('display','block','!important');
                    //$('#createaccount').is(':checked');
                    //$('#createaccount').val(this.checked);
                    jQuery('#shipping_address').css({
                      'display':'none'  
                    });
                });
                }); 
              
            jQuery(function() {
                //----- OPEN
                jQuery('[data-popup-open]').on('click', function(e)  {
                    var targeted_popup_class = jQuery(this).attr('data-popup-open');
                    jQuery('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);
             
                    e.preventDefault();
                });
             
                //----- CLOSE
                jQuery('[data-popup-close]').on('click', function(e)  {
                    var targeted_popup_class = jQuery(this).attr('data-popup-close');
                    jQuery('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);
             
                    e.preventDefault();
                });
                 jQuery('[data-popup-open1]').on('click', function(e)  {
                    var targeted_popup_class = jQuery(this).attr('data-popup-open1');
                    jQuery('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);
             
                    e.preventDefault();
                });
             
                //----- CLOSE
                jQuery('[data-popup-close]').on('click', function(e)  {
                    var targeted_popup_class = jQuery(this).attr('data-popup-close');
                    jQuery('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);
             
                    e.preventDefault();
                });
                 jQuery('[data-popup-open2]').on('click', function(e)  {
                    var targeted_popup_class = jQuery(this).attr('data-popup-open2');
                    jQuery('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);
             
                    e.preventDefault();
                });
             
                //----- CLOSE
                jQuery('[data-popup-close]').on('click', function(e)  {
                    var targeted_popup_class = jQuery(this).attr('data-popup-close');
                    jQuery('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);
             
                    e.preventDefault();
                });
                jQuery('[data-popup-open3]').on('click', function(e)  {
                    var targeted_popup_class = jQuery(this).attr('data-popup-open3');
                    jQuery('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);
             
                    e.preventDefault();
                });
             
                //----- CLOSE
                jQuery('[data-popup-close]').on('click', function(e)  {
                    var targeted_popup_class = jQuery(this).attr('data-popup-close');
                    jQuery('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);
             
                    e.preventDefault();
                });
                
                jQuery("#reg_email").attr('required','true');  
                
                jQuery("#reg_email").attr("placeholder", "Email");
                
                jQuery("#reg_password").attr('required','true');  
                
                jQuery("#reg_password").attr("placeholder", "Password");
            });
            
      </script>
      <script type="text/javascript">
         var c = document.body.className;
         c = c.replace(/woocommerce-no-js/, 'woocommerce-js');
         document.body.className = c;
      </script>
      <script type='text/javascript'>
         /* <![CDATA[ */
         var wpcf7 = {"apiSettings":{"root":"","namespace":"contact-form-7\/v1"}};
         /* ]]> */
      </script>
      <script type='text/javascript' src='../assets/js/scripts3c21.js?ver=5.1.1'></script>
      <script type='text/javascript' src='../assets/js/jquery.blockUI.min44fd.js?ver=2.70'></script>
      <script type='text/javascript'>
         /* <![CDATA[ */
         var wc_add_to_cart_params = {"ajax_url":"","wc_ajax_url":"\/?wc-ajax=%%endpoint%%","i18n_view_cart":"View cart","cart_url":"","is_cart":"","cart_redirect_after_add":"no"};
         /* ]]> */
      </script>
      <script type='text/javascript' src='../assets/js/add-to-cart.min9d52.js?ver=3.5.1'></script>
      <script type='text/javascript' src='../assets/js/js.cookie.min6b25.js?ver=2.1.4'></script>
      <script type='text/javascript'>
         /* <![CDATA[ */
         var woocommerce_params = {"ajax_url":""};
         /* ]]> */
      </script>
      <script type='text/javascript' src='../assets/js/woocommerce.min9d52.js?ver=3.5.1'></script>
      <script type='text/javascript'>
         /* <![CDATA[ */
         var wc_cart_fragments_params = {"ajax_url":"","wc_ajax_url":"\/?wc-ajax=%%endpoint%%","cart_hash_key":"wc_cart_hash_df2b43ebf4897b222a24124d9f882f16","fragment_name":"wc_fragments_df2b43ebf4897b222a24124d9f882f16"};
         /* ]]> */
      </script>
      <script type='text/javascript' src='../assets/js/cart-fragments.min9d52.js?ver=3.5.1'></script>
      <script type='text/javascript' src='../assets/js/yith-autocomplete.min4281.js?ver=1.2.7'></script>
      <script type='text/javascript' src='../assets/js/flatsome-live-search1aae.js?ver=3.5.3'></script>
      <script type='text/javascript' src='../assets/js/hoverIntent.minc245.js?ver=1.8.1'></script>
      <script type='text/javascript'>
         /* <![CDATA[ */
         var flatsomeVars = {"ajaxurl":"","rtl":"","sticky_height":"79"};
         /* ]]> */
      </script>
      <script type='text/javascript' src='../assets/js/flatsome1aae.js?ver=3.5.3'></script>
      <script type='text/javascript' src='../assets/js/woocommerce1aae.js?ver=3.5.3'></script>
      <script type='text/javascript' src='../assets/js/wp-embed.mind87f.js?ver=4.9.9'></script>
      <script type='text/javascript'>
         /* <![CDATA[ */
         var dgwt_wcas = {"t":{"sale_badge":"sale","featured_badge":"featured","category":"Category","tag":"tag"},"ajax_search_endpoint":"\/?wc-ajax=dgwt_wcas_ajax_search","ajax_details_endpoint":"\/?wc-ajax=dgwt_wcas_result_details","action_search":"dgwt_wcas_ajax_search","action_result_details":"dgwt_wcas_result_details","min_chars":"3","width":"auto","show_details_box":"","show_images":"1","show_price":"","show_desc":"","show_sale_badge":"","show_featured_badge":"","is_rtl":"","show_preloader":"1","preloader_url":""};
         /* ]]> */
      </script>
      <script type='text/javascript' src='../assets/js/jquery.dgwt-wcas.min1576.js?ver=1.2.1'></script>
      <script type='text/javascript'>
         /* <![CDATA[ */
         var _zxcvbnSettings = {"src":"assets\/js\/zxcvbn.min.js"};
         /* ]]> */
      </script>
      <script type='text/javascript' src='../assets/js/zxcvbn-async.min5152.js?ver=1.0'></script>
      <script type='text/javascript'>
         /* <![CDATA[ */
         var pwsL10n = {"unknown":"Password strength unknown","short":"Very weak","bad":"Weak","good":"Medium","strong":"Strong","mismatch":"Mismatch"};
         /* ]]> */
      </script>
      <script type='text/javascript' src='../assets/js/password-strength-meter.min.js'></script>
      <script type='text/javascript'>
         /* <![CDATA[ */
         var wc_password_strength_meter_params = {"min_password_strength":"0","i18n_password_error":"Please enter a stronger password.","i18n_password_hint":"Hint: The password should be at least twelve characters long. To make it stronger, use upper and lower case letters, numbers, and symbols like ! \" ? $ % ^ & )."};
         /* ]]> */
      </script>
      <script type='text/javascript' src='../assets/js/password-strength-meter.min9d52.js?ver=3.5.1'></script>
 
</body>
</html>
        <?php }?>