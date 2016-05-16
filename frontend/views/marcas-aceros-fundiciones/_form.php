<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MarcasAcerosFundiciones */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="marcas-aceros-fundiciones-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'marcas_aceros_fundiciones')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_subtipo_metal')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
