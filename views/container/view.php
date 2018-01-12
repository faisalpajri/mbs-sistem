<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\helpers\FormatHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Container */

$this->title = 'Kontainer : '.$model->no_seri;
$this->params['breadcrumbs'][] = ['label' => 'Containers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-view box box-primary">
    <div class="box-header">
        <?= Html::a('Update', ['update', 'id' => $model->contianer_id], ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->contianer_id], [
            'class' => 'btn btn-danger btn-flat',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'contianer_id',
                //'tipe',
                [
                   'label'  => 'tipe',
                   'value'  => function ($data) {
                       return $data->getTipeContainer($data['tipe']);
                   },
               ],
                'no_seri',
                'kondisi',
                //'status',
                //'ammount',
                [
                   'label'  => 'Harga',
                   'value'  => function ($data) {
                       return FormatHelper::getNumericMoney($data['ammount']);
                   },
               ],
                [
                   'label'  => 'status',
                   'value'  => function ($data) {
                       return $data->getStsContainer($data['status']);
                   },
               ],
                'supplier',
                'no_po',
                'tanggal_terima',
            ],
        ]) ?>
    </div>
</div>
