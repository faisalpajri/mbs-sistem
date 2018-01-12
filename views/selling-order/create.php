<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SellingOrder */

$this->title = 'Buat Penjualan';
$this->params['breadcrumbs'][] = ['label' => 'Selling Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="selling-order-create">

    <?= $this->render('_form_create', [
        'model' => $model,
    ]) ?>

</div>
