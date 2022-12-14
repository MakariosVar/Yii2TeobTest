<?php

use app\models\ChargeTypes;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ChargeTypes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="charge-types-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList(ChargeTypes::selectStatus()); ?>
   
    <?= $form->field($model, 'amount')->textInput() ?>

    <?= $form->field($model, 'notes')->textarea(['rows' => 6]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
