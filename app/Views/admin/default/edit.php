<?php $view->extend("layout"); ?>

<form method="post" action="<?= $model->getCreateUrl() ?>" class="my-3 shadow-sm">
    <div class="d-flex justify-content-between p-3 my-3 align-items-center text-white-50 bg-purple rounded shadow-sm">
        <div class="title">
            <h6 class="mb-0 text-white lh-100"><?= $model->getTitle() ?></h6>
        </div>
        <div class="actions">
            <a href="<?= $model->getIndexUrl() ?>" class="btn btn-sm btn-primary">List</a>
        </div>
    </div>

    <div class="p-2 rounded">
        <!-- TODO: Generate Form -->
        <input type="hidden" name="Id" value="<?= $model->Id ?>">

        <?= $view->render("partial/input", ["name" => "Title", "label" => "Category", "value" => $model->Title, "errorMessage" => null]) ?>
        <?= $view->render("partial/input", ["name" => "Description", "value" => $model->Description, "errorMessage" => null]) ?>
        <?= $view->render("partial/input", ["name" => "ImageUrl", "label" => "Image URL", "value" => $model->ImageUrl, "errorMessage" => null]) ?>
        <?= $view->render("partial/checkbox", ["name" => "IsActive", "label" => "Active", "value" => $model->IsActive]) ?>

        <div class="mt-3 form-actions">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>