<?php
use Shoppingservice\Controller;
use Shoppingservice\Util;

require_once "views/seeker/partials/header.php";?>

<div class="container-fluid">
        <form method="post" action="<?php echo Util::action(Controller::ACTION_ADDLIST)?>">
            <div class="container-fluid">
                <h1>General Information</h1>
                <div class="page-header">
                    <h4>Please choose the ammount of entrys before entering data!</h4>
                    <h2>Edit the date on wich the list has to be done.</h2>
                </div>
                <label>To be completed until: </label>
                <input class="text" role="textbox" name="completeUntil" value="" type="date" required autofocus/>
            </div>

            <div class="container-fluid">
                <h1>Add Items</h1>
                <h3>To add another one click on the add Button.</h3>
                <input type="hidden" name="entries" value="<?php echo $_REQUEST['entries'];?>">
                <?php for($i = 0; $i < $_REQUEST['entries']; $i++): ?>
                <div class="page-header">
                    <label>name: </label>
                    <input class="text" role="textbox" name="name<?php echo $i?>" value="" type="text" required placeholder="Apple"/>
                    <label>max price: </label>
                    <input class="text" role="textbox" name="maxPrice<?php echo $i?>" value="0" type="number" min="0" max="1000" step="0.01" required placeholder="1.05"/><br/>
                    <label>ammount: </label>
                    <input id="rng" class="text" role="textbox" name="ammount<?php echo $i?>" value="1" type="number" required placeholder="5"/><br/>
                </div>
                <?php endfor; ?>
            </div>

            <div class="container-fluid">
                <div class="page-header">
                    <input class="btn" role="button" name="sumbit" value="Ok" type="submit">
                </div>
            </div>
        </form>

        <div class="container-fluid">
            <a href="index.php?view=addList&entries=<?php echo $_REQUEST['entries'] + 1;?>"><button class="btn" >Add an entry</button></a>
            <a href="index.php?view=addList&entries=<?php if($_REQUEST['entries'] > 1): echo $_REQUEST['entries'] - 1; else: echo 1; endif;?>"><button class="btn" >Remove an entry</button></a>
        </div>
</div>



<?php require_once "views/seeker/partials/footer.php";
