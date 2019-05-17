<!-- Mobile Sidebar -->
<div id="main-menu" class="mobile-sidebar no-scrollbar mfp-hide">
    <div class="sidebar-menu no-scrollbar ">
        <ul class="nav nav-sidebar  nav-vertical nav-uppercase">
            <li class="header-search-form search-form html relative has-icon">
                <div class="header-search-form-wrapper">
                    <div class="searchform-wrapper ux-search-box relative form- is-normal">
                        <form role="search" method="get" class="searchform" action="http://sofaphucdat.com/">
                            <div class="flex-row relative">
                                <div class="flex-col search-form-categories">
                                    <select class="search_categories resize-select mb-0" name="product_cat" style="width: 47.7986px;">
                                        <option value="" selected="selected">All</option>
                                        <option value="sofa-ni">Sofa nỉ</option>
                                        <option value="ban-sofa">Bàn</option>
                                        <option value="san-pham-ban-chay">Sản phẩm bán chạy</option>
                                        <option value="sofa-da">Sofa da</option>
                                    </select>
                                </div>
                                <!-- .flex-col -->
                                <div class="flex-col flex-grow">
                                    <input type="search" class="search-field mb-0" name="s" value="" placeholder="Nhập từ khóa tìm kiếm...">
                                    <input type="hidden" name="post_type" value="product">
                                </div>
                                <!-- .flex-col -->
                                <div class="flex-col">
                                    <button type="submit" class="ux-search-submit submit-button secondary button icon mb-0">
                                        <i class="fa fa-search"></i>			</button>
                                </div>
                                <!-- .flex-col -->
                            </div>
                            <!-- .flex-row -->
                            <div class="live-search-results text-left z-top"></div>
                        </form>
                    </div>
                </div>
            </li>
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-16 current_page_item menu-item-23"><a href="http://sofaphucdat.com/" class="nav-top-link">Trang chủ</a></li>
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-22"><a href="http://sofaphucdat.com/gioi-thieu/" class="nav-top-link">Giới thiệu</a></li>
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-24"><a href="http://sofaphucdat.com/lien-he/" class="nav-top-link">Liên hệ</a></li>
            <li class="account-item has-icon menu-item">
                <a href="http://sofaphucdat.com/tai-khoan/" class="nav-top-link nav-top-not-logged-in">
                <span class="header-account-title">
                Đăng nhập  </span>
                </a><!-- .account-login-link -->
            </li>
        </ul>
    </div>
    <!-- inner -->
</div>
<!-- #mobile-menu -->
<script id="lazy-load-icons">
    /* Lazy load icons css file */
    var fl_icons = document.createElement('link');
    fl_icons.rel = 'stylesheet';
    fl_icons.href = '{{$_ENV['APP_URL']}}css/css/fl-icons.css';
    fl_icons.type = 'text/css';
    var fl_icons_insert = document.getElementsByTagName('link')[0];
    fl_icons_insert.parentNode.insertBefore(fl_icons, fl_icons_insert);
</script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5c383c01494cc76b78729aed/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->    
<div id="login-form-popup" class="lightbox-content mfp-hide">
    <div class="woocommerce-notices-wrapper"></div>
    <div class="account-container lightbox-inner">
        <div class="account-login-inner">
            <h3 class="uppercase">Đăng nhập</h3>
            <form class="woocommerce-form woocommerce-form-login login" method="post">
                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                    <label for="username">Tên tài khoản hoặc địa chỉ email&nbsp;<span class="required">*</span></label>
                    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="">				
                </p>
                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                    <label for="password">Mật khẩu&nbsp;<span class="required">*</span></label>
                    <input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password">
                </p>
                <p class="form-row">
                    <input type="hidden" id="woocommerce-login-nonce" name="woocommerce-login-nonce" value="a1d6733163"><input type="hidden" name="_wp_http_referer" value="/">					<button type="submit" class="woocommerce-Button button" name="login" value="Đăng nhập">Đăng nhập</button>
                    <label class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
                    <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever"> <span>Ghi nhớ mật khẩu</span>
                    </label>
                </p>
                <p class="woocommerce-LostPassword lost_password">
                    <a href="http://sofaphucdat.com/tai-khoan/lost-password/">Quên mật khẩu?</a>
                </p>
            </form>
        </div>
        <!-- .login-inner -->
    </div>
    <!-- .account-login-container -->
</div>
<!-- Mobile Call Now and Map Buttons -->
<div id="rpb_spacer"></div>
<div id="rpb">
    <div>
        <a href="tel:0968-352-496" id="call_now" onclick=" ga(&#39;send&#39;, &#39;event&#39;, &#39;Phone Call&#39;, &#39;Click to Call&#39;, &#39;0968-352-496&#39;); ">
        <span class="dashicons dashicons-phone"></span> Gọi điện
        </a>
    </div>
    <div>
        <a href="https://maps.google.com/?q=507+%C4%91%C6%B0%E1%BB%9Dng+H%C3%B9ng+V%C6%B0%C6%A1ng%2C+ph%C6%B0%E1%BB%9Dng+%C4%90%E1%BB%93ng+T%C3%A2m%2C+V%C4%A9nh+Y%C3%AAn%2C+V%C4%A9nh+Ph%C3%BAc%2C+Vi%E1%BB%87t+Nam%2C+280000" id="map_now" target="_Blank">
        <span class="dashicons dashicons-location"></span> Chỉ đường
        </a>
    </div>
</div>
<style>
    @media screen and (max-width: 680px) {
    div#rpb { display: flex !important; background: #1a1919; }
    div#rpb_spacer { display: block !important; }
    }
    div#rpb { background: #1a1919; }
    div#rpb div a#call_now { background: #dd3333; color: #fff; }
    div#rpb div a#map_now { background: #247a44; color: #fff; }
</style>
<!-- /Mobile Call Now and Map Buttons -->