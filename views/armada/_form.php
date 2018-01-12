<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Armada */
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

    <?= $form->field($model, 'no_plat', [
    'horizontalCssClasses' => [
        'wrapper' => 'col-sm-2',
    ]
])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_mesin', [
    'horizontalCssClasses' => [
        'wrapper' => 'col-sm-3',
    ]
])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_rangka', [
    'horizontalCssClasses' => [
        'wrapper' => 'col-sm-3',
    ]
])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_bpkb', [
    'horizontalCssClasses' => [
        'wrapper' => 'col-sm-3',
    ]
])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'merk', [
    'horizontalCssClasses' => [
        'wrapper' => 'col-sm-2',
    ]
])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis', [
    'horizontalCssClasses' => [
        'wrapper' => 'col-sm-2',
    ]
])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'model', [
    'horizontalCssClasses' => [
        'wrapper' => 'col-sm-2',
    ]
])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipe', [
    'horizontalCssClasses' => [
        'wrapper' => 'col-sm-3',
    ]
])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tahun', [
    'horizontalCssClasses' => [
        'wrapper' => 'col-sm-1',
    ]
])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'asal_pembelian', [
    'horizontalCssClasses' => [
        'wrapper' => 'col-sm-3',
    ]
])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_kepemilikan')->dropDownList(['1' => 'Hak Milik', '2' => 'Loan', '3' => 'Rental']); ?>

    <?= $form->field($model, 'leasing_bank')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sistem_bayar', [
    'horizontalCssClasses' => [
        'wrapper' => 'col-sm-3',
    ]
])->textInput() ?>

    <?= $form->field($model, 'lama_bulan_angsuran')->textInput() ?>

    <?= $form->field($model, 'tanggal_jatuh_tempo')->textInput() ?>

    <?= $form->field($model, 'tanggal_stnk')->widget(DatePicker::className(), [
        //'language' => 'ru',
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>

    <?= $form->field($model, 'tanggal_kir')->widget(DatePicker::className(), [
        //'language' => 'ru',
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
