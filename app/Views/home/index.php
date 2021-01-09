<?php $view->extend("layout"); ?>

<h2>Examples</h2>

<?php /**
<?php if ($items) : ?>
    <table class="table">
        <?php foreach ($items as $item) : ?>
            <tr>
                <td><?= $item->Id ?></td>
                <td><?= $item->FirstName ?></td>
                <td><?= $item->LastName ?></td>
                <td><?= $item->Email ?></td>
                <td>
                    <div class="float-right">
                        <a class="btn btn-sm btn-primary" href="<?= $baseUrl ?>item">Detail</a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>
 */ ?>

<?php if ($items) : ?>
    <table class="table">
        <?php foreach ($items as $item) : ?>
            <tr>
                <td><?= $item->title ?></td>
                <td><?= $item->url ?></td>
                <td>
                    <div class="float-right">
                        <a class="btn btn-sm btn-primary" href="<?= $item->url ?>">View</a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>