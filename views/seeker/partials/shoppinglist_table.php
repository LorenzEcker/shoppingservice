<div class="container">
    <table class="table">
        <thead>
            <tr class="row">
                <th>ID</th>
                <th>complete until</th>
                <th>done</th>
                <th>totalCost</th>
                <th>volunteer</th>
            </tr>
        </thead>
        <tbody>
            <?php

            use Data\DataManager;
            use Shoppingservice\AuthenticationManager;

            if(AuthenticationManager::isAuthenticated()):
                $lists = DataManager::getShoppinglists();
                foreach ($lists as $list):
                    if(is_object($list)):?>
                        <tr class="row">
                            <td><?php echo $list->getListId()?></td>
                            <td><?php echo $list->getCompleteUntil()?></td>
                            <td><?php $done = $list->getDone()?>
                            <?php if($done == '1'):
                                echo 'YES';
                            else:
                                echo 'NO';
                            endif;?></td>
                            <td><?php echo $list->getTotalCost()?></td>
                            <td><?php $seeker = DataManager::getUserById($list->getVolunteer());
                            if($seeker == null):
                                echo 'not taken care of';
                            else:
                                echo $seeker->getUserName();
                            endif;?></td>
                            <td><a href="index.php?view=manageItems&lid=<?php echo $list->getListId()?>"><button>edit</button></a></td>
                            <td><form method="post" action="<?php echo \Shoppingservice\Util::action(\Shoppingservice\Controller::ACTION_DELSLIST, array('lid' => $list->getListId())); ?>">
                                    <input class="btn" role="button" type="submit" value="delete"/>
                                </form></td>
                        </tr>
                    <?php
                    endif;
                endforeach;
            endif?>
        </tbody>
    </table>
</div>