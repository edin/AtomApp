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
            <th>Middlewares</th>
            <th>Controller</th>
            <th>Method Name</th>
        </tr>
        <?php foreach ($router->getAllRoutes() as $route) : ?>
            <tr>
                <td class="align-middle"><?= $route->getMethodList() ?></td>
                <td class="align-middle"><?= $route->getPath() ?></td>
                <td class="align-middle">
                    <?php foreach ($route->getMiddlewares() as $m) : ?>
                        <span class="small"><?= is_object($m) ? get_class($m) : $m ?></span> <br />
                    <?php endforeach; ?>
                </td>
                <td class="align-middle"><?= $route->getController() ?></td>
                <td class="align-middle"><?= $route->getMethodName() ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>