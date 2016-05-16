<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CaracteristicaMarca */

$this->title = 'Actualizar Caracteristica Marca: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Caracteristica Marcas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="caracteristica-marca-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
