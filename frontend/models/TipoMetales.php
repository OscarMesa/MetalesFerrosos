<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tipo_metales}}".
 *
 * @property integer $id
 * @property string $tipo_metal
 *
 * @property SubtipoMetales[] $subtipoMetales
 */
class TipoMetales extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tipo_metales}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo_metal'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipo_metal' => 'Tipo Metal',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubtipoMetales()
    {
        return $this->hasMany(SubtipoMetales::className(), ['id_tipo_metal' => 'id']);
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
