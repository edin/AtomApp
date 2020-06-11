<?php $view->extend("layout"); ?>

<form method="post" class="my-3 shadow-sm">
    <div class="d-flex justify-content-between p-3 my-3 align-items-center text-white-50 bg-purple rounded shadow-sm">
        <div class="title">
            <h6 class="mb-0 text-white lh-100">Category</h6>
        </div>
        <div class="actions">
            <a href="/public/admin/category" class="btn btn-sm btn-primary">List</a>
        </div>
    </div>

    <div class="p-2 rounded">
        <input type="hidden" name="Id" value="<?= $model->Id ?>">

        <div class="form-group">
            <label for="Category">Category</label>
            <input type="text" name="Title" value="<?= @$model->Title ?>" class="form-control xis-invalid">
            <!--
            <div class="invalid-feedback">
                Title is missing
            </div>
            -->
        </div>
        <div class="form-check">
            <input type="hidden" name="IsActive" value="0" />
            <input type="checkbox" class="form-check-input" name="IsActive" <?php if ($model->IsActive) : ?> checked <?php endif; ?> value="1" id="IsActive">
            <label class="form-check-label" for="IsActive">Active</label>
        </div>

        <div class="mt-3 form-actions">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>