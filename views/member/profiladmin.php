<?php $this->beginBlock('title') ?>
Profil <?= $admin->username?>
<?php $this->endBlock()?>

<?php $this->beginBlock('style')?>
<style>
    .img-container {
        display: inline-block;
        width: 200px;
        height: 200px;
    }
    .img-container img{
        width: 100%;
        height: 100%;
        border-radius: 1000px;
    }
    .white-block {
        padding: 20px;
        background-color: white;
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.49);
    }

    .labels .col-7 {
        color: dodgerblue;
    }
</style>
<?php $this->endBlock()?>

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-4 text-center">
            <div class="img-container">
                <img src="<?= \app\managers\FileManager::loadAvatar($user,"512")?>" alt="">
            </div>
            <h2 class="mt-2 text-capitalize"><?= $admin->username?></h2>
        </div>
        <div class="col-md-8 white-block">
            <div class="row labels">
                <div class="col-5">
                    Nom
                </div>
                <div class="col-7">
                    <?= $user->name ?>
                </div>
                <div class="col-5">
                    Prénom
                </div>
                <div class="col-7">
                    <?= $user->first_name ?>
                </div>
                <div class="col-5">
                    Téléphone
                </div>
                <div class="col-7">
                    <?= $user->tel ?>
                </div>
                <div class="col-5">
                    Email
                </div>
                <div class="col-7">
                    <?= $user->email ?>
                </div>
                <div class="col-5">
                    Adresse
                </div>
                <div class="col-7">
                    <?= $user->address ?>
                </div>
            </div>
            
        </div>
    </div>
</div>