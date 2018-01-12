<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_contractor".
 *
 * @property int $id
 * @property string $nama
 * @property string $no_telepon
 * @property int $status
 */
class Contractor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_contractor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['status'], 'default', 'value' => null],
            [['status'], 'integer'],
            [['nama'], 'string', 'max' => 200],
            [['no_telepon'], 'string', 'max' => 20],
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
            'no_telepon' => 'No Telepon',
            'status' => 'Status',
        ];
    }
}
