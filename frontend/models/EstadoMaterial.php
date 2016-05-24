<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estado_material".
 *
 * @property integer $id
 * @property string $tipo_caracteristica
 *
 * @property CaracteristicaMarca[] $caracteristicaMarcas
 */
class EstadoMaterial extends \yii\db\ActiveRecord
{
    const LAMINADO_EN_CALIENTE = 1;
    const CALIBRADO = 2;
    const TRATAMIENTO_TERMICO = 3;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estado_material';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo_caracteristica'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipo_caracteristica' => 'Tipo Caracteristica',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCaracteristicaMarcas()
    {
        return $this->hasMany(CaracteristicaMarca::className(), ['id_estado_material' => 'id']);
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
