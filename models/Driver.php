<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "tb_driver".
 *
 * @property int $id
 * @property string $nama
 * @property int $level
 * @property string $no_ktp
 * @property string $no_sim
 * @property int $status
 * @property string $penempatan
 * @property string $no_telpon
 * @property int $status_kontrak
 */
class Driver extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_driver';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['level', 'status', 'status_kontrak'], 'default', 'value' => null],
            [['level', 'status', 'status_kontrak'], 'integer'],
            [['nama', 'penempatan'], 'string', 'max' => 250],
            [['no_ktp', 'no_sim'], 'string', 'max' => 200],
            [['no_telpon'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'level' => 'Level',
            'no_ktp' => 'No Ktp',
            'no_sim' => 'No Sim',
            'status' => 'Status',
            'penempatan' => 'Penempatan',
            'no_telpon' => 'No Telpon',
            'status_kontrak' => 'Status Kontrak',
        ];
    }

    public static function getAllDrivers()
    {
        $drivers = self::find()->asArray()->all();
        $items = ArrayHelper::map($drivers, 'id', 'nama');
        return $items;
    }
}
