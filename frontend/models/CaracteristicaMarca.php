<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "caracteristica_marca".
 *
 * @property integer $id
 * @property integer $id_marca
 * @property integer $id_campo
 * @property integer $id_estado_material
 * @property double $valor1
 * @property double $valor2
 *
 * @property MarcasAcerosFundiciones $idMarca
 * @property CampoCaracteristica $idCampo
 * @property EstadoMaterial $idEstadoMaterial
 */
class CaracteristicaMarca extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'caracteristica_marca';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_marca', 'id_campo', 'id_estado_material'], 'integer'],
            [['valor1', 'valor2'], 'number'],
            [['id_marca'], 'exist', 'skipOnError' => true, 'targetClass' => MarcasAcerosFundiciones::className(), 'targetAttribute' => ['id_marca' => 'id']],
            [['id_campo'], 'exist', 'skipOnError' => true, 'targetClass' => CampoCaracteristica::className(), 'targetAttribute' => ['id_campo' => 'id']],
            [['id_estado_material'], 'exist', 'skipOnError' => true, 'targetClass' => EstadoMaterial::className(), 'targetAttribute' => ['id_estado_material' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_marca' => 'Marca',
            'id_campo' => 'Campo',
            'id_estado_material' => 'Estado Material',
            'valor1' => 'Valor1',
            'valor2' => 'Valor2',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMarca()
    {
        return $this->hasOne(MarcasAcerosFundiciones::className(), ['id' => 'id_marca']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCampo()
    {
        return $this->hasOne(CampoCaracteristica::className(), ['id' => 'id_campo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEstadoMaterial()
    {
        return $this->hasOne(EstadoMaterial::className(), ['id' => 'id_estado_material']);
    }

    /**
     * @inheritdoc
     * @return CaracteristicaMarcaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CaracteristicaMarcaQuery(get_called_class());
    }
}
