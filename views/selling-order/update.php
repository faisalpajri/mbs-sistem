<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SellingOrder */

$this->title = 'Update Penjualan: '.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Selling Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="selling-order-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
