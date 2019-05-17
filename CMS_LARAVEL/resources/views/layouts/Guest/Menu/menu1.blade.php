

<!-- Ace Responsive Menu -->
<nav>
    <!-- Menu Toggle btn-->
    <div class="menu-toggle">
        
        <button type="button" id="menu-btn">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <!-- Responsive Menu Structure-->
    <!--Note: declare the Menu style in the data-menu-style="horizontal" (options: horizontal, vertical, accordion) -->
    <ul id="respMenu" class="ace-responsive-menu" data-menu-style="horizontal">
        
        @php 
        //dd($menuData);
            function menuView($menuData){
               
                foreach($menuData as $key=>$menu){   
                    if(isset($menu['slug']['slug_vi'])){
                        $slug = $menu['slug']['slug_vi'];
                    }
                    else{
                        $slug = $menu['slug'];
                    }

                    $slugMenu = '';
                    if(isset($menu['slugMenu']['slug_vi'])){
                        $slugMenu = $menu['slugMenu']['slug_vi'];
                    }

                    echo '<li>';
                        echo '<a href="'.$slugMenu.'/'.$slug.'"';
                        echo '<span class="title">';                         
                            if(isset($menu['name'])){
                              
                                echo $menu['name'];
                            }
                                              
                        echo '</span>';
                        echo '</a>';
            
                    if(isset($menu['child']) && isset($menu['local'])){
                        echo '<ul>';
                       
                        foreach($menu['child'] as $key => $items){                   
                            menuView($items);
                        }
                        
                        echo '</ul>';
                    }

                    else if(isset($menu['child']) && !isset($menu['sort'])){
                        echo '<ul>';
                 
                            menuView($menu['child']);
                        
                        echo '</ul>';
                    }

                 
                    echo '</li>';
                }
            }
            menuView($menuData);
        @endphp
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
