<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Driver */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="container-form box box-primary">

  <?php $form = ActiveForm::begin(['layout' => 'horizontal',
    'fieldConfig' => [
        'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
        'horizontalCssClasses' => [
            'label' => 'col-sm-1',
            'offset' => 'col-sm-offset-2',
            'wrapper' => 'col-sm-4',
            'error' => '',
            'hint' => '',
        ],
    ],]); ?>

<div class="box-body ">
    <?= $form->field($model, 'nama', [
    'horizontalCssClasses' => [
        'wrapper' => 'col-sm-3',
    ]
])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'level')->dropDownList(['1' => 'Sopir', '2' => 'Kenek']); ?>

    <?= $form->field($model, 'no_ktp', [
    'horizontalCssClasses' => [
        'wrapper' => 'col-sm-3',
    ]
])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_sim', [
    'horizontalCssClasses' => [
        'wrapper' => 'col-sm-3',
    ]
])->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'status')->textInput() ?> -->

    <?= $form->field($model, 'penempatan', [
    'horizontalCssClasses' => [
        'wrapper' => 'col-sm-4',
    ]
])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_telpon', [
    'horizontalCssClasses' => [
        'wrapper' => 'col-sm-3',
    ]
])->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'status_kontrak', [
    'horizontalCssClasses' => [
        'wrapper' => 'col-sm-4',
    ]
])->textInput() ?> -->

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
