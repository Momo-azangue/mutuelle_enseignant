<?php
/**
 * Created by PhpStorm.
 * User: medric
 * Date: 31/12/18
 * Time: 14:31
 */
$this->beginBlock('title') ?>
    Nouvelle aide
<?php $this->endBlock() ?>
<?php $this->beginBlock('style') ?>
    <style>
    </style>
<?php $this->endBlock() ?>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <?php if (count(\app\models\Member::find()->where(['active' => true]) ->all()) >1 ):?>
            <div class="col-12 mb-2">
                <h3 class="text-center text-muted">Nouvelle aide financiaire</h3>
            </div>
            <?php
            $form = \yii\widgets\ActiveForm::begin([
                'method' => 'post',
                'errorCssClass' => 'text-secondary',
                'action' => '@administrator.add_help',
                'options' =>['class' => 'col-md-8 col-12 white-block']
            ]);

            $help_types = \app\models\HelpType::find()->where(['active'=> true])->all();
            $members = \app\models\Member::find()->where(['active' => true])->all();

            $heps = [];
            foreach ($help_types as $help_type) {
                $heps[$help_type->id] = $help_type->title." - ".$help_type->amount.' XAF';
            }


            $items = [];
            foreach ($members as $member) {
                $user = \app\models\User::findOne($member->user_id);
                $items[$member->id] = $user->name . " " . $user->first_name;
            }

            ?>

            <?= $form->field($model,"help_type_id")->dropDownList($heps,['required'=> 'required'])->label("Type d'aide") ?>
            <?= $form->field($model,"member_id")->dropDownList($items, ['required' => 'required'])->label("Membre concerné par l'aide") ?>
            <?= $form->field($model,"limit_date")->input("date",['required' => 'required'])->label("Date limite de contribution") ?>
            <?= $form->field($model,"comments")->textarea(['required' => 'required'])->label("Commentaires à propos de l'aide") ?>

        <div class="form-group text-right">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
            <?php
            \yii\widgets\ActiveForm::end();
            ?>
        <?php else:?>
        <div class="col-12">
            <h3 class="text-center text-muted">Impossible de créer une aide avec moin de 2 membres actifs.</h3>
            <div class="text-center mt-2">
                <a href="<?= Yii::getAlias("@administrator.new_member")?>" class="btn btn-primary">Nouveau membre</a>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>

