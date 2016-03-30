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
    'formName' => 'SdCustomer',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions'=>['hidden'=>true]],
        'code_customer' => ['type' => TabularForm::INPUT_TEXT],
        'title_customer' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'options' => [
                        'items' => [ 'Mr.' => 'Mr.', 'Mrs.' => 'Mrs.', 'Ms.' => 'Ms.', 'Company' => 'Company', ],
                        'columnOptions => ['width' => '185px'],
                        'options' => ['placeholder' => 'Choose Title Customer'],
                    ]
        ],
        'name_customer' => ['type' => TabularForm::INPUT_TEXT],
        'street_customer' => ['type' => TabularForm::INPUT_TEXT],
        'postal_customer' => ['type' => TabularForm::INPUT_TEXT],
        'city_customer' => ['type' => TabularForm::INPUT_TEXT],
        'pay_customer' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'options' => [
                        'items' => [ 'Cash' => 'Cash', 'Bank Transfer' => 'Bank Transfer', 'Cheque' => 'Cheque', ],
                        'columnOptions => ['width' => '185px'],
                        'options' => ['placeholder' => 'Choose Pay Customer'],
                    ]
        ],
        'probability_customer' => ['type' => TabularForm::INPUT_TEXT],
        'delivprior_customer' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'options' => [
                        'items' => [ 'Standard' => 'Standard', 'Urgent' => 'Urgent', ],
                        'columnOptions => ['width' => '185px'],
                        'options' => ['placeholder' => 'Choose Delivprior Customer'],
                    ]
        ],
        'pb_customer' => ['type' => TabularForm::INPUT_TEXT],
        'telp_customer' => ['type' => TabularForm::INPUT_TEXT],
        'telpext_customer' => ['type' => TabularForm::INPUT_TEXT],
        'mobile_customer' => ['type' => TabularForm::INPUT_TEXT],
        'email_customer' => ['type' => TabularForm::INPUT_TEXT],
        'comment_customer' => ['type' => TabularForm::INPUT_TEXTAREA],
        'sd_salesarea_id' => [
            'label' => 'Sd salesarea',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\modules\sd\models\SdSalesarea::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => 'Choose Sd salesarea'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'ar_payterm_id' => [
            'label' => 'Ar payterm',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\modules\sd\models\ArPayterm::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => 'Choose Ar payterm'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'sd_cp_id' => [
            'label' => 'Sd cp',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\modules\sd\models\SdCp::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => 'Choose Sd cp'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'currency_id' => [
            'label' => 'Currency',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\modules\sd\models\Currency::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => 'Choose Currency'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'ar_dunning_id' => [
            'label' => 'Ar dunning',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\modules\sd\models\ArDunning::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => 'Choose Ar dunning'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'country_id' => [
            'label' => 'Country',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\modules\sd\models\Country::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => 'Choose Country'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowSdCustomer(' . $key . '); return false;', 'id' => 'sd-customer-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . 'Sd Customer',
            'type' => GridView::TYPE_INFO,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Row', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowSdCustomer()']),
        ]
    ]
]);
Pjax::end();
?>
