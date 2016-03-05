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
    'formName' => 'Kpi',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        'sasaranstrategis_id' => [
            'label' => 'Sasaranstrategis',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\Sasaranstrategis::find()->orderBy('employee_id')->asArray()->all(), 'id', 'employee_id'),
                'options' => ['placeholder' => 'Choose Sasaranstrategis'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'kpitype_id' => [
            'label' => 'Kpitype',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\Kpitype::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => 'Choose Kpitype'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'weight' => ['type' => TabularForm::INPUT_TEXT],
        'target' => ['type' => TabularForm::INPUT_TEXT],
        'realisasi' => ['type' => TabularForm::INPUT_TEXT],
        'skor' => ['type' => TabularForm::INPUT_TEXT],
        'final_skor' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => TabularForm::INPUT_STATIC,
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowKpi(' . $key . '); return false;', 'id' => 'kpi-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . 'Kpi',
            'type' => GridView::TYPE_INFO,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Row', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowKpi()']),
        ]
    ]
]);
Pjax::end();
?>