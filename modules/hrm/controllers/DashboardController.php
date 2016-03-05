<?php

namespace app\modules\hrm\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BankAccountController implements the CRUD actions for BankAccount model.
 */
class DashboardController extends Controller
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
     * Lists all BankAccount models.
     * @return mixed
     */
    public function actionIndex()
    {
        // $searchModel = new BankAccountSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index');
    }

    
}
