<?php

namespace app\modules\hrm\controllers;

use Yii;
use app\modules\hrm\models\HrmTraining;
use app\modules\hrm\models\HrmTrainingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HrmTrainingController implements the CRUD actions for HrmTraining model.
 */
class HrmTrainingController extends Controller
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
     * Lists all HrmTraining models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HrmTrainingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single HrmTraining model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $providerHrmDetailTraining = new \yii\data\ArrayDataProvider([
            'allModels' => $model->hrmDetailTrainings,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'providerHrmDetailTraining' => $providerHrmDetailTraining,
        ]);
    }

    /**
     * Creates a new HrmTraining model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new HrmTraining();

        if ($model->loadAll(Yii::$app->request->post())) {
            if(!$model->training_code){
                $getCode = HrmTraining::find()->orderBy(['id'=>SORT_DESC])->limit(1)->one();
                // var_dump($getCode);
                // exit();
                if($getCode == null){
                    $tc = "TRAINING0001";
                } else if($getCode->id < 10){
                    $new = $getCode->id +1;
                    $tc = "TRAINING000".$new;
                } else if($getCode->id < 100){
                    $new = $getCode->id +1;
                    $tc = "TRAINING00".$new;
                } else if($getCode->id < 1000){
                    $new = $getCode->id +1;
                    $tc = "TRAINING0".$new;
                }
                $model->training_code = $tc;
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
     * Updates an existing HrmTraining model.
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
     * Deletes an existing HrmTraining model.
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
        $providerHrmDetailTraining = new \yii\data\ArrayDataProvider([
            'allModels' => $model->hrmDetailTrainings,
        ]);

        $content = $this->renderAjax('_pdf', [
            'model' => $model,
            'providerHrmDetailTraining' => $providerHrmDetailTraining,
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
     * Finds the HrmTraining model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return HrmTraining the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = HrmTraining::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for HrmDetailTraining
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddHrmDetailTraining()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('HrmDetailTraining');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formHrmDetailTraining', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
