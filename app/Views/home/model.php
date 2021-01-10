<?php $view->extend("layout"); ?>

<h2>Model Mapping</h2>

<?= $view->render("home/model-mapping", ["class" => App\Domain\Models\Post::class]) ?>
<?= $view->render("home/model-mapping", ["class" => App\Domain\Models\Category::class]) ?>
<?= $view->render("home/model-mapping", ["class" => App\Domain\Models\User::class]) ?>