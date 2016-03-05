<?php

namespace app\controllers;

use Yii;
use app\models\Employeehashrdata;
use app\models\EmployeehashrdataSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EmployeehashrdataController implements the CRUD actions for Employeehashrdata model.
 */
class EmployeehashrdataController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Employeehashrdata models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmployeehashrdataSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Employeehashrdata model.
     * @param integer $employee_id
     * @param integer $hrdata_id
     * @return mixed
     */
    public function actionView($employee_id, $hrdata_id)
    {
        $model = $this->findModel($employee_id, $hrdata_id);
        return $this->render('view', [
            'model' => $this->findModel($employee_id, $hrdata_id),
        ]);
    }

    /**
     * Creates a new Employeehashrdata model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Employeehashrdata();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'employee_id' => $model->employee_id, 'hrdata_id' => $model->hrdata_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Employeehashrdata model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $employee_id
     * @param integer $hrdata_id
     * @return mixed
     */
    public function actionUpdate($employee_id, $hrdata_id)
    {
        $model = $this->findModel($employee_id, $hrdata_id);

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'employee_id' => $model->employee_id, 'hrdata_id' => $model->hrdata_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Employeehashrdata model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $employee_id
     * @param integer $hrdata_id
     * @return mixed
     */
    public function actionDelete($employee_id, $hrdata_id)
    {
        $this->findModel($employee_id, $hrdata_id)->deleteWithRelated();

        return $this->redirect(['index']);
    }
    
    /**
     * 
     * for export pdf at actionView
     *  
     * @param type $id
     * @return type
     */
    public function actionPdf($id) {
        $model = $this->findModel($id);

        $content = $this->renderAjax('_pdf', [
            'model' => $model,
        ]);

        $pdf = new \kartik\mpdf\Pdf([
            'mode' => \kartik\mpdf\Pdf::MODE_CORE,
            'format' => \kartik\mpdf\Pdf::FORMAT_A4,
            'orientation' => \kartik\mpdf\Pdf::ORIENT_PORTRAIT,
            'destination' => \kartik\mpdf\Pdf::DEST_BROWSER,
            'content' => $content,
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            'cssInline' => '.kv-heading-1{font-size:18px}',
            'options' => ['title' => \Yii::$app->name],
            'methods' => [
                'SetHeader' => [\Yii::$app->name],
                'SetFooter' => ['{PAGENO}'],
            ]
        ]);

        return $pdf->render();
    }
    
    /**
     * Finds the Employeehashrdata model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $employee_id
     * @param integer $hrdata_id
     * @return Employeehashrdata the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($employee_id, $hrdata_id)
    {
        if (($model = Employeehashrdata::findOne(['employee_id' => $employee_id, 'hrdata_id' => $hrdata_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
