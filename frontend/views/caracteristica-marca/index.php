<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CaracteristicaMarcaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Caracteristica de Marcas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="caracteristica-marca-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Caracteristica Marca', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'id_marca', 
                'filter' => yii\helpers\ArrayHelper::map(\app\models\MarcasAcerosFundiciones::find()->orderBy('marcas_aceros_fundiciones')->asArray()->all(), 'id', 'marcas_aceros_fundiciones'),
                 'value' => function ($data) {
                    return is_object($data->idMarca)?$data->idMarca->marcas_aceros_fundiciones:''; // $data['name'] for array data, e.g. using SqlDataProvider.
                },
            ],
            [
                'attribute' => 'id_campo', 
                'filter' => yii\helpers\ArrayHelper::map(\app\models\CampoCaracteristica::find()->orderBy('nombre_campo')->asArray()->all(), 'id', 'nombre_campo'),
                 'value' => function ($data) {
                    return is_object($data->idCampo)?$data->idCampo->nombre_campo:''; // $data['name'] for array data, e.g. using SqlDataProvider.
                },
            ],
            [
                'attribute' => 'id_estado_material', 
                'filter' => yii\helpers\ArrayHelper::map(\app\models\EstadoMaterial::find()->orderBy('tipo_caracteristica')->asArray()->all(), 'id', 'tipo_caracteristica'),
                 'value' => function ($data) {
                    return is_object($data->idEstadoMaterial)?$data->idEstadoMaterial->tipo_caracteristica:''; // $data['name'] for array data, e.g. using SqlDataProvider.
                },
            ],
            'valor1',
             'valor2',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
