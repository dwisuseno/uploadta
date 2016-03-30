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
    'formName' => 'HrmHasshift',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions'=>['hidden'=>true]],
        'employee_id' => [
            'label' => 'Hrm employee',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\modules\hrm\models\HrmEmployee::find()->orderBy('id')->asArray()->all(), 'id', 'person_id'),
                'options' => ['placeholder' => 'Choose Hrm employee'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        // 'shift_id' => [
        //     'label' => 'Hrm shift',
        //     'type' => TabularForm::INPUT_WIDGET,
        //     'widgetClass' => \kartik\widgets\Select2::className(),
        //     'options' => [
        //         'data' => \yii\helpers\ArrayHelper::map(\app\modules\hrm\models\HrmShift::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        //         'options' => ['placeholder' => 'Choose Hrm shift'],
        //     ],
        //     'columnOptions' => ['width' => '200px']
        // ],
        'del' => [
            'type' => TabularForm::INPUT_STATIC,
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowHrmHasshift(' . $key . '); return false;', 'id' => 'hrm-hasshift-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> ' . 'Hrm Has Shift' . '  </h3>',
            'type' => GridView::TYPE_INFO,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Row', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowHrmHasshift()']),
        ]
    ]
]);
Pjax::end();
?>