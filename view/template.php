<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <base href="<?= $webRoot ?>" >
        <link rel="stylesheet" href="Content/style.css" />
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <script type="text/javascript" src="./ressources/script.js"></script>
        <title><?= $title ?></title>
    </head>
    <body>
        <div id="global">
            <header>
            </header>
            <div id="content">
                <?= $content ?>
            </div> <!-- #content -->
            <footer id="blogFooter">
            </footer>
        </div> <!-- #global -->
    </body>
</html>