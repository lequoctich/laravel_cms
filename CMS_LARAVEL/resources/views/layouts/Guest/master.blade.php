<!DOCTYPE html>
<!-- saved from url=(0023)http://sofaphucdat.com/ -->
<html lang="vi" class="js wf-roboto-n4-active wf-roboto-n5-active wf-dancingscript-n4-active wf-active">
    <!--<![endif]-->
    @include('layouts.Guest.head')


    <body class="home page-template page-template-page-blank page-template-page-blank-php page page-id-16 woocommerce-js lightbox lazy-icons nav-dropdown-has-arrow">
        <a class="skip-link screen-reader-text" href="http://sofaphucdat.com/#main">Skip to content</a>
        <div id="wrapper">
            @include('layouts.Guest.header')
            <main id="main" class="">
                @section('content')

                @show
            </main>
            <!-- #main -->
            @include('layouts.Guest.footer')
        <!-- #wrapper -->
        @include('layouts.Guest.mobile')
        <script type="text/javascript">
            var c = document.body.className;
            c = c.replace(/woocommerce-no-js/, 'woocommerce-js');
            document.body.className = c;
        </script>
        <link rel="stylesheet" id="rpb_css-css" href="{{$_ENV['APP_URL']}}css/css/rpb.css" type="text/css" media="all">
        <link rel="stylesheet" id="dashicons-css" href="{{$_ENV['APP_URL']}}css/css/dashicons.min.css" type="text/css" media="all">
        <script type="text/javascript" src="{{$_ENV['APP_URL']}}css/down-load/jquery.blockUI.min.js.download"></script>
        <script type="text/javascript">
            /* <![CDATA[ */
            var wc_add_to_cart_params = {"ajax_url":"\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/?wc-ajax=%%endpoint%%","i18n_view_cart":"Xem gi\u1ecf h\u00e0ng","cart_url":"http:\/\/sofaphucdat.com\/gio-hang\/","is_cart":"","cart_redirect_after_add":"no"};
            /* ]]> */
        </script>
        <script type="text/javascript" src="{{$_ENV['APP_URL']}}css/down-load/add-to-cart.min.js.download"></script>
        <script type="text/javascript" src="{{$_ENV['APP_URL']}}css/down-load/js.cookie.min.js.download"></script>
        <script type="text/javascript">
            /* <![CDATA[ */
            var woocommerce_params = {"ajax_url":"\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/?wc-ajax=%%endpoint%%"};
            /* ]]> */
        </script>
        <script type="text/javascript" src="{{$_ENV['APP_URL']}}css/down-load/woocommerce.min.js.download"></script>
        <script type="text/javascript">
            /* <![CDATA[ */
            var wc_cart_fragments_params = {"ajax_url":"\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/?wc-ajax=%%endpoint%%","cart_hash_key":"wc_cart_hash_992bb90d59f36996c90e29f67264c6bc","fragment_name":"wc_fragments_992bb90d59f36996c90e29f67264c6bc"};
            /* ]]> */
        </script>
        <script type="text/javascript" src="{{$_ENV['APP_URL']}}css/down-load/cart-fragments.min.js.download"></script>
        <script type="text/javascript" src="{{$_ENV['APP_URL']}}css/down-load/hoverIntent.min.js.download"></script>
        <script type="text/javascript">
            /* <![CDATA[ */
            var flatsomeVars = {"ajaxurl":"http:\/\/sofaphucdat.com\/wp-admin\/admin-ajax.php","rtl":"","sticky_height":"45","user":{"can_edit_pages":false}};
            /* ]]> */
        </script>
        <script type="text/javascript" src="{{$_ENV['APP_URL']}}css/down-load/flatsome.js.download"></script>
        <script type="text/javascript" src="{{$_ENV['APP_URL']}}css/down-load/flatsome-lazy-load.js.download"></script>
        <script type="text/javascript" src="{{$_ENV['APP_URL']}}css/down-load/infinite-scroll.pkgd.min.js.download"></script>
        <script type="text/javascript">
            /* <![CDATA[ */
            var flatsome_infinite_scroll = {"scroll_threshold":"400","fade_in_duration":"300","type":"button","list_style":"grid"};
            /* ]]> */
        </script>
        <script type="text/javascript" src="{{$_ENV['APP_URL']}}css/down-load/flatsome-infinite-scroll.js.download"></script>
        <script type="text/javascript" src="{{$_ENV['APP_URL']}}css/down-load/woocommerce.js.download"></script>
        <script type="text/javascript" src="{{$_ENV['APP_URL']}}css/down-load/wp-embed.min.js.download"></script>
        <script type="text/javascript">
            /* <![CDATA[ */
            var _zxcvbnSettings = {"src":"http:\/\/sofaphucdat.com\/wp-includes\/js\/zxcvbn.min.js"};
            /* ]]> */
        </script>
        <script type="text/javascript" src="{{$_ENV['APP_URL']}}css/down-load/zxcvbn-async.min.js.download"></script>
        <script type="text/javascript">
            /* <![CDATA[ */
            var pwsL10n = {"unknown":"M\u1eadt kh\u1ea9u m\u1ea1nh kh\u00f4ng x\u00e1c \u0111\u1ecbnh","short":"R\u1ea5t y\u1ebfu","bad":"Y\u1ebfu","good":"Trung b\u00ecnh","strong":"M\u1ea1nh","mismatch":"M\u1eadt kh\u1ea9u kh\u00f4ng kh\u1edbp"};
            /* ]]> */
        </script>
        <script type="text/javascript" src="{{$_ENV['APP_URL']}}css/down-load/password-strength-meter.min.js.download"></script>
        <script type="text/javascript">
            /* <![CDATA[ */
            var wc_password_strength_meter_params = {"min_password_strength":"3","i18n_password_error":"Vui l\u00f2ng nh\u1eadp m\u1eadt kh\u1ea9u kh\u00f3 h\u01a1n.","i18n_password_hint":"G\u1ee3i \u00fd: M\u1eadt kh\u1ea9u ph\u1ea3i c\u00f3 \u00edt nh\u1ea5t 12 k\u00fd t\u1ef1. \u0110\u1ec3 n\u00e2ng cao \u0111\u1ed9 b\u1ea3o m\u1eadt, s\u1eed d\u1ee5ng ch\u1eef in hoa, in th\u01b0\u1eddng, ch\u1eef s\u1ed1 v\u00e0 c\u00e1c k\u00fd t\u1ef1 \u0111\u1eb7c bi\u1ec7t nh\u01b0 ! \" ? $ % ^ & )."};
            /* ]]> */
        </script>
        <script type="text/javascript" src="{{$_ENV['APP_URL']}}css/down-load/password-strength-meter.min.js(1).download"></script>
        <div id="cPyYUAk-1552300183562" class="" style="display: block !important;">
            {{--  <iframe id="Fbyhaxn-1552300183564" src="css/saved_resource.html" frameborder="0" scrolling="no" title="chat widget" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: auto !important; right: auto !important; bottom: auto !important; left: auto !important; position: static !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 350px !important; height: 520px !important; z-index: 999999 !important; cursor: auto !important; float: none !important; border-radius: unset !important; display: none !important;"></iframe><iframe id="xg9iCs6-1552300183567" src="css/saved_resource(1).html" frameborder="0" scrolling="no" title="chat widget" class="" style="outline: none !important; visibility: visible !important; resize: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; position: fixed !important; border: 0px !important; padding: 0px !important; transition-property: none !important; z-index: 1000001 !important; cursor: auto !important; float: none !important; box-shadow: rgba(0, 0, 0, 0.16) 0px 2px 10px 0px !important; height: 60px !important; min-height: 60px !important; max-height: 60px !important; width: 60px !important; min-width: 60px !important; max-width: 60px !important; border-radius: 50% !important; transform: rotate(0deg) translateZ(0px) !important; transform-origin: 0px center !important; margin: 0px !important; top: auto !important; bottom: 20px !important; right: 20px !important; left: auto !important; display: block !important;"></iframe><iframe id="tVxueCj-1552300183568" src="css/saved_resource(2).html" frameborder="0" scrolling="no" title="chat widget" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; position: fixed !important; border: 0px !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; display: none !important; z-index: 1000003 !important; cursor: auto !important; float: none !important; border-radius: unset !important; top: auto !important; bottom: 60px !important; right: 15px !important; left: auto !important; width: 21px !important; max-width: 21px !important; min-width: 21px !important; height: 21px !important; max-height: 21px !important; min-height: 21px !important;"></iframe><iframe id="OM5fGvM-1552300183568" src="css/saved_resource(3).html" frameborder="0" scrolling="no" title="chat widget" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; position: fixed !important; border: 0px !important; padding: 0px !important; transition-property: none !important; cursor: auto !important; float: none !important; border-radius: unset !important; transform: rotate(0deg) translateZ(0px) !important; transform-origin: 0px center !important; bottom: 80px !important; top: auto !important; right: 0px !important; left: auto !important; width: 100px !important; max-width: 100px !important; min-width: 100px !important; height: 71px !important; max-height: 71px !important; min-height: 71px !important; z-index: 1000000 !important; margin: 0px !important; display: block !important;"></iframe>  --}}
            <div class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: 0px !important; right: auto !important; bottom: auto !important; left: 0px !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 100% !important; height: 100% !important; display: none !important; z-index: 1000001 !important; cursor: move !important; float: left !important; border-radius: unset !important;"></div>
            <div id="MS9Ooeo-1552300183562" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: 0px !important; right: auto !important; bottom: auto !important; left: 0px !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 6px !important; height: 100% !important; display: block !important; z-index: 999998 !important; cursor: w-resize !important; float: none !important; border-radius: unset !important;"></div>
            <div id="Yrh8GGM-1552300183562" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: 0px !important; right: 0px !important; bottom: auto !important; left: auto !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 100% !important; height: 6px !important; display: block !important; z-index: 999998 !important; cursor: n-resize !important; float: none !important; border-radius: unset !important;"></div>
            <div id="CBQfdWG-1552300183563" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: 0px !important; right: auto !important; bottom: auto !important; left: 0px !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 12px !important; height: 12px !important; display: block !important; z-index: 999998 !important; cursor: nw-resize !important; float: none !important; border-radius: unset !important;"></div>
            {{--  <iframe id="LVtuwBf-1552300183703" src="css/saved_resource(4).html" frameborder="0" scrolling="no" title="chat widget" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: auto !important; right: 20px !important; bottom: 90px !important; left: auto !important; position: fixed !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 378px !important; height: 776px !important; display: none !important; z-index: 999999 !important; cursor: auto !important; float: none !important; border-radius: unset !important;"></iframe>  --}}
        </div>
        {{--  <iframe src="css/saved_resource(5).html" title="chat widget logging" style="display: none !important;"></iframe>  --}}
    </body>
</html>