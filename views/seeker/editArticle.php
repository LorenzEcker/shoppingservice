<?php
$item = \Data\DataManager::getArticle($_REQUEST['aid']);
require_once 'views/seeker/partials/header.php'; ?>

<div class="container-fluid">
    <h1>Edit item</h1>
    <h3>Edit Values in the fields and press ok to save.</h3>
    <form method="post"
          action="<?php \Shoppingservice\Util::action(\Shoppingservice\Controller::ACTION_EDIT_ARTICLE, array('page' => $_SERVER['HTTP_REFERER'])) ?>">
        <div class="page-header">
            <label>name: </label>
            <input class="text" role="textbox" name="name" value="<?php echo $item->getName(); ?>" type="text" required
                   placeholder="Apple"/>
            <label>max price: </label>
            <input class="text" role="textbox" name="maxPrice" value="<?php echo $item->getMaxPrice(); ?>" type="number"
                   min="0" max="1000" step="0.01" required placeholder="1.05"/><br/>
            <label>ammount: </label>
            <input id="rng" class="text" role="textbox" name="ammount" value="<?php echo $item->getAmmount(); ?>"
                   type="number" required placeholder="5"/><br/>

            <input type="submit" name="submit" value="set"/>
        </div>
        <input type="hidden" name="aid" value="<?php echo $_REQUEST['aid'] ?>">
    </form>
</div>

<?php require_once 'views/seeker/partials/footer.php' ?>
