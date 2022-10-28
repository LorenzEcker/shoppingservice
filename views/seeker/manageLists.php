<?php

use Data\DataManager;
use Shoppingservice\AuthenticationManager;

require_once "views/seeker/partials/header.php"; ?>

<div class="container">
    <h1>Overview</h1>
    <h3>To edit or delete any list click on the buttons beside it.</h3>
    <h3>Filter the list by selecting one from the footer.</h3>
</div>

<?php require_once "views/seeker/partials/shoppinglist_table.php";
require_once "views/seeker/partials/footer.php";