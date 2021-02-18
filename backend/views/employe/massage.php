<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

$form = ActiveForm::begin([
    'id' => 'add-massage',
    'options' => ['class' => 'form-horizontal'],
]);
?><div class="col-md-12">
<h2 align="center">Intervyu belgilash va xabar qoldirish oynasi:</h2>

<div class="col-md-8 col-md-offset-2">
	<?= $form->field($model, 'content')->textarea(['rows' => 10]) ?>
</div>

<div class="col-md-3 col-md-offset-2" >
	<?= $form->field($model, 'inter_date')->widget(\yii\widgets\MaskedInput::className(), [
    		'clientOptions' => [
        		'alias' =>  'datetime'
    	 ],
	]) ?>
</div>
</div>
<div class="col-md-5 col-md-offset-2"><br>
<?= Html::submitButton('Send', ['class' => 'btn btn-primary btn-lg btn-block'])?>
</div>

<?php ActiveForm::end(); ?>