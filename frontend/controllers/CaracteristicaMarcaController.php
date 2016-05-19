<?php

namespace frontend\controllers;

use Yii;
use app\models\CaracteristicaMarca;
use app\models\CaracteristicaMarcaSearch;
use app\models\MarcasGestionDocumental;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\ComposicionQuimica;
/**
 * CaracteristicaMarcaController implements the CRUD actions for CaracteristicaMarca model.
 */
class CaracteristicaMarcaController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'update','index','clasificacion-materiales','busqueda-clasificacion-materiales', 'descargar-documento'],
                'rules' => [
                    // deny all POST requests
                    [
                        'actions' => [],                    
                        'allow' => true,
                        'verbs' => ['POST']
                    ],
                    // allow authenticated users
                    [
                        'actions' => [],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    // everything else is denied
                ],
            ],
        ];
    }

    /**
     * Lists all CaracteristicaMarca models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CaracteristicaMarcaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionDescargarDocumento()
    {
        $documento = MarcasGestionDocumental::find()
                                ->where(['id' => $_GET['doc']])
                                ->one();
        //print_r($documento);

        $file = \Yii::$app->basePath.DIRECTORY_SEPARATOR.$documento->ruta_completa.DIRECTORY_SEPARATOR.$documento->nombre_archivo;
       
        Yii::$app->response->xSendFile($file);
             //                   die;
    }

    /**
     * Displays a single CaracteristicaMarca model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new CaracteristicaMarca model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CaracteristicaMarca();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
    *
    */

    public function actionClasificacionMateriales(){
        $searchModel = new CaracteristicaMarcaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('clasificaciones_materiales', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
    *
    */
    public function actionBusquedaClasificacionMateriales()
    {
        echo json_encode(array(
                'camposComposicionQuimica' => yii\helpers\ArrayHelper::map(\app\models\CampoComposicionQuimica::find()->all(), 'id', 'nombre_campo'),
                'campoCaracteristicas' =>  yii\helpers\ArrayHelper::map(\app\models\CampoCaracteristica::find()->all(), 'id', 'nombre_campo')
            ));
        die;
    }

    /**
     * Updates an existing CaracteristicaMarca model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CaracteristicaMarca model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CaracteristicaMarca model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CaracteristicaMarca the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CaracteristicaMarca::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
