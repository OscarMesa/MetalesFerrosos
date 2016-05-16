<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%subtipo_metales}}".
 *
 * @property integer $id
 * @property integer $id_tipo_metal
 * @property string $subtipo_metal
 *
 * @property MarcasAcerosFundiciones[] $marcasAcerosFundiciones
 * @property TipoMetales $idTipoMetal
 */
class SubtipoMetales extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%subtipo_metales}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tipo_metal'], 'integer'],
            [['subtipo_metal'], 'string', 'max' => 255],
            [['id_tipo_metal'], 'exist', 'skipOnError' => true, 'targetClass' => TipoMetales::className(), 'targetAttribute' => ['id_tipo_metal' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_tipo_metal' => 'Id Tipo Metal',
            'subtipo_metal' => 'Subtipo Metal',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarcasAcerosFundiciones()
    {
        return $this->hasMany(MarcasAcerosFundiciones::className(), ['id_subtipo_metal' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipoMetal()
    {
        return $this->hasOne(TipoMetales::className(), ['id' => 'id_tipo_metal']);
    }

    /**
     * @inheritdoc
     * @return TipoMetalesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TipoMetalesQuery(get_called_class());
    }
}
