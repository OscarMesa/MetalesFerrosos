<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "campo_composicion_quimica".
 *
 * @property integer $id
 * @property string $nombre_campo
 */
class CampoComposicionQuimica extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'campo_composicion_quimica';
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
            'id' => Yii::t('app', 'ID'),
            'nombre_campo' => Yii::t('app', 'Nombre Campo'),
        ];
    }

    /**
     * @inheritdoc
     * @return CampoComposicionQuimicaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CampoComposicionQuimicaQuery(get_called_class());
    }
}
