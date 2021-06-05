<?php
$comp_model = new SharedController;
$page_element_id = "list-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data From Controller
$view_data = $this->view_data;
$records = $view_data->records;
$record_count = $view_data->record_count;
$total_records = $view_data->total_records;
$field_name = $this->route->field_name;
$field_value = $this->route->field_value;
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_footer = $this->show_footer;
$show_pagination = $this->show_pagination;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="list"  data-display-type="grid" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container-fluid">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Blogbanner</h4>
                </div>
                <div class="col-sm-4 ">
                    <form  class="search" action="<?php print_link('blogbanner/'); ?>" method="get">
                        <div class="input-group">
                            <input value="<?php echo get_value('search'); ?>" class="form-control" type="text" name="search"  placeholder="Search" />
                                <div class="input-group-append">
                                    <button class="btn btn-primary"><i class="icon-magnifier"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12 comp-grid">
                        <div class="">
                            <!-- Page bread crumbs components-->
                            <?php
                            if(!empty($field_name) || !empty($_GET['search'])){
                            ?>
                            <hr class="sm d-block d-sm-none" />
                            <nav class="page-header-breadcrumbs mt-2" aria-label="breadcrumb">
                                <ul class="breadcrumb m-0 p-1">
                                    <?php
                                    if(!empty($field_name)){
                                    ?>
                                    <li class="breadcrumb-item">
                                        <a class="text-decoration-none" href="<?php print_link('blogbanner'); ?>">
                                            <i class="icon-arrow-left"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <?php echo (get_value("tag") ? get_value("tag")  :  make_readable($field_name)); ?>
                                    </li>
                                    <li  class="breadcrumb-item active text-capitalize font-weight-bold">
                                        <?php echo (get_value("label") ? get_value("label")  :  make_readable(urldecode($field_value))); ?>
                                    </li>
                                    <?php 
                                    }   
                                    ?>
                                    <?php
                                    if(get_value("search")){
                                    ?>
                                    <li class="breadcrumb-item">
                                        <a class="text-decoration-none" href="<?php print_link('blogbanner'); ?>">
                                            <i class="icon-arrow-left"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item text-capitalize">
                                        Search
                                    </li>
                                    <li  class="breadcrumb-item active text-capitalize font-weight-bold"><?php echo get_value("search"); ?></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </nav>
                            <!--End of Page bread crumbs components-->
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
        <div  class="">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-md-12 comp-grid">
                        <?php $this :: display_page_errors(); ?>
                        <div  class=" animated fadeIn page-content">
                            <div id="blogbanner-banner-records">
                                <style>
                                    .dark-skin{
                                    background: linear-gradient(to bottom,rgba(0,0,0,0), rgba(0,0,0,0.9));
                                    }
                                </style>
                                <?php
                                if(!empty($records)){
                                ?>
                                <div id="banner" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#banner" data-slide-to="0" class="active"></li>
                                        <li data-target="#banner" data-slide-to="1"></li>
                                        <li data-target="#banner" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner page-data" id="page-data-<?php echo $page_element_id; ?>">
                                        <!--record-->
                                        <?php
                                        $counter = 0;
                                        foreach($records as $data){
                                        $rec_id = (!empty($data['id']) ? urlencode($data['id']) : null);
                                        $counter++;
                                        ?>
                                        <div class="col-12 p-0 carousel-item <?php if($counter==1){ ?> active <?php } ?>">
                                            <div class="col-12 p-0">
                                                <!--page_img($imgsrc, $resizewidth = null, $resizeheight = null, $max = 1, $link = null, $class = null)-->
                                                <div class="mb-2">  <?php Html :: page_img($data['img'],1800,400,1,"articles/view/$rec_id","img-holder"); ?>
                                                </div>
                                                <div class="col-12 p-5 dark-skin d-none d-md-flex align-items-end position-absolute" style="top:0px; bottom:0px">
                                                    <a class="text-white text-captalize" href="<?php print_link("articles/view/$rec_id")?>">
                                                        <h1 class="text-captalize bold"><?php echo $data['headline']; ?></h1>
                                                        <hr style="border-color:white">
                                                            <span class="bold text-captalize">Published At: <?php echo human_date($data['crt_date']); ?></span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php 
                                            }
                                            ?>
                                            <!--endrecord-->
                                        </div>
                                        <a class="carousel-control-prev" href="#banner" data-slide="prev">
                                            <i class="icon-arrow-left bold p-2 border rounded-circle"></i>
                                        </a>
                                        <a class="carousel-control-next" href="#banner" data-slide="next">
                                            <i class="icon-arrow-right bold p-2 border rounded-circle"></i>
                                        </a>
                                        <div class="carousel-inner search-data" id="search-data-<?php echo $page_element_id; ?>"></div>
                                        <div>
                                        </div>
                                    </div>
                                    <?php
                                    if($show_footer == true){
                                    ?>
                                    <div class=" border-top mt-2">
                                        <div class="row justify-content-center">    
                                            <div class="col-md-auto">   
                                            </div>
                                            <div class="col">   
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    }
                                    }
                                    else{
                                    ?>
                                    <div class="text-muted  animated bounce p-3">
                                        <h4><i class="icon-ban"></i> No record found</h4>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
