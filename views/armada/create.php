<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Armada */

$this->title = 'Create Armada';
$this->params['breadcrumbs'][] = ['label' => 'Armadas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="armada-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
