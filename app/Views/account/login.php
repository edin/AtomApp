<?php $view->extend("layout"); ?>

<div class="text-center">
    <form class="form-signin">
        <h1 class="h3 mb-3 font-weight-normal">Sign in</h1>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

        <a href="<?= $container->url->to("remind") ?>" class="btn btn-default mt-4">Forgot password ?</a>
    </form>
</div>