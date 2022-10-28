<div class="container">
<?php

use Data\DataManager;
use Shoppingservice\AuthenticationManager;
use Shoppingservice\Controller;
use Shoppingservice\Util;

if(AuthenticationManager::isAuthenticated()):
    $lists = DataManager::getShoppinglists();
    foreach ($lists as $list):
        if(is_object($list)):?>
    <div class="page-header">
            <table class="table">
            <thead>
            <tr class="row">
                <th>ID</th>
                <th>complete until</th>
                <th>done</th>
                <th>totalCost</th>
            </tr>
            </thead>
            <tbody>
                    <tr class="row">
                        <td><?php echo $list->getListId();?></td>
                        <td><?php echo $list->getCompleteUntil();?></td>
                        <td><?php echo $list->getDone();?></td>
                        <td><?php echo $list->getTotalCost();?></td>

                        <td><a href="index.php?view=collector&lid=<?php echo $list->getListId(); ?>"></a>
                        </td>
                        <td><form method="post" action="<?php echo \Shoppingservice\Util::action(\Shoppingservice\Controller::ACTION_TAKESLIST, array('lid' => $list->getListId())); ?>">
                                <input class="btn" role="button" type="submit" value="take"/>
                            </form>
                        </td>
                    </tr>
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
                        <?php $articles = DataManager::getItemsOfShoppinglist($list->getListId());
                        if(sizeof($articles) > 0):
                        foreach ($articles as $article) :?>
                            <tr>
                                <td><?php echo $article->getArticleId();?></td>
                                <td><?php echo $article->getName();?></td>
                                <td><?php echo $article->getMaxPrice();?></td>
                                <td><?php echo $article->getAmmount();?></td>
                            </tr>
                        <?php endforeach; endif; ?>
                        </tbody>
                    </table>
            </div>
                <?php
                endif;
            endforeach;
        endif?>
        </tbody>
    </table>
</div>