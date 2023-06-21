<?php $this->beginBlock('title') ?>
Accueil
<?php $this->endBlock() ?>
<?php $this->beginBlock('style') ?>
<style>
    #saving-amount-title {
        font-size: 5rem;
        color: white;
    }
    .img-bravo {
        width: 100px;
        height: 100px;
        border-radius: 100px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.51);
    }
    .media {
        border-bottom: 1px solid #ededed;
    }
    #social-crown {
        font-size: 5rem;
    }
</style>
<?php $this->endBlock() ?>
<div class="container mt-5 mb-5">

    <div class="col-md-8  pr-4">

        <div class="row">
            <div class="col-12 white-block">
                <?php
                $exercise = \app\models\Exercise::findOne(['active' => true]);

                ?>
                    
                <h3 class="text-center text-muted">Actualité de la mutuelle</h3>
                <?php
                $helps = \app\models\Help::findAll(['state' => true]);
                ?>
                <?php
                if (count($helps)):
                ?>
                    <?php
                    foreach ($helps as $help):
                        $member = $help->member();
                        $user = $member->user();
                        $helpType = $help->helpType();
                    ?>
                        <div class="media">
                            <img class="d-flex mr-3" width="60" height="60" src="<?= \app\managers\FileManager::loadAvatar($user)?>" alt="Generic placeholder image">
                            <div class="media-body">
                                <h5 class="mt-0 font-weight-bold"><?= $helpType->title ?></h5>
                                <span class="blue-text"><b><?= $user->name.' '.$user->first_name?></b></span>
                                <br>
                                <?= $help->comments ?>
                                <br>
                                <span style="font-size: 1.5rem" class="text-secondary"><?= ($t=$help->contributedAmount())?$t:0?> / <?= $help->amount?>  XAF</span>
                                <div class="text-right">
                                    <a href="<?= Yii::getAlias("@member.help_details")."?q=".$help->id?>" class="btn btn-primary p-2">Details</a>
                                </div>
                            </div>
                        </div>

                    <?php
                    endforeach;
                    ?>

                <?php
                else:
                ?>
                    <p class="text-center text-primary">Aucune aide active</p>
                <?php
                endif;
                ?>







            </div>
        </div>
    </div>
        
</div>