<?php $view->extend("layout"); ?>
<?php
/**
 * @var $components Atom\Container\ComponentRegistration[]
 */
$components = $container->getRegistry();
?>

<h2>Container</h2>

<?php if ($container->Router) : ?>
    <table class="table table-striped table-sm">
        <tr>
            <th>Type</th>
            <th>Name</th>
            <th>Source Type</th>
            <th>Target Type</th>
            <th>Shared</th>
        </tr>
        <?php foreach ($components as $componenet) : ?>
            <tr>
                <td><?= $componenet->getRegistrationTypeName() ?></td>
                <td><?= $componenet->name ?></td>
                <td><?= $componenet->sourceType ?></td>
                <td><?= $componenet->targetType ?></td>
                <td>
                    <?php if ($componenet->isShared) : ?>
                        <span class="badge p-2 badge-success">Yes</span>
                    <?php else : ?>
                        <span class="badge p-2 badge-light">No</span>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>