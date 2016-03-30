<?php

namespace app\modules\hrm\controllers;

use Yii;
use app\modules\hrm\models\HrmDetailTraining;
use app\modules\hrm\models\HrmDetailTrainingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HrmDetailTrainingController implements the CRUD actions for HrmDetailTraining model.
 */
class HrmDetailTrainingController extends Controller
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
     * Lists all HrmDetailTraining models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HrmDetailTrainingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single HrmDetailTraining model.
     * @param integer $id
     * @param integer $hrm_training_id
     * @param integer $hrm_employee_id
     * @return mixed
     */
    public function actionView($id, $hrm_training_id, $hrm_employee_id)
    {
        $model = $this->findModel($id, $hrm_training_id, $hrm_employee_id);
        return $this->render('view', [
            'model' => $this->findModel($id, $hrm_training_id, $hrm_employee_id),
        ]);
    }

    /**
     * Creates a new HrmDetailTraining model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new HrmDetailTraining();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id, 'hrm_training_id' => $model->hrm_training_id, 'hrm_employee_id' => $model->hrm_employee_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing HrmDetailTraining model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $hrm_training_id
     * @param integer $hrm_employee_id
     * @return mixed
     */
    public function actionUpdate($id, $hrm_training_id, $hrm_employee_id)
    {
        $model = $this->findModel($id, $hrm_training_id, $hrm_employee_id);

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id, 'hrm_training_id' => $model->hrm_training_id, 'hrm_employee_id' => $model->hrm_employee_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing HrmDetailTraining model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $hrm_training_id
     * @param integer $hrm_employee_id
     * @return mixed
     */
    public function actionDelete($id, $hrm_training_id, $hrm_employee_id)
    {
        $this->findModel($id, $hrm_training_id, $hrm_employee_id)->deleteWithRelated();

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
     * Finds the HrmDetailTraining model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $hrm_training_id
     * @param integer $hrm_employee_id
     * @return HrmDetailTraining the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $hrm_training_id, $hrm_employee_id)
    {
        if (($model = HrmDetailTraining::findOne(['id' => $id, 'hrm_training_id' => $hrm_training_id, 'hrm_employee_id' => $hrm_employee_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
