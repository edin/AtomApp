<?php
$errorMessage ??= null;
$isInvalid = $errorMessage ? "is-invalid" : "";
$label ??= $name;
?>
<div class="form-group">
    <label for="<?= $name ?>"><?= $label ?></label>
    <input type="text" name="<?= $name ?>" id="<?= $name ?>" value="<?= $value ?>" class="form-control <?= $isInvalid ?>">
    <?php if ($errorMessage) : ?>
        <div class="invalid-feedback">
            Title is missing
        </div>
    <?php endif; ?>
</div>