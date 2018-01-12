<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\helpers\FormatHelper;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Containers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-index box box-primary">
    <div class="box-header with-border">
        <?= Html::a('Create Container', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                //'contianer_id',
                [
                   'label'  => 'tipe',
                   'value'  => function ($data) {
                       return $data->getTipeContainer($data['tipe']);
                   },
               ],
                //'tipe',
                'no_seri',
                'kondisi',
                [
                   'label'  => 'Harga',
                   'value'  => function ($data) {
                       return FormatHelper::getNumericMoney($data['ammount']);
                   },
               ],
                //'status',
                [
                   'label'  => 'status',
                   'value'  => function ($data) {
                       return $data->getStsContainer($data['status']);
                   },
               ],
                // 'supplier',
                // 'no_po',
                'tanggal_terima',

                ['class' => 'yii\grid\ActionColumn',


                  'template' => '{view} {update} {delete}',
                  'visibleButtons'=>[
                      'update'=> function($model){
                            return $model->status < 5;
                       },
                       'delete'=> function($model){
                             return $model->status < 3;
                        },
                  ]
                ],
            ],
        ]); ?>
    </div>
</div>
