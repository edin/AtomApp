<?php $view->extend("layout"); ?>
<?php
/**
 * @var $router Atom\Router\Router
 */
$router = $container->Router;
?>

<h2>Router</h2>

<?php if ($container->Router) : ?>
    <table class="table table-striped table-sm">
        <tr>
            <th>Method</th>
            <th>Path</th>
            <th>Controller</th>
            <th>Method Name</th>
        </tr>
        <?php foreach ($router->getAllRoutes() as $route) : ?>
            <tr>
                <td><?= $route->getMethodList() ?></td>
                <td><?= $route->getPath() ?></td>
                <td><?= $route->getController() ?></td>
                <td><?= $route->getMethodName() ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>