<?php

namespace app\modules\hrm\controllers;

use Yii;
use app\modules\hrm\models\HrmCandidate;
use app\modules\hrm\models\HrmCandidateSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * HrmCandidateController implements the CRUD actions for HrmCandidate model.
 */
class HrmCandidateController extends Controller
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
     * Lists all HrmCandidate models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HrmCandidateSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single HrmCandidate model.
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
     * Creates a new HrmCandidate model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new HrmCandidate();

        if ($model->loadAll(Yii::$app->request->post())) {
            $imagename = $model->person_id;
            $model->file = UploadedFile::getInstance($model,'file');
            $model->fcv = UploadedFile::getInstance($model,'fcv');

            if( $model->file){
                $model->file->saveAs('uploads/'.$imagename.'.'.$model->file->extension); 
                
                // save the path in the db column
                $model->photo = 'uploads/'.$imagename.'.'.$model->file->extension;
                
            }
            if($model->fcv){
                $model->fcv->saveAs('uploads/'.$imagename.'.'.$model->fcv->extension); 
                $model->cv = 'uploads/'.$imagename.'.'.$model->fcv->extension;
            }
            $sufix = HrmCandidate::find()->orderBy(['id'=>SORT_DESC])->limit(1)->one();
            $a = $sufix->id;
            $prefix = "CAND";
            $hasil = $this->generateCode($prefix,$a);
            $model->candidate_code = $hasil;
            $model->saveAll();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Updates an existing HrmCandidate model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post())) {
            $imagename = $model->person_id;
            $model->file = UploadedFile::getInstance($model,'file');
            $model->fcv = UploadedFile::getInstance($model,'fcv');

            if( $model->file){
                $model->file->saveAs('uploads/'.$imagename.'.'.$model->file->extension); 
                // var_dump($model->file);
                // exit();
                // save the path in the db column
                $model->photo = 'uploads/'.$imagename.'.'.$model->file->extension;
                
            }
            if($model->fcv){
                $model->fcv->saveAs('uploads/'.$imagename.'.'.$model->fcv->extension); 
                $model->cv = 'uploads/'.$imagename.'.'.$model->fcv->extension;
            }
            $model->saveAll();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Deletes an existing HrmCandidate model.
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
     * Finds the HrmCandidate model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return HrmCandidate the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = HrmCandidate::findOne($id)) !== null) {
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
