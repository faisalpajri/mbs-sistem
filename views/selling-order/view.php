<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SellingOrder */

$this->title = 'Penjualan : '.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Penjualan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="selling-order-view">

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
            //'order_detail_id',
            [
               'label'  => 'Tipe Produk',
               'value'  => function ($data) {
                   return $data->getTipeProduct($data['tipe_barang']);
               },
           ],
            'no_spk',
            'proyek',
            'no_po',
            'pemesan',
            'tanggal_pesan',
            [
               'label'  => 'Tipe Kontainer',
               'value'  => function ($data) {
                   return $data->getTipeContainer($data['tipe_container']);
               },
           ],
            'no_seri',
            [
							'label'=>'Harga Jual',
							'value'=> !empty($model)?"Rp. ".number_format($model->harga_jual, 0, '', '.'):"",
						],
            [
							'label'=>'Biaya Produksi',
							'value'=> !empty($model)?"Rp. ".number_format($model->biaya_produksi, 0, '', '.'):"",
						],
            [
							'label'=>'Alokasi Biaya Maintenance',
							'value'=> !empty($model)?"Rp. ".number_format($model->alokasi_biaya_maintenance, 0, '', '.'):"",
						],
            [
							'label'=>'Biaya Maintenance',
							'value'=> !empty($model)?"Rp. ".number_format($model->biaya_maintenance, 0, '', '.'):"",
						],
            [
							'label'=>'Biaya Lainnya',
							'value'=> !empty($model)?"Rp. ".number_format($model->biaya_lainnya, 0, '', '.'):"",
						],
            [
               'label'  => 'Status',
               'value'  => function ($data) {
                   return $data->getStatus($data['status']);
               },
               'format' => 'raw',
           ],
            'tanggal_pengiriman',
            'invoice_no',
             'tanggal_bayar',
            'description',
        ],
    ]) ?>

</div>
