<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\jui\DatePicker;
use conquer\select2\Select2Widget;
use kartik\select2\Select2;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model app\models\Container */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="container-form box box-primary">
  <?php $form = ActiveForm::begin(['layout' => 'horizontal',
    'fieldConfig' => [
        'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
        'horizontalCssClasses' => [
            'label' => 'col-sm-2',
            'offset' => 'col-sm-offset-2',
            'wrapper' => 'col-sm-4',
            'error' => '',
            'hint' => '',
        ],
    ],]); ?>
    <div class="box-body">

        <!-- <?= $form->field($model, 'contianer_id')->textInput() ?> -->



        <?= $form->field($model, 'tipe')->dropDownList(['1' => '20 Feet', '2' => '40 Feet', '3' => '20 Feet HC', '4' => '40 Feet HC']); ?>

        <?= $form->field($model, 'no_seri', [
        'horizontalCssClasses' => [
            'wrapper' => 'col-sm-4',
        ]
    ])->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'kondisi', [
        'horizontalCssClasses' => [
            'wrapper' => 'col-sm-4',
        ]
    ])->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'status')->dropDownList(['1' => 'Order', '2' => 'In Stock', '3' => 'On Production', '4' => 'Sold']); ?> -->

    <?= $form->field($model, 'status')->dropDownList(['1' => 'Order', '2' => 'In Stock']); ?>

        <?= $form->field($model, 'supplier', [
        'horizontalCssClasses' => [
            'wrapper' => 'col-sm-4',
        ]
    ])->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'no_po', [
        'horizontalCssClasses' => [
            'wrapper' => 'col-sm-4',
        ]
    ])->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'tanggal_terima')->widget(DatePicker::className(), [
            //'language' => 'ru',
            'dateFormat' => 'yyyy-MM-dd',
        ]) ?>

        <?= $form->field($model, 'ammount')->widget(MaskedInput::className(), [
        'clientOptions' => [
            'alias' => 'numeric',
            'allowMinus'=>false,
            'groupSeparator' => ',',
            'removeMaskOnSubmit' => true,
            'autoGroup' => true
        ],
        ]); ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
