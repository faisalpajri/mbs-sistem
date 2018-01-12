<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_container".
 *
 * @property int $contianer_id
 * @property int $tipe
 * @property string $no_seri
 * @property string $kondisi
 * @property int $status
 * @property string $supplier
 * @property string $no_po
 * @property string $tanggal_terima
 * @property string $ammount
 */
class Container extends \yii\db\ActiveRecord
{

    const lookup_name = 'tipe_container';

    public $counted;
    public $tipe_con;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_container';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipe', 'status', 'ammount'], 'default', 'value' => null],
            [['tipe', 'status'], 'integer'],
            [['no_seri', 'ammount'], 'required'],
            [['tanggal_terima'], 'safe'],
            [['no_seri'], 'string', 'max' => 100],
            [['kondisi', 'supplier', 'no_po'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'contianer_id' => 'Contianer ID',
            'tipe' => 'Tipe',
            'no_seri' => 'No Seri',
            'kondisi' => 'Kondisi',
            'status' => 'Status',
            'supplier' => 'Supplier',
            'no_po' => 'No Po',
            'tanggal_terima' => 'Tanggal Terima',
            'ammount' => 'Ammount',
        ];
    }

    public function getTipeContainer($val){
      $model = Lookup::find()->where(['lookup_name' => 'tipe_container', 'lookup_code' => $val])->one();
  		return $model?$model->lookup_value:'';
  	}

  	public function getStsContainer($val){
      $model = Lookup::find()->where(['lookup_name' => 'status_container', 'lookup_code' => $val])->one();
  		return $model?$model->lookup_value:'';
  	}

    public function getTipes()
    {
        return $this->hasOne(Lookup::className(), ['lookup_code' => 'tipe'])
            ->where(['lookup_name' => Container::lookup_name]);
    }

    public function getfullName()
    {
        $produk = "";
        $modelProduksi = Production::find()->where(['no_seri_kontainer' => $this->no_seri])->one();
        if($modelProduksi) {
            //$model = Lookup::find()->where(['lookup_name' => 'tipe_product', 'lookup_code' => $modelProduksi->tipe_product])->one();
        		//$produk = $model->lookup_value;
        		$produk = Production::getTipeProduct($modelProduksi->tipe_product);
        }else {
            $produk = "Dry (CW)";
        }

        //return  $this->no_seri.' - '.$produk.' - '.$tipe;
        return  $this->no_seri.' - '.$produk. ' - ' . Container::getTipeContainer($this->tipe);
    }
}
