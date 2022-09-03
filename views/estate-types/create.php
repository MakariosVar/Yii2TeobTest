<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EstateTypes */

$this->title = 'Create Estate Types';
$this->params['breadcrumbs'][] = ['label' => 'Estate Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estate-types-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
