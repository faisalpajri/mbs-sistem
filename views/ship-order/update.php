<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ShipOrder */

$this->title = 'Update Ship Order: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Ship Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ship-order-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'drivers' => $drivers,
    ]) ?>

</div>
