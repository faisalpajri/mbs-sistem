<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Armada */

$this->title = 'Armada : ' .$model->no_plat;
$this->params['breadcrumbs'][] = ['label' => 'Armadas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="armada-view">

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
            'no_plat',
            'no_mesin',
            'no_rangka',
            'no_bpkb',
            'merk',
            'jenis',
            'model',
            'tipe',
            'tahun',
            'asal_pembelian',
            //'status_kepemilikan',
            [
               'label'  => 'status_kepemilikan',
               'value'  => function ($data) {
                   return $data->setStsKepemilikan($data['status_kepemilikan']);
               },
           ],
            'leasing_bank',
            'sistem_bayar',
            'lama_bulan_angsuran',
            'tanggal_jatuh_tempo',
            'tanggal_stnk',
            'tanggal_kir',
        ],
    ]) ?>

</div>
