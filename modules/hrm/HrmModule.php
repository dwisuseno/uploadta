<?php

namespace app\modules\hrm;

class HrmModule extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\hrm\controllers';

    public function init()
    {
        parent::init();

        $this->layout = 'main.php';

        // $this->params['foo'] = 'bar';

        // custom initialization code goes here
    }

}
