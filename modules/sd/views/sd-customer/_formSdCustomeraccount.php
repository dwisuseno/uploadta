<?php
use kartik\grid\GridView;
use kartik\builder\TabularForm;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\widgets\Pjax;

Pjax::begin();
$dataProvider = new ArrayDataProvider([
    'allModels' => $row,
    'pagination' => [
        'pageSize' => -1
    ]
]);
echo TabularForm::widget([
    'dataProvider' => $dataProvider,
    'formName' => 'SdCustomeraccount',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions'=>['hidden'=>true]],
        'gl_bank_id' => [
            'label' => 'Gl bank',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\modules\sd\models\GlBank::find()->orderBy('id')->asArray()->all(), 'id', 'name_bank'),
                'options' => ['placeholder' => 'Choose Gl bank', 'onchange' => 'getBank($(this))'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'city_bank' => ['type' => TabularForm::INPUT_TEXT],
        'country_bank' => ['type' => TabularForm::INPUT_TEXT],
        'key_bank' => ['type' => TabularForm::INPUT_TEXT],
        'account_bank' => ['type' => TabularForm::INPUT_TEXT],
        'holder_customeraccount' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowSdCustomeraccount(' . $key . '); return false;', 'id' => 'sd-customeraccount-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . 'Sd Customeraccount',
            'type' => GridView::TYPE_INFO,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Row', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowSdCustomeraccount()']),
        ]
    ]
]);
Pjax::end();
?>
