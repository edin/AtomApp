<?php $view->extend("layout"); ?>

<form method="post" class="my-3 shadow-sm">
    <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded shadow-sm">
        <div class="lh-100">
            <h6 class="mb-0 text-white lh-100">Category</h6>
        </div>
    </div>
    <div class="p-2 rounded">
        <div class="form-group">
            <label for="Category">Category</label>
            <input type="text" class="form-control">
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="IsActive">
            <label class="form-check-label" for="IsActive">Active</label>
        </div>
        <div class="mt-3 form-actions">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>