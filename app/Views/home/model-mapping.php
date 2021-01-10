<?php
$mapping = (new $class())->getMapping()
?>
<b><?= $class ?></b>
<hr />

<table class="table table-striped table-sm">
    <tr>
        <th>Property</th>
        <th>Field</th>
        <th>Type</th>
        <th>Label</th>
        <th>Insertable</th>
        <th>Updatable</th>
        <th>Selectable</th>
        <th>Nullable</th>
        <th>Unique</th>
        <th>Searchable</th>
        <th>Indexed</th>
    </tr>
    <?php foreach ($mapping->getFieldMapping() as $field) : ?>
        <?php
        $valueConverter = ($v = $field->getConverter()) ? get_class($v) : "";
        $valueProvider = ($v = $field->getValueProvider()) ? get_class($v) : "";
        ?>
        <tr>
            <td><?= $field->getPropertyName() ?></td>
            <td><?= $field->getFieldName() ?></td>
            <td><?= $field->getType() ?></td>
            <td><?= $field->getLabel() ?></td>
            <td>
                <?= $view->render("partial/cell-checked", ["isActive" => $field->isIncludedInInsert()]) ?>
            </td>
            <td>
                <?= $view->render("partial/cell-checked", ["isActive" => $field->isIncluedInUpdate()]) ?>
            </td>
            <td>
                <?= $view->render("partial/cell-checked", ["isActive" => $field->isIncludedInSelect()]) ?>
            </td>
            <td>
                <?= $view->render("partial/cell-checked", ["isActive" => $field->isNullable()]) ?>
            </td>
            <td>
                <?= $view->render("partial/cell-checked", ["isActive" => $field->isUnique()]) ?>
            </td>
            <td>
                <?= $view->render("partial/cell-checked", ["isActive" => $field->isSearchable()]) ?>
            </td>
            <td>
                <?= $view->render("partial/cell-checked", ["isActive" => $field->isIndexed()]) ?>
            </td>
        </tr>
        <?php if ($valueProvider || $valueConverter) : ?>
            <tr>
                <td colspan="100">
                    <div><b>Converter:</b> <?= $valueConverter ?> </div>
                    <div><b>Provider:</b> <?= $valueProvider ?> </div>
                </td>
            </tr>
        <?php endif; ?>
    <?php endforeach; ?>
</table>