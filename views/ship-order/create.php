<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ShipOrder */

$this->title = 'Create Ship Order';
$this->params['breadcrumbs'][] = ['label' => 'Ship Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ship-order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'drivers' => $drivers,
    ]) ?>

</div>
