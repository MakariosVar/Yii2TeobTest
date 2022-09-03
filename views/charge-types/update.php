<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ChargeTypes */

$this->title = 'Update Charge Types: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Charge Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="charge-types-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
