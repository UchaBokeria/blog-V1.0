<div id="head">
    <p class="active-page" data-page="admin-home">Ausstellung</p>
    <p class="aactive-page" data-page="admin-blog">My Blog</p>
    <p class="aactive-page" data-page="admin-profile">Profil</p>
    <form action="app/admin-side/index.php" method="POST"><button name="logout">log out</button></form>
</div>

<div id="navigation" style="display:none;">
    <b class="active-page">Über uns </b>
    <i class="fa fa-close toggle-navigation"></i>
    <div>
        <p>Ausstellung</p>
        <p>Kontakt</p>
        <p>Profil</p>
    </div>
</div>

<!-- <div class="dark-bg"></div> -->

<div id="admin-content" style="padding:3vh 5%;">
    <!-- AJAX FILL -->
</div>
<?php 
    if(isset($_POST["logout"])) {
        session_destroy();
        header("Location:../../login.php?loggedout"); 
    }
?>