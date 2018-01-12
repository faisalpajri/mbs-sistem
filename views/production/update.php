<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Production */

$this->title = 'Update Production: '.$model->no_spk;
$this->params['breadcrumbs'][] = ['label' => 'Productions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="production-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
