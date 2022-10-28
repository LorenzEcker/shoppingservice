<div class="container">
    <table class="table">
        <thead>
            <tr class="row">
                <th>ID</th>
                <th>complete until</th>
                <th>done</th>
                <th>totalCost</th>
                <th>seeker</th>
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
                            <td><?php echo $list->getDone()?></td>
                            <td><?php echo $list->getTotalCost()?></td>
                            <td><?php $seeker = DataManager::getUserById($list->getSeeker()); echo $seeker->getUserName(); ?></td>
                        </tr>
                    <?php
                    endif;
                endforeach;
            endif?>
        </tbody>
    </table>
</div>