<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EstateTypes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estate-types-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList($model->selectStatus()); ?>
    
    <?= $form->field($model, 'chargeType')->dropDownList($model->getChargeTypeNames()); ?>
    
    <?= $form->field($model, 'notes')->textarea(['rows' => 6]) ?>
  
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
