<!-- Ace Responsive Menu -->
<nav>
    <!-- Menu Toggle btn-->
    <div class="menu-toggle">
        <h3>Menu</h3>
        <button type="button" id="menu-btn">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <!-- Responsive Menu Structure-->
    <!--Note: declare the Menu style in the data-menu-style="horizontal" (options: horizontal, vertical, accordion) -->
    <ul id="respMenu" class="ace-responsive-menu" data-menu-style="horizontal">
          <li>
            <a href="javascript:;">
                <i class="fa fa-home" aria-hidden="true"></i>
                <span class="title">Trang Chủ</span>
            </a>
        </li>
        <li>
            <a href="javascript:;">
                <i class="fa fa-cube" aria-hidden="true"></i>
                <span class="title">Giới Thiệu </span>

            </a>
        </li>

        <li>
            <a href="javascript:;">
                <i class="fa fa-crop" aria-hidden="true"></i>
                <span class="title">Danh Mục Sản Phẩm</span>
            </a>
            <!-- Level Two-->
            <ul>
                <li>
                    <a href="javascript:;">
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                        SoFa Nỉ						
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-database" aria-hidden="true"></i>
                        Bàn Sofa
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa fa-amazon" aria-hidden="true"></i>
                        Sản Phẩm Khác							
                    </a>
                    <!-- Level Three-->
                    <ul>
                        <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i>Đệm Nhập Khẩu</a></li>
                        <li>
                            <a href="javascript:;">
                                <i class="fa fa-diamond" aria-hidden="true"></i>Đệm Tình Yêu</a>
                            <!-- Level Four-->
                            <ul>
                                <li><a href="#"><i class="fa fa-trash" aria-hidden="true"></i>Gường Tình Yêu</a></li>
                                <li><a href="#"><i class="fa fa-dashcube" aria-hidden="true"></i>Sofa Tình Aí</a></li>
                                <li><a href="#"><i class="fa fa-dropbox" aria-hidden="true"></i>Giường Con sò</a></li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i>Sofa xe hơi</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#">
                        <i class="fa fa-database" aria-hidden="true"></i>
                        Cho tặng miễn phi
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a class="" href="javascript:;">
                <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                <span class="title">Tin Tức Trong Ngày</span>

            </a>
            <ul>
                <li>
                    <a href="#">Tin Vịt
                    </a>
                </li>
                <li>
                    <a href="javascript:;">Sub Item Two							
                    </a>
                    <ul>
                        <li><a href="#">Sao</a></li>
                        <li><a href="#">Hài hước</a></li>
                        <li><a href="#">Lá cải</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">Tin Hay							
                    </a>
                    <ul>
                        <li><a href="#">Trong nước</a></li>
                        <!-- lever four --> 
                        <ul>
                            <li><a href="#"><i class="fa fa-trash" aria-hidden="true"></i>Kinh tế</a></li>
                            <li><a href="#"><i class="fa fa-dashcube" aria-hidden="true"></i>Chính Trị</a></li>
                            <li><a href="#"><i class="fa fa-dropbox" aria-hidden="true"></i>Giáo dục</a></li>
                            <li><a href="#"><i class="fa fa-dropbox" aria-hidden="true"></i>xã hội</a></li>
                        </ul>
                        <li><a href="#">Ngoài nước</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;">
                <i class="fa fa-heart" aria-hidden="true"></i>
                <span class="title">Thanh toán</span>
            </a>
        </li>
        <li class="last ">
            <a href="javascript:;">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span class="title">Liên hệ</span>
            </a>
        </li>
    </ul>
</nav>
    <!--Plugin Initialization-->
 <script type="text/javascript">
     $(document).ready(function () {
         $("#respMenu").aceResponsiveMenu({
             resizeWidth: '768', // Set the same in Media query       
             animationSpeed: 'fast', //slow, medium, fast
             accoridonExpAll: false //Expands all the accordion menu on click
         });
     });
</script>