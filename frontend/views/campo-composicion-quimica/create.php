<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CampoComposicionQuimica */

$this->title = 'Create Campo Composicion Quimica';
$this->params['breadcrumbs'][] = ['label' => 'Campo Composicion Quimicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="campo-composicion-quimica-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
