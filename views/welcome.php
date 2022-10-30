<?php
if(\Shoppingservice\AuthenticationManager::isAuthenticated() && \Shoppingservice\AuthenticationManager::isVolunteer()){
    require_once ('volunteer/partials/header.php');
}elseif(\Shoppingservice\AuthenticationManager::isAuthenticated() && !\Shoppingservice\AuthenticationManager::isVolunteer()){
    require_once ('seeker/partials/header.php');
}else{
    require_once('views/partials/header.php');
} ?>

<div class="container" role="main">
    <div class="page-header">
        <div class="jumbotron">
            <div class="alert-info">
                <h1>Welcome</h1>
                <p>Welcome to the Shoppingservice</p>
            </div>
        </div>
    </div>
    <?php
    if(!\Shoppingservice\AuthenticationManager::isAuthenticated()):?>
    <div class="page-header">
        <h1>Login required</h1>
        <div class="jumbotron">
            <h2>Shoppingservice</h2>
            <p>To use the services of the Shoppingservice please <a href="index.php?view=login">login</a> in.</p>
            <p>If you don`t have an account, you can't create one yourself!!!</p>
            <p>In this case please ask the administrator to create one for you manually.</p>
        </div>
    </div>
    <?php endif;?>
</div>
<?php
require_once('views/partials/footer.php');






