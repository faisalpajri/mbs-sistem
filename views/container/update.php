<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Container */

$this->title = 'Update Container: ' . $model->no_seri;
$this->params['breadcrumbs'][] = ['label' => 'Containers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->contianer_id, 'url' => ['view', 'id' => $model->contianer_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="container-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
