<?php 
$page_id = null;
$comp_model = new SharedController;
$current_page = $this->set_current_page_link();
?>
<div>
    <div  class="">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                    <h4 class="px-3"><script>
                        $(".navbar-nav.mr-auto").html('<form method="get" action="<?php print_link("articles");?>"><div class="input-group p-1 border rounded search-bar"><input class="form-control no-shadow border-0" type="text" name="search" placeholder="Search" value="<?php get_value('search');?>" autocomplete="off"><div class="input-group-append p-2"><i class="icon-map"></i></div></div></form>');
                        </script>
                        <style>
                        </style>
                    </h4>
                    <div class="p-3 m-2 ">
                        <?php  
                        $this->render_page("tags/str_ket?limit_count=20" , array( 'show_header' => false,'show_footer' => false,'show_pagination' => false )); 
                        ?>
                    </div>
                </div>
                <div class="col-12 p-0 comp-grid">
                    <div class=" ">
                        <?php  
                        $this->render_page("blogbanner/banner?limit_count=20" , array( 'show_header' => false,'show_footer' => false,'show_pagination' => false )); 
                        ?>
                    </div>
                </div>
                <div class="col-12 p-0 comp-grid">
                </div>
                <div class="col-md-4 comp-grid">
                    <div class=" ">
                        <?php  
                        $this->render_page("blogbanner/articale_view?limit_count=20" , array( 'show_header' => false,'show_footer' => false,'show_pagination' => false )); 
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
