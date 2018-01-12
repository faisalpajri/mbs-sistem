<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Production */

$this->title = 'Produksi : '.$model->no_spk;
$this->params['breadcrumbs'][] = ['label' => 'Productions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="production-view">

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
            'no_spk',
            [
               'label'  => 'Tipe Produk',
               'value'  => function ($data) {
                   return $data->getTipeProduct($data['tipe_product']);
               },
           ],
            'proyek',
            'order_date',
            'no_po',
            'pemesan',
            'tanggal_produksi',
            'tempo_hari',
            'contractor.nama',
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
            [
							'label'=>'Estimasi Material',
							'value'=> !empty($model)?"Rp. ".number_format($model->estimasi_material, 0, '', '.'):"",
						],
            //'realisasi_material',
            [
							'label'=>'Realisasi Material',
							'value'=> !empty($model)?"Rp. ".number_format($model->realisasi_material, 0, '', '.'):"",
						],
            //'biaya_pengerjaan',
            [
							'label'=>'Biaya Pengerjaan',
							'value'=> !empty($model)?"Rp. ".number_format($model->biaya_pengerjaan, 0, '', '.'):"",
						],
            // 'created_by',
            // 'created_on',
            // 'updated_by',
            // 'updated_on',
            //'status',
            [
               'label'  => 'Status',
               'value'  => function ($data) {
                   return $data->getStatus($data['status']);
               },
               'format' => 'raw',
           ],
        ],
    ]) ?>

</div>
