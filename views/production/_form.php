<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\jui\DatePicker;
use app\models\Contractor;
use app\models\Lookup;
use app\models\Container;
use yii\helpers\ArrayHelper;
use conquer\select2\Select2Widget;
use kartik\select2\Select2;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model app\models\Production */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="production-form box box-primary">

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
    ],]);

    //use app\models\Contractor;
    $contractor=Contractor::find()->all();

    //use yii\helpers\ArrayHelper;
    $listData=ArrayHelper::map($contractor,'id','nama');
    ?>

    <div class="box-body ">

    <?= $form->field($model, 'no_spk', [
    'horizontalCssClasses' => [
        'wrapper' => 'col-sm-4',
    ]
])->textInput() ?>

    <?= $form->field($model, 'proyek', [
    'horizontalCssClasses' => [
        'wrapper' => 'col-sm-4',
    ]
])->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'order_date')->textInput() ?> -->

    <?= $form->field($model, 'order_date')->widget(DatePicker::className(), [
        //'language' => 'ru',
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>

    <?= $form->field($model, 'no_po', [
    'horizontalCssClasses' => [
        'wrapper' => 'col-sm-4',
    ]
])->textInput(['maxlength' => true]) ?>

<?php $tipe_product = 'tipe_product';
    $tipe = Lookup::find()->where(['lookup_name' => $tipe_product])->andWhere(['<>','lookup_code', 0])->all();
    $list=ArrayHelper::map($tipe,'lookup_code','lookup_value'); ?>

    <?= $form->field($model, 'tipe_product')->dropDownList($list); ?>

    <?= $form->field($model, 'pemesan', [
    'horizontalCssClasses' => [
        'wrapper' => 'col-sm-4',
    ]
])->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'tanggal_produksi')->textInput() ?> -->

    <?= $form->field($model, 'tanggal_produksi')->widget(DatePicker::className(), [
        //'language' => 'ru',
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>

    <?= $form->field($model, 'tempo_hari', [
    'horizontalCssClasses' => [
        'wrapper' => 'col-sm-2',
    ]
])->textInput() ?>

    <?= $form->field($model, 'contractor_id')
        ->listBox($listData)
        /* or, you may use a checkbox list instead */
        /* ->checkboxList($categories) */
        ->hint('Select Kontraktor.');
    ?>

    <!-- <?= $form->field($model, 'order_detail_id')->textInput() ?> -->

    <!-- <?= $form->field($model, 'tipe_kontainer')->dropDownList(['1' => '20 Feet', '2' => '40 Feet', '3' => '20 Feet HC', '4' => '40 Feet HC']); ?> -->

    <?php
        $data = ArrayHelper::map(Container::find()->where(['status' => 2])->all(), 'no_seri', 'no_seri', 'tipes.lookup_value');
        if(!$model->isNewRecord) {
          $data = array_merge($data, ArrayHelper::map(Container::find(['no_seri' => $model->no_seri_kontainer])->all(), 'no_seri', 'no_seri', 'tipes.lookup_value'));
        }
     ?>

<?=

    $form->field($model, 'no_seri_kontainer')->widget(Select2::classname(), [
    //'data' => ArrayHelper::map(Container::find()->select(['no_seri','concat(no_seri,tipe) as value'])->all(), 'no_seri', 'value'),
        //'data' => Container::find()->select(['no_seri','concat(no_seri,tipe) as value'])->asArray()->all(),
    'data' => $data,
    //'data' => ArrayHelper::map(Container::find()->where(['status' => 2])->all(), 'no_seri', 'no_seri', 'tipes.lookup_value'),
    'options' => ['placeholder' => 'Select Kontainer'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]); ?>



    <?= $form->field($model, 'estimasi_material')->widget(MaskedInput::className(), [
    'clientOptions' => [
        'alias' => 'numeric',
        'allowMinus'=>false,
        'groupSeparator' => ',',
        'removeMaskOnSubmit' => true,
        'autoGroup' => true
    ],
]); ?>

<?= $form->field($model, 'realisasi_material')->widget(MaskedInput::className(), [
'clientOptions' => [
    'alias' => 'numeric',
    'allowMinus'=>false,
    'groupSeparator' => ',',
    'removeMaskOnSubmit' => true,
    'autoGroup' => true
],
]); ?>

<?= $form->field($model, 'biaya_pengerjaan')->widget(MaskedInput::className(), [
'clientOptions' => [
    'alias' => 'numeric',
    'allowMinus'=>false,
    'groupSeparator' => ',',
    'removeMaskOnSubmit' => true,
    'autoGroup' => true
],
]); ?>

    <?= $form->field($model, 'status')->dropDownList(['1' => 'On Progress', '2' => 'Done']); ?>

  </div>
  <div class="box-footer">
      <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
  </div>

    <?php ActiveForm::end(); ?>

</div>



<?php
$this->registerJs(
  "

  $(document).ready(function(){
  function setCurrency (currency) {
      if (!currency.id) { return currency.text; }
      return $('<strong></strong>')
      .text(currency.text);
    };})"
);
 ?>
