<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_production".
 *
 * @property int $id
 * @property string $no_spk
 * @property string $proyek
 * @property string $order_date
 * @property string $no_po
 * @property string $pemesan
 * @property string $tanggal_produksi
 * @property int $tempo_hari
 * @property int $contractor_id
 * @property int $order_detail_id
 * @property int $tipe_kontainer
 * @property string $no_seri_kontainer
 * @property string $estimasi_material
 * @property string $realisasi_material
 * @property string $biaya_pengerjaan
 * @property int $created_by
 * @property string $created_on
 * @property int $updated_by
 * @property string $updated_on
 * @property int $status
 * @property int $tipe_product
 */
class Production extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_production';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_date', 'tanggal_produksi', 'created_on', 'updated_on'], 'safe'],
            [['tempo_hari', 'contractor_id', 'order_detail_id', 'tipe_kontainer', 'estimasi_material', 'realisasi_material', 'biaya_pengerjaan', 'created_by', 'updated_by', 'status', 'tipe_product'], 'default', 'value' => null],
            [['tempo_hari', 'contractor_id', 'order_detail_id', 'tipe_kontainer', 'created_by', 'updated_by', 'status', 'tipe_product'], 'integer'],
            [['no_spk', 'no_po', 'no_seri_kontainer'], 'string', 'max' => 100],
            [['proyek', 'pemesan'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no_spk' => 'No SPK',
            'proyek' => 'Proyek',
            'order_date' => 'Tanggal Pesan',
            'no_po' => 'No PO',
            'pemesan' => 'Pemesan',
            'tanggal_produksi' => 'Tanggal Produksi',
            'tempo_hari' => 'Tempo (hari)',
            'contractor_id' => 'Kontraktor',
            'order_detail_id' => 'Order Detail ID',
            'tipe_kontainer' => 'Tipe Kontainer',
            'no_seri_kontainer' => 'No Kontainer',
            'estimasi_material' => 'Estimasi Material',
            'realisasi_material' => 'Realisasi Material',
            'biaya_pengerjaan' => 'Biaya Pengerjaan',
            'created_by' => 'Created By',
            'created_on' => 'Created On',
            'updated_by' => 'Updated By',
            'updated_on' => 'Updated On',
            'status' => 'Status',
            'tipe_product' => 'Tipe Product',
        ];
    }

    public function getTipeContainer($val){
      $model = Lookup::find()->where(['lookup_name' => 'tipe_container', 'lookup_code' => $val])->one();
  		return $model?$model->lookup_value:'';
  	}

    public function getStsProduction($val){
      $model = Lookup::find()->where(['lookup_name' => 'status_production', 'lookup_code' => $val])->one();
  		return $model?$model->lookup_value:'';
  	}

    public function getTipeProduct($val){
      $model = Lookup::find()->where(['lookup_name' => 'tipe_product', 'lookup_code' => $val])->one();
  		return $model?$model->lookup_value:'';
  	}

    public function getContractor()
    {
        return $this->hasOne(Contractor::className(), ['id' => 'contractor_id']);
    }

    public function getStatus($val)
    {
        $ret = "";
        if ($val==1) {  $ret = "<span class='pull-left badge bg-yellow'>On Progress</span>"; }
        if ($val==2) {  $ret = "<span class='pull-left badge bg-green'>Done</span>"; }
        return $ret;
    }

    public function getContainer()
    {
        return $this->hasOne(Container::className(), ['no_seri' => 'no_seri_kontainer']);
    }
}
