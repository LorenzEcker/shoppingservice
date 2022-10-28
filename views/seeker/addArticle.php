<?php
require_once 'views/seeker/partials/header.php';?>

<div class="container-fluid">
    <form method="post" action="<?php \Shoppingservice\Util::action(\Shoppingservice\Controller::ACTION_ADDARTICLE, array(\Shoppingservice\Controller::PAGE => $_SERVER['HTTP_REFERER']))?>">
        <h1>Add an article to the shoppinglist.</h1>
        <h3>Fill in the form and hit ok.</h3>
        <div class="page-header">
            <label>name: </label>
            <input class="text" role="textbox" name="name" value="" type="text" required placeholder="Apple"/>
            <label>max price: </label>
            <input class="text" role="textbox" name="maxPrice" value="" type="number" min="0" max="1000" step="0.01" required placeholder="1.05"/><br/>
            <label>ammount: </label>
            <input class="text" role="textbox" name="ammount" value="" type="number" required placeholder="5"/><br/>

            <input type="submit" name="submit" value="add"/>
            <a href="<?php echo $_SERVER['HTTP_REFERER'];?>"><input type="button" name="back" value="back" ></a>
        </div>
        <input type="hidden" name="lid" value="<?php echo $_REQUEST['lid'];?>">
    </form>
</div>

<?php require_once 'views/seeker/partials/header.php';?>





