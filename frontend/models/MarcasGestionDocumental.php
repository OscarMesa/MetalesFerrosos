<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%marcas_gestion_documental}}".
 *
 * @property integer $id
 * @property string $nombre_archivo
 * @property string $type_file
 * @property string $ruta_completa
 * @property integer $id_marca
 *
 * @property MarcasAcerosFundiciones $idMarca
 */
class MarcasGestionDocumental extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%marcas_gestion_documental}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre_archivo', 'ruta_completa'], 'required'],
            [['id_marca'], 'integer'],
            [['nombre_archivo', 'ruta_completa'], 'string', 'max' => 255],
            [['type_file'], 'string', 'max' => 10],
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
            'nombre_archivo' => Yii::t('app', 'Nombre Archivo'),
            'type_file' => Yii::t('app', 'Type File'),
            'ruta_completa' => Yii::t('app', 'Ruta Completa'),
            'id_marca' => Yii::t('app', 'Id Marca'),
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
     * @inheritdoc
     * @return MarcasGestionDocumentalQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MarcasGestionDocumentalQuery(get_called_class());
    }
}
