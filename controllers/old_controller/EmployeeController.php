<?php

namespace app\controllers;

use Yii;
use app\models\Employee;
use app\models\EmployeeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EmployeeController implements the CRUD actions for Employee model.
 */
class EmployeeController extends Controller
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
     * Lists all Employee models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmployeeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Employee model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $providerEmployeehashrdata = new \yii\data\ArrayDataProvider([
            'allModels' => $model->employeehashrdatas,
        ]);
        $providerEmployeehasskill = new \yii\data\ArrayDataProvider([
            'allModels' => $model->employeehasskills,
        ]);
        $providerHrdata = new \yii\data\ArrayDataProvider([
            'allModels' => $model->hrdatas0,
        ]);
        $providerPayroll = new \yii\data\ArrayDataProvider([
            'allModels' => $model->payrolls,
        ]);
        $providerSalary = new \yii\data\ArrayDataProvider([
            'allModels' => $model->salaries,
        ]);
        $providerSasaranstrategis = new \yii\data\ArrayDataProvider([
            'allModels' => $model->sasaranstrategis,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'providerEmployeehashrdata' => $providerEmployeehashrdata,
            'providerEmployeehasskill' => $providerEmployeehasskill,
            'providerHrdata' => $providerHrdata,
            'providerPayroll' => $providerPayroll,
            'providerSalary' => $providerSalary,
            'providerSasaranstrategis' => $providerSasaranstrategis,
        ]);
    }

    /**
     * Creates a new Employee model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Employee();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Employee model.
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
     * Deletes an existing Employee model.
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
        $providerEmployeehashrdata = new \yii\data\ArrayDataProvider([
            'allModels' => $model->employeehashrdatas,
        ]);
        $providerEmployeehasskill = new \yii\data\ArrayDataProvider([
            'allModels' => $model->employeehasskills,
        ]);
        $providerHrdata = new \yii\data\ArrayDataProvider([
            'allModels' => $model->hrdatas0,
        ]);
        $providerPayroll = new \yii\data\ArrayDataProvider([
            'allModels' => $model->payrolls,
        ]);
        $providerSalary = new \yii\data\ArrayDataProvider([
            'allModels' => $model->salaries,
        ]);
        $providerSasaranstrategis = new \yii\data\ArrayDataProvider([
            'allModels' => $model->sasaranstrategis,
        ]);

        $content = $this->renderAjax('_pdf', [
            'model' => $model,
            'providerEmployeehashrdata' => $providerEmployeehashrdata,
            'providerEmployeehasskill' => $providerEmployeehasskill,
            'providerHrdata' => $providerHrdata,
            'providerPayroll' => $providerPayroll,
            'providerSalary' => $providerSalary,
            'providerSasaranstrategis' => $providerSasaranstrategis,
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
     * Finds the Employee model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Employee the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Employee::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for Employeehashrdata
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddEmployeehashrdata()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('Employeehashrdata');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formEmployeehashrdata', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for Employeehasskill
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddEmployeehasskill()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('Employeehasskill');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formEmployeehasskill', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for Hrdata
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddHrdata()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('Hrdata');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formHrdata', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for Payroll
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddPayroll()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('Payroll');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formPayroll', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for Salary
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddSalary()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('Salary');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formSalary', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for Sasaranstrategis
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddSasaranstrategis()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('Sasaranstrategis');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formSasaranstrategis', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
