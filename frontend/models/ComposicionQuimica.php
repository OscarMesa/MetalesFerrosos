<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "composicion_quimica".
 *
 * @property integer $id
 * @property integer $id_marca
 * @property integer $id_campo_composicion
 * @property double $min
 * @property double $max
 *
 * @property CampoComposicionQuimica $idCampoComposicion
 * @property MarcasAcerosFundiciones $idMarca
 */
class ComposicionQuimica extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'composicion_quimica';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_marca', 'id_campo_composicion'], 'integer'],
            [['id_campo_composicion'], 'required'],
            [['min', 'max'], 'number'],
            [['id_campo_composicion'], 'exist', 'skipOnError' => true, 'targetClass' => CampoComposicionQuimica::className(), 'targetAttribute' => ['id_campo_composicion' => 'id']],
            [['id_marca'], 'exist', 'skipOnError' => true, 'targetClass' => MarcasAcerosFundiciones::className(), 'targetAttribute' => ['id_marca' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_marca' => Yii::t('app', 'Id Marca'),
            'id_campo_composicion' => Yii::t('app', 'Id Campo Composicion'),
            'min' => Yii::t('app', 'Min'),
            'max' => Yii::t('app', 'Max'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCampoComposicion()
    {
        return $this->hasOne(CampoComposicionQuimica::className(), ['id' => 'id_campo_composicion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMarca()
    {
        return $this->hasOne(MarcasAcerosFundiciones::className(), ['id' => 'id_marca']);
    }

    /**
     * @inheritdoc
     * @return ComposicionQuimicaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ComposicionQuimicaQuery(get_called_class());
    }
}
