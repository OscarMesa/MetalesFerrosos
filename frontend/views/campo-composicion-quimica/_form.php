<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CampoComposicionQuimica */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="campo-composicion-quimica-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre_campo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
