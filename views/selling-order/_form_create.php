<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\jui\DatePicker;
use app\models\Lookup;
use app\models\Container;
use app\models\SellingOrder;
use yii\helpers\ArrayHelper;
use conquer\select2\Select2Widget;
use kartik\select2\Select2;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model app\models\SellingOrder */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="form">
<div class="selling-form box box-primary">

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
    ],'action' => ['selling-order/selling']]);
    ?>

    <div class="box-body ">
      <?php
	     $retstyle = SellingOrder::showHide($model->tipe_barang);
      ?>

    <!-- <?= $form->field($model, 'order_detail_id')->textInput() ?> -->

    <?php $tipe_product = 'tipe_product';
        $tipe = Lookup::find()->where(['lookup_name' => $tipe_product])->all();
        $list=ArrayHelper::map($tipe,'lookup_code','lookup_value'); ?>

    <div class="form-group">
      <?= $form->field($model, 'tipe_barang')->dropDownList($list); ?>
    </div>

    <div class="form-group" style="<?php echo $retstyle['no_spk']; ?>">
      <?= $form->field($model, 'no_spk', [
          'horizontalCssClasses' => [
              'wrapper' => 'col-sm-4',
          ]
      ])->textInput() ?>
  </div>

  <div class="form-group">
    <?= $form->field($model, 'proyek', [
    'horizontalCssClasses' => [
        'wrapper' => 'col-sm-4',
          ]
      ])->textInput(['maxlength' => true]) ?>
  </div>

  <div class="form-group">
    <?= $form->field($model, 'no_po', [
    'horizontalCssClasses' => [
        'wrapper' => 'col-sm-4',
    ]
    ])->textInput(['maxlength' => true]) ?>
  </div>

  <div class="form-group">
    <?= $form->field($model, 'pemesan', [
    'horizontalCssClasses' => [
        'wrapper' => 'col-sm-4',
        ]
    ])->textInput(['maxlength' => true]) ?>
  </div>

  <div class="form-group">
    <?= $form->field($model, 'tanggal_pesan')->widget(DatePicker::className(), [
        //'language' => 'ru',
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>
  </div>

  <div class="form-group">
    <?= $form->field($model, 'tipe_container')->dropDownList(['1' => '20 Feet', '2' => '40 Feet', '3' => '20 Feet HC', '4' => '40 Feet HC']); ?>
  </div>

  <div class="form-group">
    <?= $form->field($model, 'no_seri')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Container::find()->all(), 'no_seri', 'no_seri'),
        'language' => 'de',
        'options' => ['placeholder' => 'Select Kontainer'],
        'pluginOptions' => [
            'allowClear' => true
            ],
        ]); ?>
  </div>

  <div class="form-group">
    <?= $form->field($model, 'harga_jual')->widget(MaskedInput::className(), [
    'clientOptions' => [
        'alias' => 'numeric',
        'allowMinus'=>false,
        'groupSeparator' => ',',
        'removeMaskOnSubmit' => true,
        'autoGroup' => true
          ],
      ]); ?>
  </div>

    <div class="form-group" style="<?php echo $retstyle['biaya_produksi']; ?>">
    <?= $form->field($model, 'biaya_produksi')->hint('(Harga Kontainer + Biaya Material + Biaya Pengerjaan)')->widget(MaskedInput::className(), [
        'clientOptions' => [
            'alias' => 'numeric',
            'allowMinus'=>false,
            'groupSeparator' => ',',
            'removeMaskOnSubmit' => true,
            'autoGroup' => true
        ],
      ]); ?>
    </div>

    <div class="form-group" style="<?php echo $retstyle['alokasi_biaya_maintenance']; ?>">
    <?= $form->field($model, 'alokasi_biaya_maintenance')->widget(MaskedInput::className(), [
    'clientOptions' => [
        'alias' => 'numeric',
        'allowMinus'=>false,
        'groupSeparator' => ',',
        'removeMaskOnSubmit' => true,
        'autoGroup' => true
        ],
    ]); ?>
  </div>

    <div class="form-group" style="<?php echo $retstyle['biaya_maintenance']; ?>">
    <?= $form->field($model, 'biaya_maintenance')->widget(MaskedInput::className(), [
        'clientOptions' => [
            'alias' => 'numeric',
            'allowMinus'=>false,
            'groupSeparator' => ',',
            'removeMaskOnSubmit' => true,
            'autoGroup' => true
            ],
    ]); ?>
  </div>

  <div class="form-group">
    <?= $form->field($model, 'biaya_lainnya')->widget(MaskedInput::className(), [
        'clientOptions' => [
            'alias' => 'numeric',
            'allowMinus'=>false,
            'groupSeparator' => ',',
            'removeMaskOnSubmit' => true,
            'autoGroup' => true
            ],
    ]); ?>
  </div>

  <div class="form-group">
    <?= $form->field($model, 'status')->dropDownList(['1' => 'Piutang', '2' => 'Payed']); ?>
  </div>

  <div class="form-group">
    <?= $form->field($model, 'tanggal_pengiriman')->widget(DatePicker::className(), [
        //'language' => 'ru',
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>
  </div>

  <div class="form-group">
    <?= $form->field($model, 'invoice_no', [
    'horizontalCssClasses' => [
        'wrapper' => 'col-sm-4',
    ]
    ])->textInput(['maxlength' => true]) ?>
  </div>  

  <div class="form-group">
    <?= $form->field($model, 'tanggal_bayar')->widget(DatePicker::className(), [
        //'language' => 'ru',
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>
  </div>

  <div class="form-group">
    <?= $form->field($model, 'description')->textarea(array('rows'=>2,'cols'=>5)); ?>
  </div>

  </div>
  <div class="box-footer">
      <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat', 'value'=>'submit']) ?>
  </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
