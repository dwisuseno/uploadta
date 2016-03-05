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
    'formName' => 'Employee',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        'personnel_sub_area_id' => [
            'label' => 'Personnel sub area',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\modules\hrm\models\PersonnelSubArea::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => 'Choose Personnel sub area'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'person_id' => ['type' => TabularForm::INPUT_TEXT],
        'title' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'options' => [
                        'items' => [ 'Mr' => 'Mr', 'Mrs' => 'Mrs', 'Unknown' => 'Unknown', ],
                        'columnOptions => ['width' => '185px'],
                        'options' => ['placeholder' => 'Choose Title'],
                    ]
        ],
        'first_name' => ['type' => TabularForm::INPUT_TEXT],
        'middle_name' => ['type' => TabularForm::INPUT_TEXT],
        'last_name' => ['type' => TabularForm::INPUT_TEXT],
        'address' => ['type' => TabularForm::INPUT_TEXTAREA],
        'photo' => ['type' => TabularForm::INPUT_TEXT],
        'positions_id' => ['type' => TabularForm::INPUT_TEXT],
        'nickname' => ['type' => TabularForm::INPUT_TEXT],
        'start_work' => ['type' => TabularForm::INPUT_WIDGET,
        'widgetClass' => \kartik\widgets\DateTimePicker::classname(),
        'options' => [
            'options' => ['placeholder' => 'Choose Start Work'],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'hh:ii:ss dd-M-yyyy'
            ]
        ]
],
        'last_education' => ['type' => TabularForm::INPUT_TEXT],
        'gender' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'options' => [
                        'items' => [ 'Male' => 'Male', 'Female' => 'Female', ],
                        'columnOptions => ['width' => '185px'],
                        'options' => ['placeholder' => 'Choose Gender'],
                    ]
        ],
        'to_work' => ['type' => TabularForm::INPUT_WIDGET,
        'widgetClass' => \kartik\widgets\DateTimePicker::classname(),
        'options' => [
            'options' => ['placeholder' => 'Choose To Work'],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'hh:ii:ss dd-M-yyyy'
            ]
        ]
],
        'status' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'options' => [
                        'items' => [ 'Active' => 'Active', 'Inactive' => 'Inactive', ],
                        'columnOptions => ['width' => '185px'],
                        'options' => ['placeholder' => 'Choose Status'],
                    ]
        ],
        'personnel_number' => ['type' => TabularForm::INPUT_TEXT],
        'date_of_birth' => ['type' => TabularForm::INPUT_WIDGET,
        'widgetClass' => \kartik\widgets\DatePicker::classname(),
        'options' => [
            'options' => ['placeholder' => 'Choose Date Of Birth'],
            'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yyyy'
            ]
        ]
],
        'language' => ['type' => TabularForm::INPUT_TEXT],
        'nationality' => ['type' => TabularForm::INPUT_TEXT],
        'marital_status' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'options' => [
                        'items' => [ 'Single' => 'Single', 'Married' => 'Married', ],
                        'columnOptions => ['width' => '185px'],
                        'options' => ['placeholder' => 'Choose Marital Status'],
                    ]
        ],
        'bank_account_id' => [
            'label' => 'Bank account',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\modules\hrm\models\BankAccount::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => 'Choose Bank account'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'bank_account_own' => ['type' => TabularForm::INPUT_TEXT],
        'bank_account_number' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => TabularForm::INPUT_STATIC,
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowEmployee(' . $key . '); return false;', 'id' => 'employee-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . 'Employee',
            'type' => GridView::TYPE_INFO,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Row', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowEmployee()']),
        ]
    ]
]);
Pjax::end();
?>