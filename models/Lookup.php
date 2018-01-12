<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_lookup".
 *
 * @property string $lookup_name
 * @property int $lookup_code
 * @property string $lookup_value
 * @property string $remark
 */
class Lookup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_lookup';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lookup_name', 'lookup_code'], 'required'],
            [['lookup_code'], 'default', 'value' => null],
            [['lookup_code'], 'integer'],
            [['lookup_name'], 'string', 'max' => 100],
            [['lookup_value'], 'string', 'max' => 400],
            [['remark'], 'string', 'max' => 200],
            [['lookup_name', 'lookup_code'], 'unique', 'targetAttribute' => ['lookup_name', 'lookup_code']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'lookup_name' => 'Lookup Name',
            'lookup_code' => 'Lookup Code',
            'lookup_value' => 'Lookup Value',
            'remark' => 'Remark',
        ];
    }
}
