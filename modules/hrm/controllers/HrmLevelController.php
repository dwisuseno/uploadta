<?php

namespace app\modules\hrm\controllers;

use Yii;
use app\modules\hrm\models\HrmLevel;
use app\modules\hrm\models\HrmLevelSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HrmLevelController implements the CRUD actions for HrmLevel model.
 */
class HrmLevelController extends Controller
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
     * Lists all HrmLevel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HrmLevelSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single HrmLevel model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $providerHrmEmployeehaslevel = new \yii\data\ArrayDataProvider([
            'allModels' => $model->hrmEmployeehaslevels,
        ]);
        $providerHrmSkill = new \yii\data\ArrayDataProvider([
            'allModels' => $model->hrmSkills,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'providerHrmEmployeehaslevel' => $providerHrmEmployeehaslevel,
            'providerHrmSkill' => $providerHrmSkill,
        ]);
    }

    /**
     * Creates a new HrmLevel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new HrmLevel();

        if ($model->loadAll(Yii::$app->request->post())) {
            $sufix = HrmLevel::find()->orderBy(['id'=>SORT_DESC])->limit(1)->one();
            $a = $sufix->id;
            $prefix = "LEVEL";
            $hasil = $this->generateCode($prefix,$a);
            $model->level_code = $hasil;
            $model->saveAll();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing HrmLevel model.
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
     * Deletes an existing HrmLevel model.
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
        $providerHrmEmployeehaslevel = new \yii\data\ArrayDataProvider([
            'allModels' => $model->hrmEmployeehaslevels,
        ]);
        $providerHrmSkill = new \yii\data\ArrayDataProvider([
            'allModels' => $model->hrmSkills,
        ]);

        $content = $this->renderAjax('_pdf', [
            'model' => $model,
            'providerHrmEmployeehaslevel' => $providerHrmEmployeehaslevel,
            'providerHrmSkill' => $providerHrmSkill,
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
     * Finds the HrmLevel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return HrmLevel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = HrmLevel::findOne($id)) !== null) {
            return $model;
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
    * for HrmSkill
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddHrmSkill()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('HrmSkill');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formHrmSkill', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
