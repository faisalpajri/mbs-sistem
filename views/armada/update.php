<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Armada */

$this->title = 'Update Armada: '.$model->no_plat;
$this->params['breadcrumbs'][] = ['label' => 'Armadas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="armada-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
