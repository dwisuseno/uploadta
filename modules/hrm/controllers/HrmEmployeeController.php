<?php

namespace app\modules\hrm\controllers;

use Yii;
use app\modules\hrm\models\HrmEmployee;
use app\modules\hrm\models\HrmEmployeeSearch;
use app\modules\hrm\models\HrmCandidate;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * HrmEmployeeController implements the CRUD actions for HrmEmployee model.
 */
class HrmEmployeeController extends Controller
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
     * Lists all HrmEmployee models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HrmEmployeeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single HrmEmployee model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $providerHrmDetailTraining = new \yii\data\ArrayDataProvider([
            'allModels' => $model->hrmDetailTrainings,
        ]);
        $providerHrmEmployeehaslevel = new \yii\data\ArrayDataProvider([
            'allModels' => $model->hrmEmployeehaslevels,
        ]);
        $providerHrmHasshift = new \yii\data\ArrayDataProvider([
            'allModels' => $model->hrmHasshifts,
        ]);
        $providerHrmPayroll = new \yii\data\ArrayDataProvider([
            'allModels' => $model->hrmPayrolls,
        ]);
        $providerHrmPosition = new \yii\data\ArrayDataProvider([
            'allModels' => $model->hrmPositions,
        ]);
        $providerHrmSalary = new \yii\data\ArrayDataProvider([
            'allModels' => $model->hrmSalaries,
        ]);
        $providerHrmWorkRecord = new \yii\data\ArrayDataProvider([
            'allModels' => $model->hrmWorkRecords,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'providerHrmDetailTraining' => $providerHrmDetailTraining,
            'providerHrmEmployeehaslevel' => $providerHrmEmployeehaslevel,
            'providerHrmHasshift' => $providerHrmHasshift,
            'providerHrmPayroll' => $providerHrmPayroll,
            'providerHrmPosition' => $providerHrmPosition,
            'providerHrmSalary' => $providerHrmSalary,
            'providerHrmWorkRecord' => $providerHrmWorkRecord,
        ]);
    }

    /**
     * Creates a new HrmEmployee model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new HrmEmployee();

        

        // $model = new DynamicModel([
        // 'nama', 'file_id'
        // ]);
 
        // // behavior untuk upload file
        // $model->attachBehavior('upload', [
        //     'class' => 'mdm\upload\UploadBehavior',
        //     'attribute' => 'file',
        //     'savedAttribute' => 'file_id' // coresponding with $model->file_id
        // ]);
     
        // // rule untuk model
        // $model->addRule('nama', 'string')
        //     ->addRule('file', 'file', ['extensions' => 'jpg']);
     
        // if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        //     if ($model->saveUploadedFile() !== false) {
        //         Yii::$app->session->setFlash('success', 'Upload Sukses');
        //         return $this->redirect(['view', 'id' => $model->id]);
        //     }
        //     else {
        //     return $this->render('create', [
        //         'model' => $model,
        //     ]);
        //     }
        // }
        $model = new HrmEmployee();

        if ($model->loadAll(Yii::$app->request->post())) {
            // get the instance of the uploaded file
            $imagename = $model->person_id;
            $model->file = UploadedFile::getInstance($model,'file');
            if($model->file){
                $model->file->saveAs('uploads/'.$imagename.'.'.$model->file->extension); 

                // save the path in the db column
                $model->photo = 'uploads/'.$imagename.'.'.$model->file->extension;
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
     * Updates an existing HrmEmployee model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post())) {
            // get the instance of the uploaded file
            $imagename = $model->person_id;
            $model->file = UploadedFile::getInstance($model,'file');
            if($model->file){
                 $model->file->saveAs('uploads/'.$imagename.'.'.$model->file->extension); 

                // save the path in the db column
                $model->photo = 'uploads/'.$imagename.'.'.$model->file->extension;
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
     * Deletes an existing HrmEmployee model.
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
        $providerHrmEmployeehaslevel = new \yii\data\ArrayDataProvider([
            'allModels' => $model->hrmEmployeehaslevels,
        ]);
        $providerHrmHasshift = new \yii\data\ArrayDataProvider([
            'allModels' => $model->hrmHasshifts,
        ]);
        $providerHrmPayroll = new \yii\data\ArrayDataProvider([
            'allModels' => $model->hrmPayrolls,
        ]);
        $providerHrmPosition = new \yii\data\ArrayDataProvider([
            'allModels' => $model->hrmPositions,
        ]);
        $providerHrmSalary = new \yii\data\ArrayDataProvider([
            'allModels' => $model->hrmSalaries,
        ]);
        $providerHrmWorkRecord = new \yii\data\ArrayDataProvider([
            'allModels' => $model->hrmWorkRecords,
        ]);

        $content = $this->renderAjax('_pdf', [
            'model' => $model,
            'providerHrmDetailTraining' => $providerHrmDetailTraining,
            'providerHrmEmployeehaslevel' => $providerHrmEmployeehaslevel,
            'providerHrmHasshift' => $providerHrmHasshift,
            'providerHrmPayroll' => $providerHrmPayroll,
            'providerHrmPosition' => $providerHrmPosition,
            'providerHrmSalary' => $providerHrmSalary,
            'providerHrmWorkRecord' => $providerHrmWorkRecord,
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
     * Finds the HrmEmployee model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return HrmEmployee the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = HrmEmployee::findOne($id)) !== null) {
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
    
    /**
    * Action to load a tabular form grid
    * for HrmEmployeehaslevel
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddHrmEmployeehaslevel()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('HrmEmployeehaslevel');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formHrmEmployeehaslevel', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for HrmHasshift
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddHrmHasshift()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('HrmHasshift');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formHrmHasshift', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for HrmPayroll
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddHrmPayroll()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('HrmPayroll');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formHrmPayroll', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for HrmPosition
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddHrmPosition()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('HrmPosition');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formHrmPosition', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for HrmSalary
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddHrmSalary()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('HrmSalary');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formHrmSalary', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for HrmWorkRecord
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddHrmWorkRecord()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('HrmWorkRecord');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formHrmWorkRecord', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
