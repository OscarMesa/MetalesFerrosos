<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ComposicionQuimica */

$this->title = Yii::t('app', 'Create Composicion Quimica');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Composicion Quimicas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="composicion-quimica-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
