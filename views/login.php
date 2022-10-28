<?php

use Shoppingservice\AuthenticationManager;
use Shoppingservice\Controller;
use Shoppingservice\Util;
if(AuthenticationManager::isAuthenticated()):
Util::redirect("index.php");
endif; ?>

<?php
require_once('views/partials/header.php');
?>
    <div class="container-fluid">
        <div class="jumbotron">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-lg-8 mx-auto">
                        <h2 class="login-heading mb-4">Login</h2>
                        <form method="post" action="<?php Util::action(Controller::ACTION_LOGIN, array('view' => $view)); ?>">
                            <div class="form-label-group">
                                <input type="text" id="inputEmail" class="form-control" placeholder="Email address" name="<?php print Controller::USER_NAME; ?>"required autofocus>
                                <label for="inputEmail">Email address</label>
                            </div>

                            <div class="form-label-group">
                                <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="<?php print Controller::USER_PASSWORD; ?>" required>
                                <label for="inputPassword">Password</label>
                            </div>

                            <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Sign in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

<?php
require_once('views/partials/footer.php');
