<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\Employee */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Employeehasskill', 
        'relID' => 'employeehasskill', 
        'value' => \yii\helpers\Json::encode($model->employeehasskills),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Payroll', 
        'relID' => 'payroll', 
        'value' => \yii\helpers\Json::encode($model->payrolls),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Positions', 
        'relID' => 'positions', 
        'value' => \yii\helpers\Json::encode($model->positions),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Salary', 
        'relID' => 'salary', 
        'value' => \yii\helpers\Json::encode($model->salaries),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'SasaranStrategis', 
        'relID' => 'sasaran-strategis', 
        'value' => \yii\helpers\Json::encode($model->sasaranStrategis),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="employee-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Header</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                  <div class="box-body">
                    <div class="row">
                        <div class="col-md-3">
                            <?= $form->field($model, 'person_id')->textInput(['maxlength' => true, 'placeholder' => 'Person']) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <?= $form->field($model, 'personnel_sub_area_id')->widget(\kartik\widgets\Select2::classname(), [
                                'data' => \yii\helpers\ArrayHelper::map(\app\modules\hrm\models\PersonnelSubArea::find()->orderBy('id')->asArray()->all(), 'id', 'personnel_subarea_name'),
                                'options' => ['placeholder' => 'Choose Personnel sub area'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <?= $form->field($model, 'start_work')->widget(\kartik\widgets\DateTimePicker::classname(), [
                                'options' => ['placeholder' => 'Choose Start Work'],
                                'pluginOptions' => [
                                    'autoclose' => true,
                                    'format' => 'yyyy/mm/dd hh:ii:ss'
                                ]
                            ]) ?>
                        </div>
                        <div class="col-md-3">
                            <?= $form->field($model, 'to_work')->widget(\kartik\widgets\DateTimePicker::classname(), [
                                'options' => ['placeholder' => 'Choose To Work'],
                                'pluginOptions' => [
                                    'autoclose' => true,
                                    'format' => 'yyyy/mm/dd hh:ii:ss'
                                ]
                            ]) ?>
                        </div>
                        <div class="col-md-3">
                            <?= $form->field($model, 'status')->dropDownList([ 'Active' => 'Active', 'Inactive' => 'Inactive', ], ['prompt' => '']) ?>
                        </div>
                        <div class="col-md-3">
                             <?= $form->field($model, 'type')->dropDownList([ 'Indirect' => 'Indirect', 'Direct' => 'Direct', ], ['prompt' => '']) ?>
                        </div>
                    </div>
                    </div><!-- /.box-body -->      
              </div><!-- /.box -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Name</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-2">
                            <?= $form->field($model, 'title')->dropDownList([ 'Mr' => 'Mr', 'Mrs' => 'Mrs', 'Unknown' => 'Unknown', ], ['prompt' => '']) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <?= $form->field($model, 'first_name')->textInput(['maxlength' => true, 'placeholder' => 'First Name']) ?>
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($model, 'middle_name')->textInput(['maxlength' => true, 'placeholder' => 'Middle Name']) ?>
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($model, 'last_name')->textInput(['maxlength' => true, 'placeholder' => 'Last Name']) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <?= $form->field($model, 'nickname')->textInput(['maxlength' => true, 'placeholder' => 'Nickname']) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <?= $form->field($model, 'photo')->textInput(['maxlength' => true, 'placeholder' => 'Photo']) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>
                        </div>
                    </div>
                </div>
            </div><!-- /.box -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">HR Data</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-2">
                            <?= $form->field($model, 'personnel_number')->textInput(['maxlength' => true, 'placeholder' => 'Personnel Number']) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <?= $form->field($model, 'last_education')->textInput(['maxlength' => true, 'placeholder' => 'Last Education']) ?>
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($model, 'gender')->dropDownList([ 'Male' => 'Male', 'Female' => 'Female', ], ['prompt' => '']) ?>
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($model, 'date_of_birth')->widget(\kartik\widgets\DatePicker::classname(), [
                                'options' => ['placeholder' => 'Choose Date Of Birth'],
                                'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
                                'pluginOptions' => [
                                    'autoclose' => true,
                                    'format' => 'yyyy-mm-dd'
                                ]
                            ]); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <?= $form->field($model, 'language')->textInput(['maxlength' => true, 'placeholder' => 'Language']) ?>
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Email']) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <?= $form->field($model, 'nationality')->textInput(['maxlength' => true, 'placeholder' => 'Nationality']) ?>
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($model, 'marital_status')->dropDownList([ 'Single' => 'Single', 'Married' => 'Married', ], ['prompt' => '']) ?>
                        </div>
                    </div>
                </div>
            </div><!-- /.box -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Others</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-3">
                            <?= $form->field($model, 'bank_account_id')->widget(\kartik\widgets\Select2::classname(), [
                                'data' => \yii\helpers\ArrayHelper::map(\app\modules\hrm\models\BankAccount::find()->orderBy('id')->asArray()->all(), 'id', 'bankaccount_name'),
                                'options' => ['placeholder' => 'Choose Bank account'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]) ?>
                        </div>
                        <!-- <div class="col-md-3">
                            <br>
                            <a href="">Create New Bank Account</a>
                        </div> -->

                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <?= $form->field($model, 'bank_account_own')->textInput(['maxlength' => true, 'placeholder' => 'Bank Account Own']) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                             <?= $form->field($model, 'bank_account_number')->textInput(['maxlength' => true, 'placeholder' => 'Bank Account Number']) ?>
                        </div>
                    </div>
                </div>
            </div><!-- /.box -->
        </div>
    </div>
   
<!-- 
    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true, 'placeholder' => 'Password']) ?> -->

    <div class="form-group" id="add-employeehasskill"></div>

    <div class="form-group" id="add-payroll"></div>

    <div class="form-group" id="add-positions"></div>

    <div class="form-group" id="add-salary"></div>

    <div class="form-group" id="add-sasaran-strategis"></div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
