<?php
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$field_name = $this->route->field_name;
$field_value = $this->route->field_value;
$view_data = $this->view_data;
$records = $view_data->records;
$record_count = $view_data->record_count;
$total_records = $view_data->total_records;
if (!empty($records)) {
?>
<!--record-->
<?php
$counter = 0;
foreach($records as $data){
$rec_id = (!empty($data['id']) ? urlencode($data['id']) : null);
$counter++;
?>
<div class="col-lg-3 col-mb-4 col-6">
    <div class="card-img md-3">
        <div class="mb-2"> <?php Html :: page_img($data['img'],350,250,1,"articles/view/$rec_id","fluid"); ?></div>
        <div class="mb-2 card-body text-captalize text-truncate bold small">   
            <a class="text-dark" herf="<?php print_link("articles/view/$rec_id"); ?>"><?php echo $data['headline']; ?></a>
            <div class="small mb-2"><?php echo  human_date($data['crt_date']); ?></div>
            <button class="btn alert-primary rounded btn-sm" disabled><?php echo $data['tag']; ?></button>
        </div>
    </div>
</div>
<?php 
}
?>
<?php
} else {
?>
<td class="no-record-found col-12" colspan="100">
    <h4 class="text-muted text-center ">
        No Record Found
    </h4>
</td>
<?php
}
?>
