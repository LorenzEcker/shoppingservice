<?php
use Data\DataManager;
use Shoppingservice\AuthenticationManager;
require_once "views/seeker/partials/header.php"; ?>

    <div class="container">
        <h1>Articles</h1>
        <h3>To edit or delete any list click on the buttons beside it.</h3>
    </div>

<?php require_once "views/seeker/partials/article_table.php";?>
    <div class="container">
        <a href="index.php?view=manageLists&slistFilter=my"><button>OK</button></a>
        <a href="index.php?view=addArticle&lid=<?php echo $_REQUEST['lid'];?>"><button>Add new Article</button></a>
    </div>

<?php require_once "views/seeker/partials/footer.php";
