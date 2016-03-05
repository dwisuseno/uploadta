<?php

namespace app\modules\hrm\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionMenu(){
    	return $this->render('menu');
    }
}
