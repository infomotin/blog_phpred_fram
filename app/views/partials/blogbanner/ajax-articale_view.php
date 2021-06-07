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
<tr>
    <th class="td-sno"><?php echo $counter; ?></th>
    <td class="td-id"><a href="<?php print_link("blogbanner/view/$data[id]") ?>"><?php echo $data['id']; ?></a></td>
    <td class="td-headline"> <?php echo $data['headline']; ?></td>
    <td class="td-img"> <?php echo $data['img']; ?></td>
    <td class="td-article"> <?php echo $data['article']; ?></td>
    <td class="td-publisher"> <?php echo $data['publisher']; ?></td>
    <td class="td-crt_date"> <?php echo $data['crt_date']; ?></td>
    <td class="td-upd_date"> <?php echo $data['upd_date']; ?></td>
    <td class="td-tag"> <?php echo $data['tag']; ?></td>
    <th class="td-btn">
        <a class="btn btn-sm btn-success has-tooltip" title="View Record" href="<?php print_link("blogbanner/view/$rec_id"); ?>">
            <i class="icon-eye"></i> View
        </a>
    </th>
</tr>
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
