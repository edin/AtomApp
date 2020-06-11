<?php
$errorMessage ??= null;
$isInvalid = $errorMessage ? "is-invalid" : "";
$label ??= $name;
?>
<div class="form-check">
    <input type="hidden" name="<?= $name ?>" value="0" />
    <input type="checkbox" class="form-check-input" name="<?= $name ?>" <?php if ($value) : ?> checked <?php endif; ?> value="1" id="<?= $name ?>">
    <label class="form-check-label" for="<?= $name ?>"><?= $label ?></label>
</div>