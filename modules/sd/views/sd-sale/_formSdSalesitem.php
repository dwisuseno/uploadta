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
        'iwm_item_master_id' => [
            'label' => 'Iwm item master',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\modules\iwm\models\IwmItemMaster::find()
                    ->where('item_type = "Finished Good"')->orderBy('id')->asArray()->all(), 'id', 'item_name'),
                'options' => ['placeholder' => 'Choose Iwm item master', 'onchange' => 'getItem($(this))'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'quantity_salesitem' => ['label' => 'Quantity', 'type' => TabularForm::INPUT_TEXT, 'options' => ['onkeyup' => 'getQty($(this))']],
        'desc_salesitem' => ['label' => 'Item Description', 'type' => TabularForm::INPUT_TEXT],
        'uom_salesitem' => [
            'label' => 'Item Uom',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\modules\master\models\Uom::find()->orderBy('id')->asArray()->all(), 'id', 'uom_name'),
                'options' => ['placeholder' => 'Choose Uom'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'batch' => ['type' => TabularForm::INPUT_TEXT],
        'price_salesitem' => ['label' => 'Item Price', 'type' => TabularForm::INPUT_TEXT, 'options' => ['onkeyup' => 'getPrice($(this))']],
        'priceori_salesitem' => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions'=>['hidden'=>true]],
        'currency_id' => [
            'label' => 'Item Currency',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\modules\master\models\Currency::find()->orderBy('id')->asArray()->all(), 'id', 'codeCurrency'),
                'options' => ['placeholder' => 'Choose Currency'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'weight_salesitem' => ['label' => 'Weight Item', 'type' => TabularForm::INPUT_TEXT, 'options' => [ 'class' => 'weight-total']],
        'linetotal_salesitem' => ['label' => 'Total Price', 'type' => TabularForm::INPUT_TEXT, 'options' => ['Value' => 0, 'readOnly' => true, 'class' => 'line-total']],
        'confirmqty_salesitem' => ['label' => 'Confirmed Qty', 'type' => TabularForm::INPUT_TEXT, 'options' => ['Value' => 0 , 'readOnly' => true]],
        'pickqty' => ['label' => 'Picked Qty', 'type' => TabularForm::INPUT_TEXT, 'options' => ['Value' => 0 , 'readOnly' => true]],        
        'delivqty_salesitem' => ['label' => 'Delivered Qty', 'type' => TabularForm::INPUT_TEXT, 'options' => ['Value' => 0 , 'readOnly' => true]],
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
