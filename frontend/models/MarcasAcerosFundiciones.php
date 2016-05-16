<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "marcas_aceros_fundiciones".
 *
 * @property integer $id
 * @property string $marcas_aceros_fundiciones
 * @property integer $id_subtipo_metal
 *
 * @property CaracteristicaMarca[] $caracteristicaMarcas
 * @property SubtipoMetales $idSubtipoMetal
 */
class MarcasAcerosFundiciones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'marcas_aceros_fundiciones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_subtipo_metal'], 'integer'],
            [['marcas_aceros_fundiciones'], 'string', 'max' => 255],
            [['id_subtipo_metal'], 'exist', 'skipOnError' => true, 'targetClass' => SubtipoMetales::className(), 'targetAttribute' => ['id_subtipo_metal' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'marcas_aceros_fundiciones' => 'Marcas Aceros Fundiciones',
            'id_subtipo_metal' => 'Id Subtipo Metal',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCaracteristicaMarcas()
    {
        return $this->hasMany(CaracteristicaMarca::className(), ['id_marca' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSubtipoMetal()
    {
        return $this->hasOne(SubtipoMetales::className(), ['id' => 'id_subtipo_metal']);
    }

    /**
     * @inheritdoc
     * @return MarcasAcerosFundicionesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MarcasAcerosFundicionesQuery(get_called_class());
    }
}
