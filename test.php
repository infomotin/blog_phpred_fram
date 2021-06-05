<form method="get" action="<?php print_link("articles");?>">
    <div class="input-group p-1 border rounded">
        <input class="form-control" type='text' name="search" placeholder="Search" value="<?php get_value('search');?>" autocomplete="off">
        <div class="input-group-append p-2">
            <i class="icon-map"></i>
        </div>

    </div>
</form>

<div class="bg-dark d-none d-md-flex align-items-end position-absolute" style="top:0px; bottom:0px">
<a class="text-white text-captalize" href="<?php print_link("articles/view/$rec_id")?>"></a>
</div>