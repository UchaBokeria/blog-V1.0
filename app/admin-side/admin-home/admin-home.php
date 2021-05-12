<?php 
    session_start();
    if(!isset($_SESSION["token"]))
        header("Location:../../../assets/wildcard.php"); 
?>
<div class="admin-filter">
    <i class="material-icons" id="create_new">add_circle_outline</i>

    <div class="admin-filter-search">
        <input type="text" value="" placeholder="Suchen" id="search_text">

        <div class="post-type-select">
            <div data-type="1" id="activated">Alle</div>
            <div data-type="2">öffentlich</div>
            <div data-type="3">Privat</div>
            <div data-type="4">Projekt</div>
        </div>

        <i class="fa fa-angle-down" id="show_post_types"></i>
    </div>

    <input type="date" name="start_date" value="<?php echo date('Y-m-d'); ?>" id="start_date">
    <input type="date" name="end_date" value="<?php echo date('Y-m-d'); ?>" id="end_date">

    <button type="button" id="filter">Filter</button>
</div>

<div id="admin-home"></div>

<div id="edit-window"></div> 

<div id="dialog"></div>

