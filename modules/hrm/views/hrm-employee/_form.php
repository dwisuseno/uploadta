<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\HrmEmployee */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'HrmDetailTraining', 
        'relID' => 'hrm-detail-training', 
        'value' => \yii\helpers\Json::encode($model->hrmDetailTrainings),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'HrmEmployeehaslevel', 
        'relID' => 'hrm-employeehaslevel', 
        'value' => \yii\helpers\Json::encode($model->hrmEmployeehaslevels),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'HrmHasshift', 
        'relID' => 'hrm-hasshift', 
        'value' => \yii\helpers\Json::encode($model->hrmHasshifts),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'HrmPayroll', 
        'relID' => 'hrm-payroll', 
        'value' => \yii\helpers\Json::encode($model->hrmPayrolls),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'HrmPosition', 
        'relID' => 'hrm-position', 
        'value' => \yii\helpers\Json::encode($model->hrmPositions),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'HrmSalary', 
        'relID' => 'hrm-salary', 
        'value' => \yii\helpers\Json::encode($model->hrmSalaries),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'HrmWorkRecord', 
        'relID' => 'hrm-work-record', 
        'value' => \yii\helpers\Json::encode($model->hrmWorkRecords),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="hrm-employee-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>
    
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
                            <?php if ($model->photo): ?>
                                <div class="form-group">
                                    <?= Html::img($model->photo, ['height'=>'100px']) ?>
                                </div>
                            <?php endif; ?>
                             <?= $form->field($model, 'file') -> fileInput(); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <?php if($model->id == null){?>
                                <?= $form->field($model, 'person_id')->widget(\kartik\widgets\Select2::classname(), [
                                    'data' => \yii\helpers\ArrayHelper::map(\app\modules\hrm\models\HrmCandidate::find()->where('status = :status', [':status' => '1'])
    ->orderBy('id')->asArray()->all(), 'id', 'person_id'),
                                    'options' => ['placeholder' => 'Choose Hired Candidate'],
                                    'pluginOptions' => [
                                        'allowClear' => true
                                    ],
                                ]) ?>
                            <?php} else {?>
                                <?= $form->field($model, 'person_id')->textInput(['maxlength' => true, 'placeholder' => 'Person Id']) ?>
                            <?php }?>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <?= $form->field($model, 'personnel_sub_area_id')->widget(\kartik\widgets\Select2::classname(), [
                                'data' => \yii\helpers\ArrayHelper::map(\app\modules\hrm\models\MasterPersonnelSubArea::find()->orderBy('id')->asArray()->all(), 'id', 'personnel_subarea_name'),
                                'options' => ['placeholder' => 'Choose Master personnel sub area'],
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
                                'data' => \yii\helpers\ArrayHelper::map(\app\modules\hrm\models\HrmBankAccount::find()->orderBy('id')->asArray()->all(), 'id', 'bankaccount_name'),
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

    <div class="form-group" id="add-hrm-detail-training"></div>

    <div class="form-group" id="add-hrm-employeehaslevel"></div>

    <div class="form-group" id="add-hrm-hasshift"></div>

    <div class="form-group" id="add-hrm-payroll"></div>

    <div class="form-group" id="add-hrm-position"></div>

    <div class="form-group" id="add-hrm-salary"></div>

    <div class="form-group" id="add-hrm-work-record"></div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
