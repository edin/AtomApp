<?php $view->extend("layout"); ?>

<div class="text-center">
    <form class="form-signin">
        <h1 class="h3 mb-3 font-weight-normal">Reset password</h1>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <div class="mb-3">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Reset</button>
        </div>
        <a href="<?= $container->url->to("login") ?>" class="btn btn-default mt-4">Login</a>
    </form>
</div>