<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ShipOrder */

$this->title = 'Shiiping ( '.$model->getArmadaNo() .' - ' .$model->getDriverName() .' )';
$this->params['breadcrumbs'][] = ['label' => 'Ship Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ship-order-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            //'armada_no',
            [
               'label'  => 'armada_no',
               'value'  => function ($data) {
                   return $data->getArmadaNo();
               },
           ],
            'order_name',
            //'driver',
            [
               'label'  => 'driver',
               'value'  => function ($data) {
                   return $data->getDriverName();
               },
           ],
            'ship_from',
            'ship_to',
            'item',
            'ammount',
            'order_date',
            'shiping_date',
            //'status',
            [
               'label'  => 'status',
               'value'  => function ($data) {
                   return $data->setStsShipping($data['status']);
               },
           ],
            'invoice_no',
        ],
    ]) ?>

</div>
