<?php
use Data\DataManager;
$data = DataManager::getListCount()
?>


<div class="footer">

    <!--display cart info-->
    <hr />
    <div class="col-sm-8">
        <?php if(\Shoppingservice\AuthenticationManager::isAuthenticated()):?>
        <a href="index.php?view=manageLists&slistFilter=all">
            <button class="btn btn-primary btn-xs" type="button">
                <span class="badge"><?php print $data['total']?></span> lists total
            </button>
        </a>
        <a href="index.php?view=manageLists&slistFilter=myopen">
            <button class="btn btn-primary btn-xs" type="button">
                <span class="badge"><?php print $data['open']?></span> lists open
            </button>
        </a>

        <a href="index.php?view=manageLists&slistFilter=mydone">
            <button class="btn btn-primary btn-xs" type="button">
                <span class="badge"><?php print $data['done']?></span> lists done
            </button>
        </a>
        <?php endif; ?>
    </div>
    <div class="col-sm-4 pull-right">
        <p>Shoppingservice v1.0</p>
    </div>
</div>

<script src="assets/jquery-1.11.2.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
