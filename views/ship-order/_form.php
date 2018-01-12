<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\jui\DatePicker;
use app\models\Armada;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\ShipOrder */
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
    ],]);

    //use app\models\Armada;
    $armada=Armada::find()->all();

    //use yii\helpers\ArrayHelper;
    $listData=ArrayHelper::map($armada,'id','no_plat');
    ?>

<div class="box-body ">

    <?= $form->field($model, 'armada_no')
        ->listBox($listData)
        /* or, you may use a checkbox list instead */
        /* ->checkboxList($categories) */
        ->hint('Select Armada.');
    ?>

    <?= $form->field($model, 'order_name', [
    'horizontalCssClasses' => [
        'wrapper' => 'col-sm-4',
    ]
])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'driver')
    ->listBox($drivers)
    /* or, you may use a checkbox list instead */
    /* ->checkboxList($categories) */
    ->hint('Select Driver.');
?>

    <?= $form->field($model, 'ship_from', [
    'horizontalCssClasses' => [
        'wrapper' => 'col-sm-3',
    ]
])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ship_to', [
    'horizontalCssClasses' => [
        'wrapper' => 'col-sm-3',
    ]
])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'item', [
    'horizontalCssClasses' => [
        'wrapper' => 'col-sm-3',
    ]
])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ammount')->textInput() ?>

    <?= $form->field($model, 'order_date')->widget(DatePicker::className(), [
        //'language' => 'ru',
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>

    <?= $form->field($model, 'shiping_date')->widget(DatePicker::className(), [
        //'language' => 'ru',
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>

    <?= $form->field($model, 'status')->dropDownList(['1' => 'Order', '2' => 'Cancel', '3' => 'Piutang', '4' => 'Payed']); ?>

    <?= $form->field($model, 'invoice_no', [
    'horizontalCssClasses' => [
        'wrapper' => 'col-sm-3',
    ]
])->textInput(['maxlength' => true]) ?>

  </div>
  <div class="box-footer">
      <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
  </div>

    <?php ActiveForm::end(); ?>

</div>
