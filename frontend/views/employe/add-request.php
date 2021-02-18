<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

$form = ActiveForm::begin([
    'id' => 'add',
    'options' => ['class' => 'form-horizontal'],
]);
?><div class="col-md-12">
<h2 align="center">Ariza qoldirish oynasi:</h2>

<div class="col-md-5">
	<?= $form->field($model, 'name') ?>
</div>
<div class="col-md-5 col-md-offset-1" >
	<?= $form->field($model, 'surname') ?>
</div>
</div>
<div class="col-md-12">
<div class="col-md-5">
	<?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>
</div>
<div class="col-md-5 col-md-offset-1" >
	<?= $form->field($model, 'country_of_orign')->textarea(['rows' => 6]) ?>
</div>
</div>
<div class="col-md-12">
<div class="col-md-2">
	<?= $form->field($model, 'age') ?>
</div>
<div class="col-md-4 col-md-offset-1" >
	<?= $form->field($model, 'email')->widget(\yii\widgets\MaskedInput::className(), [
    		'clientOptions' => [
        		'alias' =>  'email'
    	 ],
	]) ?>
</div>
<div class="col-md-3 col-md-offset-1" >
	<?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::className(), [
   			'mask' => '(999)-99 999-99-99'
    	 
	     ]) ?>
</div>
</div>
<div class="col-md-5"><br>
<?= Html::submitButton('Send', ['class' => 'btn btn-primary btn-lg btn-block'])?>
</div>

<?php ActiveForm::end(); ?>