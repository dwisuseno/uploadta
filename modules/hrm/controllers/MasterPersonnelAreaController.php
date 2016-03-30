<?php

namespace app\modules\hrm\controllers;

use Yii;
use app\modules\hrm\models\MasterPersonnelArea;
use app\modules\hrm\models\MasterPersonnelAreaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MasterPersonnelAreaController implements the CRUD actions for MasterPersonnelArea model.
 */
class MasterPersonnelAreaController extends Controller
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
     * Lists all MasterPersonnelArea models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MasterPersonnelAreaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MasterPersonnelArea model.
     * @param integer $id
     * @param integer $company_id
     * @return mixed
     */
    public function actionView($id, $company_id)
    {
        $model = $this->findModel($id, $company_id);
        $providerMasterPersonnelSubArea = new \yii\data\ArrayDataProvider([
            'allModels' => $model->masterPersonnelSubAreas,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id, $company_id),
            'providerMasterPersonnelSubArea' => $providerMasterPersonnelSubArea,
        ]);
    }

    /**
     * Creates a new MasterPersonnelArea model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MasterPersonnelArea();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id, 'company_id' => $model->company_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing MasterPersonnelArea model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $company_id
     * @return mixed
     */
    public function actionUpdate($id, $company_id)
    {
        $model = $this->findModel($id, $company_id);

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id, 'company_id' => $model->company_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing MasterPersonnelArea model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $company_id
     * @return mixed
     */
    public function actionDelete($id, $company_id)
    {
        $this->findModel($id, $company_id)->deleteWithRelated();

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
        $providerMasterPersonnelSubArea = new \yii\data\ArrayDataProvider([
            'allModels' => $model->masterPersonnelSubAreas,
        ]);

        $content = $this->renderAjax('_pdf', [
            'model' => $model,
            'providerMasterPersonnelSubArea' => $providerMasterPersonnelSubArea,
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
     * Finds the MasterPersonnelArea model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $company_id
     * @return MasterPersonnelArea the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $company_id)
    {
        if (($model = MasterPersonnelArea::findOne(['id' => $id, 'company_id' => $company_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for MasterPersonnelSubArea
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddMasterPersonnelSubArea()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('MasterPersonnelSubArea');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formMasterPersonnelSubArea', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
