<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_selling_order".
 *
 * @property int $id
 * @property int $order_detail_id
 * @property string $no_spk
 * @property string $proyek
 * @property string $no_po
 * @property string $pemesan
 * @property string $tanggal_pesan
 * @property int $tipe_barang
 * @property int $tipe_container
 * @property string $no_seri
 * @property string $harga_jual
 * @property string $biaya_produksi
 * @property string $biaya_maintenance
 * @property string $biaya_lainnya
 * @property int $status
 * @property string $tanggal_pengiriman
 * @property string $invoice_no
 * @property string $alokasi_biaya_maintenance
 * @property string $description
 * @property string $tanggal_bayar
 */
class SellingOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_selling_order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_detail_id', 'tipe_barang', 'tipe_container', 'harga_jual', 'biaya_produksi', 'biaya_maintenance', 'biaya_lainnya', 'status', 'alokasi_biaya_maintenance'], 'default', 'value' => null],
            [['order_detail_id', 'tipe_barang', 'tipe_container', 'harga_jual', 'biaya_produksi', 'biaya_maintenance', 'biaya_lainnya', 'status', 'alokasi_biaya_maintenance'], 'integer'],
            [['tanggal_pesan', 'tanggal_pengiriman', 'tanggal_bayar'], 'safe'],
            [['tipe_barang', 'no_seri', 'harga_jual', 'tanggal_pesan', 'tanggal_pengiriman', 'pemesan'], 'required'],
            [['no_spk', 'no_po'], 'string', 'max' => 200],
            [['proyek', 'pemesan'], 'string', 'max' => 250],
            [['no_seri', 'invoice_no'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_detail_id' => 'Order Detail ID',
            'no_spk' => 'No Spk',
            'proyek' => 'Proyek',
            'no_po' => 'No Po',
            'pemesan' => 'Pemesan',
            'tanggal_pesan' => 'Tanggal Pesan',
            'tipe_barang' => 'Tipe Barang',
            'tipe_container' => 'Tipe Container',
            'no_seri' => 'No Seri',
            'harga_jual' => 'Harga Jual',
            'biaya_produksi' => 'Biaya Produksi',
            'biaya_maintenance' => 'Biaya Maintenance',
            'biaya_lainnya' => 'Biaya Lainnya',
            'status' => 'Status',
            'tanggal_pengiriman' => 'Tanggal Pengiriman',
            'invoice_no' => 'Invoice No',
            'alokasi_biaya_maintenance' => 'Alokasi Biaya Maintenance',
            'description' => 'Keterangan',
            'tanggal_bayar' => 'Tanggal Bayar',
        ];
    }

    public function getTipeContainer($val){
      $model = Lookup::find()->where(['lookup_name' => 'tipe_container', 'lookup_code' => $val])->one();
  		return $model?$model->lookup_value:'';
  	}

    public function getTipeProduct($val){
      $model = Lookup::find()->where(['lookup_name' => 'tipe_product', 'lookup_code' => $val])->one();
  		return $model?$model->lookup_value:'';
  	}

    public function getStatus($val)
    {
        $ret = "";
        if ($val==1) {  $ret = "<span class='pull-left badge bg-red'>Piutang</span>"; }
        if ($val==2) {  $ret = "<span class='pull-left badge bg-green'>Payed</span>"; }
        return $ret;
    }

    public function showHide($val) {
        $ret = false;
        $ret['no_spk'] = $ret['biaya_produksi'] = $ret['alokasi_biaya_maintenance'] =  $ret['biaya_maintenance'] =  "display:none;";

        if ($val == 0) { //Dry (DW)
          $ret['no_spk'] 	= 'display:none;';
          $ret['biaya_produksi'] = 'display:none;';
          $ret['alokasi_biaya_maintenance'] 	= 'display:none;';
          $ret['biaya_maintenance'] 	= 'display:none;';
        } else {
          $ret['no_spk'] 	= 'display:block;';
          $ret['biaya_produksi'] = 'display:block;';
          $ret['alokasi_biaya_maintenance'] 	= 'display:block;';
          $ret['biaya_maintenance'] 	= 'display:block;';
        }

        return $ret;
    }
}
