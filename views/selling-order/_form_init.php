<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\jui\DatePicker;
use app\models\Lookup;
use app\models\Container;
use yii\helpers\ArrayHelper;
use conquer\select2\Select2Widget;
use kartik\select2\Select2;
use yii\widgets\MaskedInput;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model app\models\SellingOrder */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="selling-form box box-primary">

  <?php $form = ActiveForm::begin(['layout' => 'horizontal',
    'fieldConfig' => [
        'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
        'horizontalCssClasses' => [
            'label' => 'col-sm-2',
            'offset' => 'col-sm-offset-2',
            'wrapper' => 'col-sm-8',
            'error' => '',
            'hint' => '',
        ],
    ],]);
    ?>

    <div class="box-body ">

    <!-- <?= $form->field($model, 'order_detail_id')->textInput() ?> -->

    <?= $form->field($model, 'no_seri')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Container::find()->where(['status' => [2,4]])->all(), 'no_seri', 'fullName', 'tipes.lookup_value'),
        'options' => ['placeholder' => 'Select Kontainer', 'dir' => 'rtl'],
        // 'pluginEvents' =>  [
        //     'change' => "function(e) { alert($(this).text()); }"
        // ],
        'pluginOptions' => [
            'allowClear' => true,
            //'templateResult' => new JsExpression('function (data) { return "<div style='color:green'>" . data.text . "</div>"; }'),
            //'templateSelection' => new JsExpression('function (data) { return data.text; }')
        ],
    ]); ?>

    <!-- <?php $tipe_product = 'tipe_product';
        $tipe = Lookup::find()->where(['lookup_name' => $tipe_product])->all();
        $list=ArrayHelper::map($tipe,'lookup_code','lookup_value'); ?>

    <?= $form->field($model, 'tipe_barang')->dropDownList($list); ?> -->

    <?= $form->field($model, 'harga_jual')->widget(MaskedInput::className(), [
    'clientOptions' => [
        'alias' => 'numeric',
        'allowMinus'=>false,
        'groupSeparator' => ',',
        'removeMaskOnSubmit' => true,
        'autoGroup' => true
    ],
]); ?>

    <?= $form->field($model, 'status')->dropDownList(['1' => 'Piutang', '2' => 'Payed']); ?>

    <?= $form->field($model, 'tanggal_pengiriman')->widget(DatePicker::className(), [
        //'language' => 'ru',
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>

    <?= $form->field($model, 'invoice_no', [
    'horizontalCssClasses' => [
        'wrapper' => 'col-sm-4',
    ]
    ])->textInput(['maxlength' => true]) ?>

  </div>
  <div class="box-footer">
      <?= Html::submitButton('Lanjutkan', ['class' => 'btn btn-success btn-flat']) ?>
      <!-- <?= Html::submitButton('Lanjutkan', ['class' => 'btn btn-primary', 'value'=>'init', 'name'=>'submit']) ?> -->
  </div>

    <?php ActiveForm::end(); ?>

</div>
