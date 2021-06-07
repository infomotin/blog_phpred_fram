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
<div class="col-sm-12">
    <div class="bg-light p-2 mb-3 d-flex">
        <div class="mb-2">  <a href="<?php print_link("blogbanner/view/$data[id]") ?>"><?php echo $data['id']; ?></a></div>
        <div class="mb-2">   <?php echo $data['headline']; ?></div>
        <div class="mb-2">  <?php Html :: page_img($data['img'],0,0,1); ?></div>
        <div class="mb-2">   <?php echo $data['article']; ?></div>
        <div class="mb-2">   <?php echo $data['crt_date']; ?></div>
        <div class="mb-2">   <?php echo $data['tag']; ?></div>
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
