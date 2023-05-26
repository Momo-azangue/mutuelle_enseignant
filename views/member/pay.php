<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<hr>
<h1>Paiement</h1>

<?php
$form = ActiveForm::begin();

echo  $form->field($model, 'email')->textInput(['placeholder' =>'Entrez votre adressse e-mail']);
echo  $form->field($model, 'nameOnCard')->textInput(['placeholder' =>'Nom sur la carte']);
echo  $form->field($model, 'cardNumber')->textInput(['placeholder' => '1234 1234 1234 1234']);
echo  $form->field($model, 'expirationDate')->textInput(['placeholder' => 'MM/YY']);
echo  $form->field($model, 'cvc')->textInput(['placeholder' => 'CVC']);
echo  $form->field($model, 'country')->dropDownList(['USA' => 'USA', 'France' => 'France', 'Germany' => 'Germany', 'Cameroun' => 'Cameroun' ]);
?>

 <div class="form-group">
<?= Html::submitButton('Pay', ['class' => 'btn-primary']); ?>

</div>

<?php
ActiveForm::end();

?>