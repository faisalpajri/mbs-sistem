<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Contractor */

$this->title = 'Create Contractor';
$this->params['breadcrumbs'][] = ['label' => 'Contractors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contractor-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
