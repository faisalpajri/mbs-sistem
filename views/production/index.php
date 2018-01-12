<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Productions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-index box box-primary">
    <div class="box-header with-border">
        <?= Html::a('Create Production', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <div class="box-body table-responsive no-padding">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'no_spk',
            //'proyek',
            //'order_date',
            'no_po',
            [
               'label'  => 'Tipe Produk',
               'value'  => function ($data) {
                   return $data->getTipeProduct($data['tipe_product']);
               },
           ],
            'pemesan',
            'tanggal_produksi',
            'tempo_hari',
            //'contractor_id',
            //'contractor.nama',
            [
               'label'  => 'Kontraktor',
               'value'  => 'contractor.nama',
           ],
            //'order_detail_id',
            //'tipe_kontainer',
            [
               'label'  => 'Tipe Kontainer',
               'value'  => function ($data) {
                   return $data->getTipeContainer($data['tipe_kontainer']);
               },
           ],
            'no_seri_kontainer',
            //'estimasi_material',
            //'realisasi_material',
            //'biaya_pengerjaan',
            //'created_by',
            //'created_on',
            //'updated_by',
            //'updated_on',
            //'status',
            [
               'label'  => 'Status',
               'value'  => function ($data) {
                   return $data->getStatus($data['status']);
               },
               'format' => 'raw',
           ],

            ['class' => 'yii\grid\ActionColumn',

              'template' => '{view} {update} {delete}',
              'visibleButtons'=>[
                  'update'=> function($model){
                        return $model->status = 1;
                   },
              ]
            ],
        ],
    ]); ?>
  </div>
</div>
