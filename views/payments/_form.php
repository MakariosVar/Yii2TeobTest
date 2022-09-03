<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Payments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'customerId')->dropDownList($model->getCustomers()); ?>



    <?= $form->field($model, 'amount')->textInput() ?>

    <?= $form->field($model, 'receiptNumber')->textInput() ?>

  
    <?= $form->field($model, 'debtType')->dropDownList($model->getDebtType()); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
