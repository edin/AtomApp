<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Atom Framework</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?= $container->url->to("style/style.css") ?>">

    <style>
        body {
            padding-top: 5rem;
        }
    </style>
</head>

<body class="<?= $container->page->containerClass ?>">
    <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #3f51b5;">
        <a class="navbar-brand" href="<?= $container->url->to("/") ?>">Atom Framework</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?= $container->page->isActive("link") ?>">
                    <a class="nav-link" href="<?= $container->url->to("/link") ?>">Link</a>
                </li>
                <li class="nav-item <?= $container->page->isActive("zelda") ?>">
                    <a class="nav-link" href="<?= $container->url->to("/zelda") ?>">Zelda</a>
                </li>
            </ul>
        </div>
    </nav>
    <main role="main" class="container">
        <?= $content ?>
    </main>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
</body>

</html>