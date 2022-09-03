
    <?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Estates */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estates-form">

    <?php $form = ActiveForm::begin(); ?>



    <?= $form->field($model, 'customerId')->dropDownList($model->getCustomers()); ?>


    <?= $form->field($model, 'estateType')->dropDownList($model->getEstateTypes()); ?>


    <?= $form->field($model, 'size')->textInput() ?>

    
    <?= $form->field($model, 'location')->dropDownList($model->getLocations()); ?>

    <?= $form->field($model, 'notes')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
