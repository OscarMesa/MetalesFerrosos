<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\MarcasAcerosFundiciones;
use app\models\CampoCaracteristica;
use app\models\EstadoMaterial;

/* @var $this yii\web\View */
/* @var $model app\models\CaracteristicaMarca */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="caracteristica-marca-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_marca')->dropDownList(
           ArrayHelper::map(MarcasAcerosFundiciones::find()->all(),'id','marcas_aceros_fundiciones'),
           ['prompt' => 'Selecione la marca'] 
    ) ?>

    <?= $form->field($model, 'id_campo')->dropDownList(
            ArrayHelper::map(CampoCaracteristica::find()->all(),'id','nombre_campo'),
           ['prompt' => 'Selecione el campo'] 
    ) ?>

    <?= $form->field($model, 'id_estado_material')->dropDownList(
         ArrayHelper::map(EstadoMaterial::find()->all(),'id','tipo_caracteristica'),
           ['prompt' => 'Selecione el estado del mateiral'] 
    ) ?>

    <?= $form->field($model, 'valor1')->textInput() ?>

    <?= $form->field($model, 'valor2')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
