<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Container */

$this->title = 'Create Container';
$this->params['breadcrumbs'][] = ['label' => 'Containers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
