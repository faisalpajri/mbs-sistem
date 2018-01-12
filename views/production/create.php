<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Production */

$this->title = 'Create Production';
$this->params['breadcrumbs'][] = ['label' => 'Productions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="production-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
