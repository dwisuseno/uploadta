<?php

namespace app\modules\hrm\controllers;

use Yii;
use app\modules\hrm\models\MasterCompany;
use app\modules\hrm\models\MasterCompanySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MasterCompanyController implements the CRUD actions for MasterCompany model.
 */
class MasterCompanyController extends Controller
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
     * Lists all MasterCompany models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MasterCompanySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MasterCompany model.
     * @param integer $id
     * @param integer $client_id
     * @return mixed
     */
    public function actionView($id, $client_id)
    {
        $model = $this->findModel($id, $client_id);
        $providerMasterPersonnelArea = new \yii\data\ArrayDataProvider([
            'allModels' => $model->masterPersonnelAreas,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id, $client_id),
            'providerMasterPersonnelArea' => $providerMasterPersonnelArea,
        ]);
    }

    /**
     * Creates a new MasterCompany model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MasterCompany();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id, 'client_id' => $model->client_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing MasterCompany model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $client_id
     * @return mixed
     */
    public function actionUpdate($id, $client_id)
    {
        $model = $this->findModel($id, $client_id);

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id, 'client_id' => $model->client_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing MasterCompany model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $client_id
     * @return mixed
     */
    public function actionDelete($id, $client_id)
    {
        $this->findModel($id, $client_id)->deleteWithRelated();

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
        $providerMasterPersonnelArea = new \yii\data\ArrayDataProvider([
            'allModels' => $model->masterPersonnelAreas,
        ]);

        $content = $this->renderAjax('_pdf', [
            'model' => $model,
            'providerMasterPersonnelArea' => $providerMasterPersonnelArea,
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
     * Finds the MasterCompany model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $client_id
     * @return MasterCompany the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $client_id)
    {
        if (($model = MasterCompany::findOne(['id' => $id, 'client_id' => $client_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for MasterPersonnelArea
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddMasterPersonnelArea()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('MasterPersonnelArea');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formMasterPersonnelArea', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
