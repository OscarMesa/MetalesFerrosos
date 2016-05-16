<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CaracteristicaMarcaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="caracteristica-marca-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_marca') ?>

    <?= $form->field($model, 'id_campo') ?>

    <?= $form->field($model, 'id_estado_material') ?>

    <?= $form->field($model, 'valor1') ?>

    <?php // echo $form->field($model, 'valor2') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Restablecer', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
