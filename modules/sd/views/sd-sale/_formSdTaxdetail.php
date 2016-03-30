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
    'formName' => 'SdTaxdetail',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions'=>['hidden'=>true]],
        'tax_id' => [
            'label' => 'Tax',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\modules\master\models\Tax::find()->orderBy('id')->asArray()->all(), 'id', 'code_tax'),
                'options' => ['placeholder' => 'Choose Tax', 'onchange' => 'getTax($(this))'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'name_taxdetail' => ['type' => TabularForm::INPUT_TEXT],
        'value_taxdetail' => ['type' => TabularForm::INPUT_TEXT, 'options' => ['class' => 'tax-line']],
        'currency_id' => [
            'label' => 'Currency',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\modules\master\models\Currency::find()->orderBy('id')->asArray()->all(), 'id', 'codeCurrency'),
                'options' => ['placeholder' => 'Choose Currency'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'country_taxdetail' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowSdTaxdetail(' . $key . '); return false;', 'id' => 'sd-taxdetail-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . 'Sd Taxdetail',
            'type' => GridView::TYPE_INFO,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Row', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowSdTaxdetail()']),
        ]
    ]
]);
Pjax::end();
?>
