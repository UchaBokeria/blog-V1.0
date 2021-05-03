<div class="admin-filter">
    <i class="material-icons" id="create_new">add_circle_outline</i>

    <div class="admin-filter-search">
        <input type="text" value="" placeholder="Suchen" id="search_text">

        <div class="post-type-select">
            <div data-type="1">Alle</div>
            <div data-type="2">öffentlich</div>
            <div data-type="3">Privat</div>
            <div data-type="4">Projekt</div>
        </div>

        <i class="fa fa-angle-down" id="show_post_types"></i>
    </div>


    <input type="date" name="start_date" value="" id="start_date">
    <input type="date" name="end_date" value="" id="end_date">

    <button type="button" id="filter">Filter</button>
</div>

<div class="exhibition-posts">
    <div class="post-text">
        <b>Ausstellung</b>
        <p>öffentlich</p>
        <p>2021-04-21</p>
    </div>

    <div class="post-edit-delete">
        <i class="material-icons" id="edit" data-id="1">edit</i>
        <i class="material-icons" id="delete"  data-id="1">delete</i>
    </div>
    <i class="fa fa-angle-down" id="show_more" data-id="1"></i>

    <!-- ajax puts post html inside post_body -->
    <div id="post_body">
    </div>
</div>

<div class="edit-window">
    <i class="material-icons" id="close-edit">close</i>
    <input type="text" name="title" value="Titel">
    
    <div class="edit-post-type-select">
        <i class="fa fa-angle-down" id="edit_post_types"></i>
        <div data-type="1">Alle</div>
        <div data-type="2">öffentlich</div>
        <div data-type="3">Privat</div>
        <div data-type="4">Projekt</div>
    </div>

    <!-- CKEditor  -->
    <div id="post_body_edit"></div>

    <button class="save-button" type="button">speicher</button>
    <br>
    <button class="cancel-button" type="button">abbrechen</button>
</div>
Home