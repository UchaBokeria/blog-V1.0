<?php 
    session_start();
    if(!isset($_SESSION["token"]))
        header("Location:../../../assets/wildcard.php"); 
?>
<div class="blog_admin-filter">
    <i class="material-icons" id="blog_create_new">add_circle_outline</i>

    <div class="blog_admin-filter-search">
        <input type="text" value="" placeholder="Suchen" id="blog_search_text">

        <div class="blog_post-type-select">
            <div data-type="1" id="blog_activated">Alle</div>
            <div data-type="2">öffentlich</div>
            <div data-type="3">Privat</div>
            <div data-type="4">Projekt</div>
        </div>

        <i class="fa fa-angle-down" id="blog_show_post_types"></i>
    </div>

    <input type="date" name="start_date" value="<?php echo date('Y-m-d'); ?>" id="blog_start_date">
    <input type="date" name="end_date" value="<?php echo date('Y-m-d'); ?>" id="blog_end_date">

    <button type="button" id="blog_filter">Filter</button>
</div>

<div id="admin-blog"></div>

<div id="blog_edit-window"></div> 

<div id="blog_dialog"></div>

