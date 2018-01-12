<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_armada".
 *
 * @property int $id
 * @property string $no_plat
 * @property string $no_mesin
 * @property string $no_rangka
 * @property string $no_bpkb
 * @property string $merk
 * @property string $jenis
 * @property string $model
 * @property string $tipe
 * @property string $tahun
 * @property string $asal_pembelian
 * @property int $status_kepemilikan
 * @property string $leasing_bank
 * @property string $sistem_bayar
 * @property int $lama_bulan_angsuran
 * @property int $tanggal_jatuh_tempo
 * @property string $tanggal_stnk
 * @property string $tanggal_kir
 */
class Armada extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_armada';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no_plat', 'no_mesin'], 'required'],
            [['status_kepemilikan', 'lama_bulan_angsuran', 'tanggal_jatuh_tempo'], 'default', 'value' => null],
            [['status_kepemilikan', 'lama_bulan_angsuran', 'tanggal_jatuh_tempo'], 'integer'],
            [['tanggal_stnk', 'tanggal_kir'], 'safe'],
            [['no_plat', 'no_mesin', 'no_rangka', 'no_bpkb'], 'string', 'max' => 200],
            [['merk', 'tipe', 'asal_pembelian', 'leasing_bank', 'sistem_bayar'], 'string', 'max' => 250],
            [['jenis', 'model'], 'string', 'max' => 100],
            [['tahun'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no_plat' => 'No Plat',
            'no_mesin' => 'No Mesin',
            'no_rangka' => 'No Rangka',
            'no_bpkb' => 'No Bpkb',
            'merk' => 'Merk',
            'jenis' => 'Jenis',
            'model' => 'Model',
            'tipe' => 'Tipe',
            'tahun' => 'Tahun',
            'asal_pembelian' => 'Asal Pembelian',
            'status_kepemilikan' => 'Status Kepemilikan',
            'leasing_bank' => 'Leasing Bank',
            'sistem_bayar' => 'Sistem Bayar',
            'lama_bulan_angsuran' => 'Lama Bulan Angsuran',
            'tanggal_jatuh_tempo' => 'Tanggal Jatuh Tempo',
            'tanggal_stnk' => 'Tanggal Stnk',
            'tanggal_kir' => 'Tanggal Kir',
        ];
    }

    public function setStsKepemilikan($val) {

            $stsKepemilikan = '';
            if ($val==1) { $stsKepemilikan = 'Hak Milik'; }
        		if ($val==2) { $stsKepemilikan = 'Loan'; }
        		if ($val==3) { $stsKepemilikan = 'Rental'; }
        		return $stsKepemilikan;
    }
}
