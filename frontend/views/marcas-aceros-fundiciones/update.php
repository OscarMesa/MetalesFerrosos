<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MarcasAcerosFundiciones */

$this->title = 'Update Marcas Aceros Fundiciones: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Marcas Aceros Fundiciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="marcas-aceros-fundiciones-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
