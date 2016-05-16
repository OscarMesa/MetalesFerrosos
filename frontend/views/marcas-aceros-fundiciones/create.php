<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MarcasAcerosFundiciones */

$this->title = 'Create Marcas Aceros Fundiciones';
$this->params['breadcrumbs'][] = ['label' => 'Marcas Aceros Fundiciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="marcas-aceros-fundiciones-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
