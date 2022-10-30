<?php
use Data\DataManager;
use Shoppingservice\Util;

?>


<div class="container">
    <table class="table">
        <thead>
            <tr>
                <td>Article Id</td>
                <td>Name</td>
                <td>Max Price</td>
                <td>ammount</td>
            </tr>
        </thead>
        <tbody>
        <?php $articles = DataManager::getItemsOfShoppinglist($_REQUEST['lid']);

        foreach ($articles as $article) :?>
            <tr>
                <td><?php echo $article->getArticleId();?></td>
                <td><?php echo $article->getName();?></td>
                <td><?php echo $article->getMaxPrice();?></td>
                <td><?php echo $article->getAmmount();?></td>
                <td>
                    <a href="index.php?view=editArticle&aid=<?php echo $article->getArticleId();?>">
                        <button class="btn">Edit</button>
                    </a>
                </td>
                <td>
                    <form method="post" action="<?php unset($_REQUEST['page']); echo Util::action(\Shoppingservice\Controller::ACTION_DELARTICLE);?>">
                        <input class="btn" role="button" type="submit" value="Delete"/>
                        <input type="hidden" name="aid" value="<?php echo $article->getArticleId(); ?>"/>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>



