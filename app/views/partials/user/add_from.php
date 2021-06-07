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
                    <h4 class="record-title">Form Wized</h4>
                </div>
                <div class="col-md-4 comp-grid">
                    <div class="text-left">
                        <h4>Form Wized</h4>
                        <p class="text-muted"></p>
                    </div>
                    <div class="smartwizard" data-theme="dots" data-form-action="">
                        <ul>
                            <li>
                                <a href="#FormWizard-1-Page1">
                                    Step 1
                                    <br /><small></small>
                                </a>
                            </li>
                            <li>
                                <a href="#FormWizard-1-Page2">
                                    Step 2
                                    <br /><small></small>
                                </a>
                            </li>
                            <li>
                                <a href="#FormWizard-1-Page3">
                                    Step 3
                                    <br /><small></small>
                                </a>
                            </li>
                            <li>
                                <a href="#FormWizard-1-Page4">
                                    Step 4
                                    <br /><small></small>
                                </a>
                            </li>
                            <li>
                                <a href="#FormWizard-1-Page5">
                                    Step 5
                                    <br /><small></small>
                                </a>
                            </li>
                        </ul>
                        <div>
                            <div class="card formtab" id="FormWizard-1-Page1" data-next-page="FormWizard-1-Page2" data-submit-action="MOVE-NEXT">
                                <div class="">
                                    <div class="text-center">
                                        <div class="p-3">
                                            <h4>Welcome To Form Wizard</h4>
                                            <hr />
                                            <p class="text-muted">You can drag and drop <b>Add Sub Page</b> onto the form wizard steps</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center p-3">
                                    <button class="btn btn-success sw-btn-next">Getting Started</button>
                                </div>
                            </div>
                            <div class="card formtab" id="FormWizard-1-Page2" data-next-page="FormWizard-1-Page3" data-submit-action="SUBMIT-STEP-FORM">
                                <div class=" p-3">
                                </div>
                            </div>
                            <div class="card formtab" id="FormWizard-1-Page3" data-next-page="FormWizard-1-Page4" data-submit-action="SUBMIT-STEP-FORM">
                                <div class=" p-3">
                                </div>
                            </div>
                            <div class="card formtab" id="FormWizard-1-Page4" data-next-page="FormWizard-1-Page5" data-submit-action="SUBMIT-ALL-FORMS">
                                <div class=" p-3">
                                </div>
                            </div>
                            <div class="card formtab" id="FormWizard-1-Page5" data-next-page="FormWizard-1-Page6" data-submit-action="">
                                <div class="">
                                    <div class="text-center">
                                        <h4>Form Wizard Completed</h4>
                                        <hr />
                                        <p class="text-muted">Thank you for your support</p>
                                    </div>
                                </div>
                                <div class=" p-3">
                                </div>
                            </div>
                        </div>
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
                        <div id="user-add_from-records">
                            <?php
                            if(!empty($records)){
                            ?>
                            <div id="page-report-body">
                                <div class="row sm-gutters page-data" id="page-data-<?php echo $page_element_id; ?>">
                                    <!--record-->
                                    <?php
                                    $counter = 0;
                                    foreach($records as $data){
                                    $rec_id = (!empty($data['id']) ? urlencode($data['id']) : null);
                                    $counter++;
                                    ?>
                                    <div class="col-sm-4">
                                        <div class="bg-light p-2 mb-3 animated bounceIn">
                                            <div class="mb-2">  <a href="<?php print_link("user/view/$data[id]") ?>">
                                                <span class="font-weight-light text-muted ">
                                                    Id:  
                                                </span>
                                            <?php echo $data['id']; ?></a></div>
                                            <div class="mb-2">  
                                                <span  data-value="<?php echo $data['username']; ?>" 
                                                    data-pk="<?php echo $data['id'] ?>" 
                                                    data-url="<?php print_link("user/editfield/" . urlencode($data['id'])); ?>" 
                                                    data-name="username" 
                                                    data-title="Enter Username" 
                                                    data-placement="left" 
                                                    data-toggle="click" 
                                                    data-type="text" 
                                                    data-mode="popover" 
                                                    data-showbuttons="left" 
                                                    class="is-editable" >
                                                    <span class="font-weight-light text-muted ">
                                                        Username:  
                                                    </span>
                                                    <?php echo $data['username']; ?> 
                                                </span>
                                            </div>
                                            <div class="mb-2">  
                                                <span class="font-weight-light text-muted ">
                                                    Password:  
                                                </span>
                                            <?php echo $data['password']; ?></div>
                                            <div class="mb-2">  <a href="<?php print_link("mailto:$data[email]") ?>">
                                                <span class="font-weight-light text-muted ">
                                                    Email:  
                                                </span>
                                            <?php echo $data['email']; ?></a></div>
                                            <div class="mb-2">  
                                                <span  data-value="<?php echo $data['firstname']; ?>" 
                                                    data-pk="<?php echo $data['id'] ?>" 
                                                    data-url="<?php print_link("user/editfield/" . urlencode($data['id'])); ?>" 
                                                    data-name="firstname" 
                                                    data-title="Enter Firstname" 
                                                    data-placement="left" 
                                                    data-toggle="click" 
                                                    data-type="text" 
                                                    data-mode="popover" 
                                                    data-showbuttons="left" 
                                                    class="is-editable" >
                                                    <span class="font-weight-light text-muted ">
                                                        Firstname:  
                                                    </span>
                                                    <?php echo $data['firstname']; ?> 
                                                </span>
                                            </div>
                                            <div class="mb-2">  
                                                <span  data-value="<?php echo $data['lastname']; ?>" 
                                                    data-pk="<?php echo $data['id'] ?>" 
                                                    data-url="<?php print_link("user/editfield/" . urlencode($data['id'])); ?>" 
                                                    data-name="lastname" 
                                                    data-title="Enter Lastname" 
                                                    data-placement="left" 
                                                    data-toggle="click" 
                                                    data-type="text" 
                                                    data-mode="popover" 
                                                    data-showbuttons="left" 
                                                    class="is-editable" >
                                                    <span class="font-weight-light text-muted ">
                                                        Lastname:  
                                                    </span>
                                                    <?php echo $data['lastname']; ?> 
                                                </span>
                                            </div>
                                            <div class="mb-2">  
                                                <span  data-value="<?php echo $data['photo']; ?>" 
                                                    data-pk="<?php echo $data['id'] ?>" 
                                                    data-url="<?php print_link("user/editfield/" . urlencode($data['id'])); ?>" 
                                                    data-name="photo" 
                                                    data-title="Browse..." 
                                                    data-placement="left" 
                                                    data-toggle="click" 
                                                    data-type="text" 
                                                    data-mode="popover" 
                                                    data-showbuttons="left" 
                                                    class="is-editable" >
                                                    <span class="font-weight-light text-muted ">
                                                        Photo:  
                                                    </span>
                                                    <?php echo $data['photo']; ?> 
                                                </span>
                                            </div>
                                            <div class="td-btn">
                                                <a class="btn btn-sm btn-success has-tooltip" title="View Record" href="<?php print_link("user/view/$rec_id"); ?>">
                                                    <i class="icon-eye"></i> View
                                                </a>
                                                <a class="btn btn-sm btn-info has-tooltip" title="Edit This Record" href="<?php print_link("user/edit/$rec_id"); ?>">
                                                    <i class="icon-pencil"></i> Edit
                                                </a>
                                                <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" title="Delete this record" href="<?php print_link("user/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
                                                    <i class="icon-close"></i>
                                                    Delete
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php 
                                    }
                                    ?>
                                    <!--endrecord-->
                                </div>
                                <div class="row sm-gutters search-data" id="search-data-<?php echo $page_element_id; ?>"></div>
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
                                        <?php
                                        if($show_pagination == true){
                                        $pager = new Pagination($total_records, $record_count);
                                        $pager->route = $this->route;
                                        $pager->show_page_count = true;
                                        $pager->show_record_count = true;
                                        $pager->show_page_limit =true;
                                        $pager->limit_count = $this->limit_count;
                                        $pager->show_page_number_list = true;
                                        $pager->pager_link_range=5;
                                        $pager->render();
                                        }
                                        ?>
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
