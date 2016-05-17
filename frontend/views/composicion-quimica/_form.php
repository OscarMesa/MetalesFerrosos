<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\CampoComposicionQuimica;
use app\models\MarcasAcerosFundiciones;

/* @var $this yii\web\View */
/* @var $model app\models\ComposicionQuimica */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="composicion-quimica-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_campo_composicion')->dropDownList(
            ArrayHelper::map(CampoComposicionQuimica::find()->all(),'id','nombre_campo'),
           ['prompt' => 'Selecione el campo'] 
    ) ?>

    <?= $form->field($model, 'id_marca')->dropDownList(
            ArrayHelper::map(MarcasAcerosFundiciones::find()->all(),'id','marcas_aceros_fundiciones'),
           ['prompt' => 'Selecione la marca'] 
    ) ?>


    <?= $form->field($model, 'min')->textInput() ?>

    <?= $form->field($model, 'max')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
