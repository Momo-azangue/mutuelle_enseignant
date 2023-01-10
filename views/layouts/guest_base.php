<?php

use yii\helpers\Html;

$this->title = "Mutuelle - ENSP"
?>

<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <?php include Yii::getAlias("@app") . "/includes/links.php"; ?>

        <title>
            <?php if (isset($this->blocks['title'])): ?>
                <?= $this->blocks['title'] ?>
            <?php else: ?>
                <?= Html::encode($this->title) ?>
            <?php endif; ?>
        </title>


        <link rel="stylesheet" href="<?= Yii::getAlias("@web") . "/css/guest.css" ?>">

        <?php if (isset($this->blocks['style'])): ?>
            <?= $this->blocks['title'] ?>
        <?php endif; ?>
    </head>
    <body>
    <?php $this->beginBody() ?>

    <nav class="navbar navbar-expand-lg navbar-fixed-top px-md-5 p-1" id="navbar">
        <a href="<?= Yii::getAlias("@guest.welcome") ?>" class="navbar-brand text-white"><img
                    src="<?= Yii::getAlias("@web") . "/img/icon.png" ?>" id="icon" alt="ensp"> <span
                    class="d-none d-md-inline">ENSP</span></a>

        <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item <?= Yii::$app->controller->action->id == "accueil"?"active" : "" ?>">
                    <a class="nav-link"
                       href="<?= Yii::getAlias("@guest.welcome") ?>">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item <?= Yii::$app->controller->action->id != "accueil"? "active" : "" ?>">
                    <a class="nav-link" href="<?= Yii::getAlias("@guest.connection") ?>">Connexion</a>
                </li>
            </ul>
        </div>
    </nav>


    <?= $content ?>


    <?php include Yii::getAlias("@app") . "/includes/scripts.php"; ?>
    <?php if (isset($this->blocks['script'])): ?>
        <?= $this->blocks['script'] ?>
    <?php endif; ?>

    <?php $this->endBody(); ?>
    </body>

    </html>
<?php $this->endPage(); ?>