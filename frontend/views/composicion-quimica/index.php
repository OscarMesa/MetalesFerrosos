<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ComposicionQuimicaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Composicion Quimicas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="composicion-quimica-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Composicion Quimica'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'id_campo_composicion', 
                'filter' => yii\helpers\ArrayHelper::map(\app\models\CampoComposicionQuimica::find()->orderBy('nombre_campo')->asArray()->all(), 'id', 'nombre_campo'),
                 'value' => function ($data) {
                    return is_object($data->idCampoComposicion)?$data->idCampoComposicion->nombre_campo:''; // $data['name'] for array data, e.g. using SqlDataProvider.
                },
            ],
            [
                'attribute' => 'id_marca', 
                'filter' => yii\helpers\ArrayHelper::map(\app\models\MarcasAcerosFundiciones::find()->orderBy('marcas_aceros_fundiciones')->asArray()->all(), 'id', 'marcas_aceros_fundiciones'),
                 'value' => function ($data) {
                    return is_object($data->idMarca)?$data->idMarca->marcas_aceros_fundiciones:''; // $data['name'] for array data, e.g. using SqlDataProvider.
                },
            ],
            'min', 
            'max',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
