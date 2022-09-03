<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EstateTypes */

$this->title = 'Update Estate Types: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Estate Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estate-types-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
