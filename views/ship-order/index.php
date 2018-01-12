<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ship Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ship-order-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a('Create Ship Order', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'armada_no',
            [
      				'attribute'=>'armada_no',
      				'label'=>'Armada No',
      				'format'=>'text',//raw, html
      				'content'=>function($data){
      					return $data->getArmadaNo();
      					}
      			],
            'order_name',
            //'driver',
            [
      				'attribute'=>'driver',
      				'label'=>'Driver',
      				'format'=>'text',//raw, html
      				'content'=>function($data){
      					return $data->getDriverName();
      					}
      			],
            'ship_from',
            'ship_to',
            //'item',
            //'ammount',
            'order_date',
            'shiping_date',
            //'status',
            [
               'label'  => 'status',
               'value'  => function ($data) {
                   return $data->setStsShipping($data['status']);
               },
           ],
            //'invoice_no',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
