<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "campo_caracteristica".
 *
 * @property integer $id
 * @property string $nombre_campo
 *
 * @property CaracteristicaMarca[] $caracteristicaMarcas
 */
class CampoCaracteristica extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'campo_caracteristica';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre_campo'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre_campo' => 'Nombre Campo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCaracteristicaMarcas()
    {
        return $this->hasMany(CaracteristicaMarca::className(), ['id_campo' => 'id']);
    }

    /**
     * @inheritdoc
     * @return CampoCaracteristicaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CampoCaracteristicaQuery(get_called_class());
    }
}
