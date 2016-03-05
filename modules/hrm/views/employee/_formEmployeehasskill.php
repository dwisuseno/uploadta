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
    'formName' => 'Employeehasskill',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions'=>['hidden'=>true]],
        // 'employee_id' => [
        //     'label' => 'Employee',
        //     'type' => TabularForm::INPUT_WIDGET,
        //     'widgetClass' => \kartik\widgets\Select2::className(),
        //     'options' => [
        //         'data' => \yii\helpers\ArrayHelper::map(\app\modules\hrm\models\Employee::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        //         'options' => ['placeholder' => 'Choose Employee'],
        //     ],
        //     'columnOptions' => ['width' => '200px']
        // ],
        'sub_skill_id' => [
            'label' => 'Sub Skill',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\modules\hrm\models\SubSkill::find()->orderBy('id')->asArray()->all(), 'id', 'sub_skill_code'),
                'options' => ['placeholder' => 'Choose Skill'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'how_many' => ['type' => TabularForm::INPUT_TEXT],
        'how_long' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => TabularForm::INPUT_STATIC,
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowEmployeehasskill(' . $key . '); return false;', 'id' => 'employeehasskill-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> ' . 'Employeehasskill' . '  </h3>',
            'type' => GridView::TYPE_INFO,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Row', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowEmployeehasskill()']),
        ]
    ]
]);
Pjax::end();
?>