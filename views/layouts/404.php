<?php
use yii\helpers\Html;
$this->title = "Mutuelle - ENSP";
?>

<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <?php include Yii::getAlias("@app") . "/includes/links.php"; ?>
        <title>404</title>
        <style>
            body {
                background: linear-gradient(rgba(0, 0, 0, 0.71),rgba(0, 0, 0, 0.71)), url("/img/404.png");
                height: 100vh;
            }
        </style>
    </head>
    <body class="container-fluid">
    <div class="row h-100 align-items-center">
        <div class="col-12 text-center text-white">
            <h1 style="font-size: 4rem"><b>404</b></h1>
            <h2 style="font-size: 3.8rem">Page introuvable</h2>
        </div>
    </div>

    <?php include Yii::getAlias("@app") . "/includes/scripts.php"; ?>
    </body>

    </html>
<?php $this->endPage(); ?>