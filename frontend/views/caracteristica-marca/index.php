<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CaracteristicaMarcaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Caracteristica Marcas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="caracteristica-marca-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Caracteristica Marca', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_marca',
            'id_campo',
            'id_estado_material',
            'valor1',
            // 'valor2',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
