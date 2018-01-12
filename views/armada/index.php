<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Armadas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="armada-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a('Create Armada', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'no_plat',
            //'no_mesin',
            //'no_rangka',
            //'no_bpkb',
            'merk',
            //'jenis',
            'model',
            'tipe',
            'tahun',
            //'asal_pembelian',
            //'status_kepemilikan',
            //'leasing_bank',
            //'sistem_bayar',
            //'lama_bulan_angsuran',
            'tanggal_jatuh_tempo',
            'tanggal_stnk',
            'tanggal_kir',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
