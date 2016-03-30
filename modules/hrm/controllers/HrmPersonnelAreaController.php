<?php

namespace app\modules\hrm\controllers;

use Yii;
use app\modules\hrm\models\HrmPersonnelArea;
use app\modules\hrm\models\HrmPersonnelAreaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HrmPersonnelAreaController implements the CRUD actions for HrmPersonnelArea model.
 */
class HrmPersonnelAreaController extends Controller
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
     * Lists all HrmPersonnelArea models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HrmPersonnelAreaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single HrmPersonnelArea model.
     * @param integer $id
     * @param integer $company_id
     * @return mixed
     */
    public function actionView($id, $company_id)
    {
        $model = $this->findModel($id, $company_id);
        $providerHrmPersonnelSubArea = new \yii\data\ArrayDataProvider([
            'allModels' => $model->hrmPersonnelSubAreas,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id, $company_id),
            'providerHrmPersonnelSubArea' => $providerHrmPersonnelSubArea,
        ]);
    }

    /**
     * Creates a new HrmPersonnelArea model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new HrmPersonnelArea();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id, 'company_id' => $model->company_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing HrmPersonnelArea model.
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
     * Deletes an existing HrmPersonnelArea model.
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
        $providerHrmPersonnelSubArea = new \yii\data\ArrayDataProvider([
            'allModels' => $model->hrmPersonnelSubAreas,
        ]);

        $content = $this->renderAjax('_pdf', [
            'model' => $model,
            'providerHrmPersonnelSubArea' => $providerHrmPersonnelSubArea,
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
     * Finds the HrmPersonnelArea model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $company_id
     * @return HrmPersonnelArea the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $company_id)
    {
        if (($model = HrmPersonnelArea::findOne(['id' => $id, 'company_id' => $company_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for HrmPersonnelSubArea
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddHrmPersonnelSubArea()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('HrmPersonnelSubArea');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formHrmPersonnelSubArea', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
