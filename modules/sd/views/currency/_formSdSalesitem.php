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
    'formName' => 'SdSalesitem',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions'=>['hidden'=>true]],
        'quantity_salesitem' => ['type' => TabularForm::INPUT_TEXT],
        'uom_salesitem' => ['type' => TabularForm::INPUT_TEXT],
        'desc_salesitem' => ['type' => TabularForm::INPUT_TEXT],
        'price_salesitem' => ['type' => TabularForm::INPUT_TEXT],
        'priceori_salesitem' => ['type' => TabularForm::INPUT_TEXT],
        'linetotal_salesitem' => ['type' => TabularForm::INPUT_TEXT],
        'delivqty_salesitem' => ['type' => TabularForm::INPUT_TEXT],
        'confirmqty_salesitem' => ['type' => TabularForm::INPUT_TEXT],
        'pickqty' => ['type' => TabularForm::INPUT_TEXT],
        'batch' => ['type' => TabularForm::INPUT_TEXT],
        'weight_salesitem' => ['type' => TabularForm::INPUT_TEXT],
        'currency_id' => ['type' => TabularForm::INPUT_TEXT],
        'iwm_item_master_id' => [
            'label' => 'Iwm item master',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\modules\master\models\IwmItemMaster::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => 'Choose Iwm item master'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'sd_sale_id' => [
            'label' => 'Sd sale',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\modules\master\models\SdSale::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => 'Choose Sd sale'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowSdSalesitem(' . $key . '); return false;', 'id' => 'sd-salesitem-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . 'Sd Salesitem',
            'type' => GridView::TYPE_INFO,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Row', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowSdSalesitem()']),
        ]
    ]
]);
Pjax::end();
?>
