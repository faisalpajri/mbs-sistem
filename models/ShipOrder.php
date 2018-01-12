<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_ship_order".
 *
 * @property int $id
 * @property int $armada_no
 * @property string $order_name
 * @property int $driver
 * @property string $ship_from
 * @property string $ship_to
 * @property string $item
 * @property string $ammount
 * @property string $order_date
 * @property string $shiping_date
 * @property int $status
 * @property string $invoice_no
 */
class ShipOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_ship_order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['armada_no', 'order_name', 'driver'], 'required'],
            [['armada_no', 'driver', 'ammount', 'status'], 'default', 'value' => null],
            [['armada_no', 'driver', 'ammount', 'status'], 'integer'],
            [['order_date', 'shiping_date'], 'safe'],
            [['order_name'], 'string', 'max' => 200],
            [['ship_from', 'ship_to'], 'string', 'max' => 250],
            [['item', 'invoice_no'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'armada_no' => 'Armada No',
            'order_name' => 'Order Name',
            'driver' => 'Driver',
            'ship_from' => 'Ship From',
            'ship_to' => 'Ship To',
            'item' => 'Item',
            'ammount' => 'Ammount',
            'order_date' => 'Order Date',
            'shiping_date' => 'Shiping Date',
            'status' => 'Status',
            'invoice_no' => 'Invoice No',
        ];
    }

    public function getDrivers()
    {
        return $this->hasOne(Driver::className(), ['id' => 'driver']);
    }

  	public function getDriverName(){
  		$model=$this->drivers;
  		return $model?$model->nama:'';
  	}

    public function getArmada()
    {
        return $this->hasOne(Armada::className(), ['id' => 'armada_no']);
    }

  	public function getArmadaNo(){
  		$model=$this->armada;
  		return $model?$model->no_plat:'';
  	}

    public function setStsShipping($val) {

            $sts = '';
            if ($val==1) { $sts = 'Order'; }
        		if ($val==2) { $sts = 'Cancel'; }
        		if ($val==3) { $sts = 'Piutang'; }
        		if ($val==4) { $sts = 'Payed'; }
        		return $sts;
    }
}
