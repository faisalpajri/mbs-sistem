<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Driver */

$this->title = 'Driver : '.$model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Drivers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="driver-view">

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
            'nama',
            //'level',
            [
               'label'  => 'level',
               'value'  => function ($data) {
                   return ($data['level']==1) ? 'Sopir' : 'Kenek';
               },
           ],
            'no_ktp',
            'no_sim',
            //'status',
            'penempatan',
            'no_telpon',
            //'status_kontrak',
        ],
    ]) ?>

</div>
