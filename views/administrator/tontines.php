<?php
/**
 * Created by PhpStorm.
 * User: medric
 * Date: 31/12/18
 * Time: 14:31
 */

use app\models\Tontine;
use yii\widgets\LinkPager;

$this->beginBlock('title') ?>
Aides
<?php $this->endBlock() ?>
<?php $this->beginBlock('style') ?>
<style>
    .card {
        height: 21rem;
        width: 18rem;
        background-size: 18rem 21rem;
        border-radius: 5px !important;
        overflow: hidden;
        margin-bottom: 10px;

    }

    #saving-amount-title {
        font-size: 5rem;
        color: white;
    }
</style>
<?php $this->endBlock() ?>


<div class="container mt-5 mb-5">
    <div class="row mb-2">
        <div class="col-12 white-block text-center blue-gradient ">
            <h3 class="text-white">Fond social</h3>
            <h1 id="saving-amount-title">
                <?=  ($t=\app\managers\FinanceManager::socialCrown())? ($t>0?$t:0) :0 ?> XAF
            </h1>
        </div>
    </div>

</div>

<a href="<?= Yii::getAlias("@administrator.new_tontine") ?>" class="btn btn-primary btn-add"><i class="fas fa-plus"></i></a>