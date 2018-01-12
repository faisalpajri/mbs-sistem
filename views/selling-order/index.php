<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\helpers\FormatHelper;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Penjualan Produk';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="selling-order-index">

    <p>
        <!-- <?= Html::a('Tambah Penjualan', ['create'], ['class' => 'btn btn-success']) ?> -->
        <?= Html::button('Tambah Penjualan', ['id' => 'modelButton', 'value' => \yii\helpers\Url::to(['selling-order/create']), 'class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'order_detail_id',
            [
               'label'  => 'Tipe Produk',
               'value'  => function ($data) {
                   return $data->getTipeProduct($data['tipe_barang']);
               },
           ],
            'no_po',
            'no_spk',
            'proyek',
            'pemesan',
            //'harga_jual',
            [
							'label'=>'Harga Jual',
              'value'  => function ($data) {
                  return FormatHelper::getNumericMoney($data['harga_jual']);
              },
						],
            //'tipe_container',
            [
               'label'  => 'Tipe Kontainer',
               'value'  => function ($data) {
                   return $data->getTipeContainer($data['tipe_container']);
               },
           ],
            'no_seri',
            //'pemesan',
            //'tanggal_pesan',
            //'tipe_barang',
            //'tipe_container',
            //'no_seri',
            //'harga_jual',
            //'biaya_produksi',
            //'biaya_maintenance',
            //'biaya_lainnya',
            //'status',
            [
               'label'  => 'Status',
               'value'  => function ($data) {
                   return $data->getStatus($data['status']);
               },
               'format' => 'raw',
           ],
            //'tanggal_pengiriman',
            'invoice_no',

            ['class' => 'yii\grid\ActionColumn',
              'template' => '{view} {update}',
            ],
        ],
    ]); ?>
</div>

<?php

    Modal::begin([
            'header' => '<h4>Pilih Produk</h4>',
            'id'     => 'model',
            'size'   => 'model-lg',
    ]);

    echo "<div id='modelContent'></div>";

    Modal::end();

?>

<?php
$this->registerJs(
  "$('#modelButton').click(function(){
      $('.modal').modal('show')
          .find('#modelContent')
          .load($(this).attr('value'));
  });"
  );
 ?>
