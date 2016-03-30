<?php

namespace app\modules\hrm\controllers;

use Yii;
use app\modules\hrm\models\HrmJobRequisition;
use app\modules\hrm\models\HrmJobRequisitionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HrmJobRequisitionController implements the CRUD actions for HrmJobRequisition model.
 */
class HrmJobRequisitionController extends Controller
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
     * Lists all HrmJobRequisition models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HrmJobRequisitionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single HrmJobRequisition model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $providerHrmJobreqCandidate = new \yii\data\ArrayDataProvider([
            'allModels' => $model->hrmJobreqCandidates,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'providerHrmJobreqCandidate' => $providerHrmJobreqCandidate,
        ]);
    }

    /**
     * Creates a new HrmJobRequisition model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new HrmJobRequisition();

        if ($model->loadAll(Yii::$app->request->post())) {
            if(!$model->job_requisition_code){
                $old_code = HrmJobRequisition::find()->orderBy(['id'=>SORT_DESC])->limit(1)->one();
                
                if($old_code == null){
                    $sc = "JOBREQ0001";
                } else if($old_code->id < 9){
                    $new = $old_code->id +1;
                    $sc = "JOBREQ000".$new;
                } else if($old_code->id < 99){
                    $new = $old_code->id +1;
                    $sc = "JOBREQ00".$new;
                } else if($old_code->id < 999){
                    $new = $old_code->id +1;
                    $sc = "JOBREQ0".$new;
                }
                $model->job_requisition_code = $sc;
            }
            $model->saveAll();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing HrmJobRequisition model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing HrmJobRequisition model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->deleteWithRelated();

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
        $providerHrmJobreqCandidate = new \yii\data\ArrayDataProvider([
            'allModels' => $model->hrmJobreqCandidates,
        ]);

        $content = $this->renderAjax('_pdf', [
            'model' => $model,
            'providerHrmJobreqCandidate' => $providerHrmJobreqCandidate,
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
     * Finds the HrmJobRequisition model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return HrmJobRequisition the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = HrmJobRequisition::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for HrmJobreqCandidate
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddHrmJobreqCandidate()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('HrmJobreqCandidate');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formHrmJobreqCandidate', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
