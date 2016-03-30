<?php
use kartik\grid\GridView;
use kartik\builder\TabularForm;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\widgets\Pjax;

Pjax::begin();
$dataProvider = new ArrayDataProvider([
    'allModels' => $row,
]);
echo TabularForm::widget([
    'dataProvider' => $dataProvider,
    'formName' => 'HrmPosition',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions'=>['hidden'=>true]],
        'jobs_id' => ['type' => TabularForm::INPUT_TEXT],
        'positions_code' => ['type' => TabularForm::INPUT_TEXT],
        'vacancy' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'options' => [
                        'items' => [ 'Open' => 'Open', 'Closed' => 'Closed', ],
                        'columnOptions => ['width' => '185px'],
                        'options' => ['placeholder' => 'Choose Vacancy'],
                    ]
        ],
        'employee_id' => [
            'label' => 'Hrm employee',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\modules\hrm\models\HrmEmployee::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => 'Choose Hrm employee'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'positions_as' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'options' => [
                        'items' => [ 'Head' => 'Head', 'Staff' => 'Staff', 'Labour' => 'Labour', ],
                        'columnOptions => ['width' => '185px'],
                        'options' => ['placeholder' => 'Choose Positions As'],
                    ]
        ],
        'basic_salary' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => TabularForm::INPUT_STATIC,
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowHrmPosition(' . $key . '); return false;', 'id' => 'hrm-position-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> ' . 'Hrm Position' . '  </h3>',
            'type' => GridView::TYPE_INFO,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Row', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowHrmPosition()']),
        ]
    ]
]);
Pjax::end();
?>