<?php

namespace app\controllers;

use Yii;
use app\models\ServiceDetails;
use app\models\ServiceDetailsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ServiceDetailsController implements the CRUD actions for ServiceDetails model.
 */
class ServiceDetailsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ServiceDetails models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ServiceDetailsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ServiceDetails model.
     * @param integer $id
     * @param integer $employee_id
     * @param integer $services_ID
     * @param integer $rooms_id
     * @param integer $service_booking_id
     * @return mixed
     */
    public function actionView($id, $employee_id, $services_ID, $rooms_id, $service_booking_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $employee_id, $services_ID, $rooms_id, $service_booking_id),
        ]);
    }

    /**
     * Creates a new ServiceDetails model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ServiceDetails();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'employee_id' => $model->employee_id, 'services_ID' => $model->services_ID, 'rooms_id' => $model->rooms_id, 'service_booking_id' => $model->service_booking_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ServiceDetails model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $employee_id
     * @param integer $services_ID
     * @param integer $rooms_id
     * @param integer $service_booking_id
     * @return mixed
     */
    public function actionUpdate($id, $employee_id, $services_ID, $rooms_id, $service_booking_id)
    {
        $model = $this->findModel($id, $employee_id, $services_ID, $rooms_id, $service_booking_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'employee_id' => $model->employee_id, 'services_ID' => $model->services_ID, 'rooms_id' => $model->rooms_id, 'service_booking_id' => $model->service_booking_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ServiceDetails model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $employee_id
     * @param integer $services_ID
     * @param integer $rooms_id
     * @param integer $service_booking_id
     * @return mixed
     */
    public function actionDelete($id, $employee_id, $services_ID, $rooms_id, $service_booking_id)
    {
        $this->findModel($id, $employee_id, $services_ID, $rooms_id, $service_booking_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ServiceDetails model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $employee_id
     * @param integer $services_ID
     * @param integer $rooms_id
     * @param integer $service_booking_id
     * @return ServiceDetails the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $employee_id, $services_ID, $rooms_id, $service_booking_id)
    {
        if (($model = ServiceDetails::findOne(['id' => $id, 'employee_id' => $employee_id, 'services_ID' => $services_ID, 'rooms_id' => $rooms_id, 'service_booking_id' => $service_booking_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
