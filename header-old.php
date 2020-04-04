 <style>

.mobilemenu {
  width: 42px;
  height: 5px;
  background-color: #444242;
  margin: 4px 0;
}
@media (max-width : 849px){
   .mobilemenu{
          width: 132px !important;
   }
}
@media (max-width : 750px){
   .mobilemenu{
          width: 107px !important;
   }
}
@media (max-width : 499px){
   .mobilemenu{
              width: 58px !important;
   }
}
@media (max-width : 411px){
   .mobilemenu{
              width: 53px !important;
   }
}
@media (max-width : 370px){
   .mobilemenu{
              width: 45px !important;
   }
}
@media (max-width : 340px){
   .mobilemenu{
              width: 38px !important;
   }
}
@media only screen and (min-device-width : 320px) and (max-device-width : 480px) {
.mobilemenu {
   width: 56px;
  height: 5px;
  background-color: black;
  margin: 4px 0;
   }
}


@media only screen and (min-device-width : 500px) and (max-device-width : 750px) {
   .mobilemenu {
   width: 42px;
  height: 5px;
  background-color: black;
  margin: 4px 0;
   }
}
</style>
<header id="header" class="header header-full-width has-sticky sticky-jump">
            <div class="header-wrapper">
               <div id="top-bar" class="header-top hide-for-sticky nav-dark">
                  <div class="flex-row container">
                     <div class="flex-col hide-for-medium flex-left">
                        <ul class="nav nav-left medium-nav-center nav-small  nav-divided">
                        </ul>
                     </div>
                     <!-- flex-col left -->
                     <div class="flex-col hide-for-medium flex-center">
                        <ul class="nav nav-center nav-small  nav-divided">
                        </ul>
                     </div>
                     <!-- center -->
                     <div class="flex-col hide-for-medium flex-right">
                        <ul class="nav top-bar-nav nav-right nav-small  nav-divided">
                           <li class="html custom html_topbar_right"><img src="/assets/images/FDA_.png"></li>
                        </ul>
                     </div>
                     <!-- .flex-col right -->
                     <div class="flex-col show-for-medium flex-grow">
                        <ul class="nav nav-center nav-small mobile-nav  nav-divided">
                           <li class="html custom html_topbar_left"><img src="/assets/images/FDA_.png"></li>
                        </ul>
                     </div>
                  </div>
                  <!-- .flex-row -->
               </div>
               <!-- #header-top -->
               <div id="masthead" class="header-main ">
                  <div class="header-inner flex-row container logo-left medium-logo-center" role="navigation">
                     <!-- Logo -->
                     <div id="logo" class="flex-col logo">
                        <!-- Header logo -->
                        <a href="/" title="ASP Cares - " rel="home">
                        <img width="265" height="93" src="/assets/images/logo.png" class="header_logo header-logo" alt="ASP Cares"/><img  width="265" height="93" src="/" class="header-logo-dark" alt="ASP Cares"/></a>
                     </div>
                     <!-- Mobile Left Elements -->
                     <div class="flex-col show-for-medium flex-left">
                        <ul class="mobile-nav nav nav-left ">
                           <li class="nav-icon has-icon">
                              <a href="#" data-open="#main-menu" data-pos="left" data-bg="main-menu-overlay" data-color="" class="is-small small-toggle" aria-controls="main-menu" aria-expanded="false">
                              <!--  <i class="icon-menu" ></i> -->
                              <div class="mobilemenu"></div>
                              <div class="mobilemenu"></div>
                               <div class="mobilemenu"></div>
                              <span class="menu-title uppercase hide-for-small">Menu</span>   </a>
                           </li>
                        </ul>
                     </div>
                     <!-- Left Elements -->
                     <div class="flex-col hide-for-medium flex-left
                        flex-grow">
                        <ul class="header-nav header-nav-main nav nav-left  nav-uppercase" >
                           <li class="html custom html_topbar_left"><img src="/assets/images/FDA_.png"></li>
                        </ul>
                     </div>
                     <!-- Right Elements -->
                     <div class="flex-col hide-for-medium flex-right">
                        <ul class="header-nav header-nav-main nav nav-right  nav-uppercase">
                           <li id="menu-item-307" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-305 current_page_item active  menu-item-307"><a href="/" class="nav-top-link">Home</a></li>
                           <li id="menu-item-1085" class="menu-item menu-item-type-custom menu-item-object-custom  menu-item-1085"><a href="/about-us/" class="nav-top-link">About Us</a></li>
                           <li id="menu-item-796" class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-796"><a href="/catalog-2" class="nav-top-link">Catalog</a></li>



                           <li id="menu-item-379" class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-379"><a href="/clinical-trials/" class="nav-top-link">Clinical Trials</a></li>

                            <!-- <li id="menu-item-379" class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-379"><a href="" class="nav-top-link">Cosmetics</a></li> -->

                            <li id="menu-item-379" class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-379"><a href="/drug-shortage/" class="nav-top-link">Drug shortage</a></li>



                           <li id="menu-item-1029" class="menu-item menu-item-type-custom menu-item-object-custom  menu-item-1029"><a href="/ordering/company-login" target="_blank
                              " class="nav-top-link">Ordering</a></li>
                           <?php //var_dump($_SESSION); die();
                           if ($_SESSION == NULL) { ?>
                              <li id="menu-item-379" class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-379"><a href="/register" class="nav-top-link">Register</a></li>                              
                           <?php } else{ ?>
                              <li id="menu-item-379" class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-379"><a href="/logout" class="nav-top-link">Logout</a></li>
                           <?php } ?>
                        <li id="menu-item-699" class="menu-item menu-item-type-custom menu-item-object-custom  menu-item-699"><a href="/contact-us/" class="nav-top-link">Contact</a></li>
                        </ul>
                     </div>
                     <!-- Mobile Right Elements -->
                     <div class="flex-col show-for-medium flex-right">
                        <ul class="mobile-nav nav nav-right ">
                           <li class="cart-item has-icon">
                              <a href="cart/index.html" class="header-cart-link off-canvas-toggle nav-top-link is-small" data-open="#cart-popup" data-class="off-canvas-cart" title="Cart" data-pos="right">
                              <i class="icon-shopping-cart"
                                 data-icon-label="0">
                              </i>
                              </a>
                              <!-- Cart Sidebar Popup -->
                              <div id="cart-popup" class="mfp-hide widget_shopping_cart">
                                 <div class="cart-popup-inner inner-padding">
                                    <div class="cart-popup-title text-center">
                                       <h4 class="uppercase">Cart</h4>
                                       <div class="is-divider"></div>
                                    </div>
                                    <div class="widget_shopping_cart_content">
                                       <p class="woocommerce-mini-cart__empty-message">No products in the cart.</p>
                                    </div>
                                    <div class="cart-sidebar-content relative"></div>
                                 </div>
                              </div>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <!-- .header-inner -->
                  <!-- Header divider -->
                  <div class="container">
                     <div class="top-divider full-width"></div>
                  </div>
               </div>
               <!-- .header-main -->
               <div class="header-bg-container fill">
                  <div class="header-bg-image fill"></div>
                  <div class="header-bg-color fill"></div>
               </div>
               <!-- .header-bg-container -->   
            </div>
            
         </header>
         <div id="main-menu" class="mobile-sidebar no-scrollbar mfp-hide">
         <div class="sidebar-menu no-scrollbar ">
            <ul class="nav nav-sidebar  nav-vertical nav-uppercase">
               <li class="header-search-form search-form html relative has-icon">
                  <div class="header-search-form-wrapper">
                     <div class="searchform-wrapper ux-search-box relative form- is-normal">
                        <form role="search" method="get" class="searchform" action="https://temp.503bfacility.com/">
                           <div class="flex-row relative">
                              <div class="flex-col flex-grow">
                                 <input type="search" class="search-field mb-0" name="s" value="" placeholder="Search&hellip;" />
                                 <input type="hidden" name="post_type" value="product" />
                              </div>
                              <!-- .flex-col -->
                              <div class="flex-col">
                                 <button type="submit" class="ux-search-submit submit-button secondary button icon mb-0">
                                 <i class="icon-search" ></i>       </button>
                              </div>
                              <!-- .flex-col -->
                           </div>
                           <!-- .flex-row -->
                           <div class="live-search-results text-left z-top"></div>
                        </form>
                     </div>
                  </div>
               </li>
               <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-305 current_page_item menu-item-307"><a href="/" class="nav-top-link">Home</a></li>

               <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1085"><a href="/about-us/" class="nav-top-link">About Us</a></li>
               <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-796"><a href="/catalog-2/" class="nav-top-link">Catalog</a></li>

               <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1029"><a href="/clinical-trials/" class="nav-top-link">Clinical Trials</a></li>

               <!-- <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1029"><a href="#" class="nav-top-link">Cosmetics</a></li> -->

               <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1029"><a href="/drug-shortage" class="nav-top-link">Drug shortage</a></li>


               <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1029"><a href="#" class="nav-top-link">Ordering</a></li>

               <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-379"><a href="/register/" class="nav-top-link">Register</a></li>

               <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-699"><a href="/contact-us/" class="nav-top-link">Contact Us</a></li>

               
               <li class="account-item has-icon menu-item">
                  <a href="my-account/"
                     class="nav-top-link nav-top-not-logged-in">
                  <span class="header-account-title">
                  Login  </span>
                  </a><!-- .account-login-link -->
               </li>
               <li class="header-newsletter-item has-icon">
                  <a href="#header-newsletter-signup" class="tooltip" title="Sign up for Newsletter">
                  <i class="icon-envelop"></i>
                  <span class="header-newsletter-title">
                  Newsletter    </span>
                  </a><!-- .newsletter-link -->
               </li>
               <li class="html header-social-icons ml-0">
                  <div class="social-icons follow-icons " ><a href="http://url/" target="_blank" data-label="Facebook"  rel="nofollow" class="icon plain facebook tooltip" title="Follow on Facebook"><i class="icon-facebook" ></i></a><a href="http://url/" target="_blank" rel="nofollow" data-label="Instagram" class="icon plain  instagram tooltip" title="Follow on Instagram"><i class="icon-instagram" ></i></a><a href="http://url/" target="_blank"  data-label="Twitter"  rel="nofollow" class="icon plain  twitter tooltip" title="Follow on Twitter"><i class="icon-twitter" ></i></a><a href="mailto:your@email" data-label="E-mail"  rel="nofollow" class="icon plain  email tooltip" title="Send us an email"><i class="icon-envelop" ></i></a></div>
               </li>
               <li class="html custom html_topbar_right"><img src="/assets/images/FDA_.png"></li>
            </ul>
         </div>
         <!-- inner -->
      </div>