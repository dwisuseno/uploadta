<?php

namespace app\modules\sd\controllers;

use Yii;
use app\modules\sd\models\SdSale;
use app\modules\sd\models\SdSalesitem;
use app\modules\sd\models\SdSaleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\modules\iwm\controllers\IwmgoodissuehController;

/**
 * SdSaleController implements the CRUD actions for SdSale model.
 */
class SdSaleController extends Controller
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
     * Lists all SdSale models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SdSaleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all SdSale models.
     * @return mixed
     */
    public function actionInquiry()
    {
        $searchModel = new SdSaleSearch();
        $dataProvider = $searchModel->searchinquiry(Yii::$app->request->queryParams);

        return $this->render('inquiry', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all SdSale models.
     * @return mixed
     */
    public function actionQuotation()
    {
        $searchModel = new SdSaleSearch();
        $dataProvider = $searchModel->searchquotation(Yii::$app->request->queryParams);

        return $this->render('quotation', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SdSale model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $providerArTransaction = new \yii\data\ArrayDataProvider([
            'allModels' => $model->arTransactions,
        ]);
        $providerSdForecast = new \yii\data\ArrayDataProvider([
            'allModels' => $model->sdForecasts,
        ]);
        $providerSdSalesitem = new \yii\data\ArrayDataProvider([
            'allModels' => $model->sdSalesitems,
        ]);
        $providerSdTaxdetail = new \yii\data\ArrayDataProvider([ 
            'allModels' => $model->sdTaxdetails, 
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'providerArTransaction' => $providerArTransaction,
            'providerSdForecast' => $providerSdForecast,
            'providerSdSalesitem' => $providerSdSalesitem,
            'providerSdTaxdetail' => $providerSdTaxdetail,
        ]);
    }

    /**
     * Displays a single SdSale model.
     * @param integer $id
     * @return mixed
     */
    public function actionViewinquiry($id)
    {
        $model = $this->findModel($id);
        $providerArTransaction = new \yii\data\ArrayDataProvider([
            'allModels' => $model->arTransactions,
        ]);
        $providerSdForecast = new \yii\data\ArrayDataProvider([
            'allModels' => $model->sdForecasts,
        ]);
        $providerSdSalesitem = new \yii\data\ArrayDataProvider([
            'allModels' => $model->sdSalesitems,
        ]);
        $providerSdTaxdetail = new \yii\data\ArrayDataProvider([ 
            'allModels' => $model->sdTaxdetails, 
        ]);
        return $this->render('viewinquiry', [
            'model' => $this->findModel($id),
            'providerArTransaction' => $providerArTransaction,
            'providerSdForecast' => $providerSdForecast,
            'providerSdSalesitem' => $providerSdSalesitem,
            'providerSdTaxdetail' => $providerSdTaxdetail,
        ]);
    }

    /**
     * Displays a single SdSale model.
     * @param integer $id
     * @return mixed
     */
    public function actionViewquotation($id)
    {
        $model = $this->findModel($id);
        $providerArTransaction = new \yii\data\ArrayDataProvider([
            'allModels' => $model->arTransactions,
        ]);
        $providerSdForecast = new \yii\data\ArrayDataProvider([
            'allModels' => $model->sdForecasts,
        ]);
        $providerSdSalesitem = new \yii\data\ArrayDataProvider([
            'allModels' => $model->sdSalesitems,
        ]);
        $providerSdTaxdetail = new \yii\data\ArrayDataProvider([ 
            'allModels' => $model->sdTaxdetails, 
        ]);
        return $this->render('viewquotation', [
            'model' => $this->findModel($id),
            'providerArTransaction' => $providerArTransaction,
            'providerSdForecast' => $providerSdForecast,
            'providerSdSalesitem' => $providerSdSalesitem,
            'providerSdTaxdetail' => $providerSdTaxdetail,
        ]);
    }

    /**
     * Creates a new SdSale model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    // $type, $id, $date, $item = array(), $reserve = array())
    public function actionCreate()
    {
        $model = new SdSale();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            $id = $model['id'];
            $status = $this->findModel($id);
            $status->inquirystatus_sale = 3;
            $status->quotationstatus_sale = 4;
            $status->sostatus_sale = 2;
            $status->update();

            // $item = SdSalesitem::find()->select('sd_salesitem.iwm_item_master_id, sd_salesitem.quantity_salesitem')->where('sd_salesitem.sd_sale_id = '.$model['id'])->asArray()->All();
            // $date = SdSale::find()->select('sd_sale.delivdate_sale')->where('sd_sale.id = '.$model['id'])->One();
            // IwmgoodissuehController::actionCreateIssue('sales', $model['id'], $date, $item);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Creates a new SdSale model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreateinquiry()
    {
        $model = new SdSale();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['viewinquiry', 'id' => $model->id]);
        } else {
            return $this->render('createinquiry', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Creates a new SdSale model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreatequotation()
    {
        $model = new SdSale();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            $id = $model['id'];
            $status = $this->findModel($id);
            $status->inquirystatus_sale = 3;
            $status->quotationstatus_sale = 1;
            $status->update();
            return $this->redirect(['viewquotation', 'id' => $model->id]);
        } else {
            return $this->render('createquotation', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SdSale model.
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
     * Updates an existing SdSale model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdateinquiry($id)
    {
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['viewinquiry', 'id' => $model->id]);
        } else {
            return $this->render('updateinquiry', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SdSale model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdatequotation($id)
    {
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['viewquotation', 'id' => $model->id]);
        } else {
            return $this->render('updatequotation', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SdSale model.
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
     * Deletes an existing SdSale model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeleteinquiry($id)
    {
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['inquiry']);
    }

    /**
     * Deletes an existing SdSale model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeletequotation($id)
    {
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['quotation']);
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
        $providerArTransaction = new \yii\data\ArrayDataProvider([
            'allModels' => $model->arTransactions,
        ]);
        $providerSdForecast = new \yii\data\ArrayDataProvider([
            'allModels' => $model->sdForecasts,
        ]);
        $providerSdSalesitem = new \yii\data\ArrayDataProvider([
            'allModels' => $model->sdSalesitems,
        ]);
        $providerSdTaxdetail = new \yii\data\ArrayDataProvider([ 
            'allModels' => $model->sdTaxdetails, 
        ]); 

        $content = $this->renderAjax('_pdf', [
            'model' => $model,
            'providerArTransaction' => $providerArTransaction,
            'providerSdForecast' => $providerSdForecast,
            'providerSdSalesitem' => $providerSdSalesitem,
            'providerSdTaxdetail' => $providerSdTaxdetail, 
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
     * Finds the SdSale model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SdSale the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SdSale::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for ArTransaction
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddArTransaction()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('ArTransaction');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formArTransaction', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for SdForecast
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddSdForecast()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('SdForecast');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formSdForecast', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for SdSalesitem
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddSdSalesitem()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('SdSalesitem');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formSdSalesitem', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
    * Action to load a tabular form grid
    * for SdTaxdetail
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddSdTaxdetail()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('SdTaxdetail');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formSdTaxdetail', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionConvertinquiry($id)
    {
        $model = $this->findModel($id);

        $model->quotationstatus_sale = 1;
        $model->inquirystatus_sale = 1;
        $model->update();
        return $this->redirect(['/sd/sd-sale/inquiry']);
    }

    public function actionCompleteinquiry($id)
    {
        $model = $this->findModel($id);

        $model->inquirystatus_sale = 2;
        $model->update();
        return $this->redirect(['/sd/sd-sale/inquiry']);
    }

    public function actionConvertquotation($id)
    {
        $model = $this->findModel($id);

        $model->sostatus_sale = 2;
        $model->quotationstatus_sale = 2;
        $model->update();
        return $this->redirect(['/sd/sd-sale/quotation']);
    }

    public function actionCompletequotation($id)
    {
        $model = $this->findModel($id);

        $model->quotationstatus_sale = 3;
        $model->update();
        return $this->redirect(['/sd/sd-sale/quotation']);
    }
}
