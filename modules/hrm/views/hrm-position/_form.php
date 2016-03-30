<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\HrmPosition */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'HrmEmployeeGroup', 
        'relID' => 'hrm-employee-group', 
        'value' => \yii\helpers\Json::encode($model->hrmEmployeeGroups),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="hrm-position-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'jobs_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\modules\hrm\models\HrmJob::find()->orderBy('id')->asArray()->all(), 'id', 'jobs_code'),
        'options' => ['placeholder' => 'Choose Hrm job'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'positions_code')->textInput(['maxlength' => true, 'placeholder' => 'Positions Code']) ?>

    <?= $form->field($model, 'vacancy')->dropDownList([ 'Open' => 'Open', 'Closed' => 'Closed', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'employee_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\modules\hrm\models\HrmEmployee::find()->orderBy('id')->asArray()->all(), 'id', 'personnel_number'),
        'options' => ['placeholder' => 'Choose Hrm employee'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'positions_as')->dropDownList([ 'Head' => 'Head', 'Staff' => 'Staff', 'Labour' => 'Labour', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'basic_salary')->textInput(['placeholder' => 'Basic Salary']) ?>

    <div class="form-group" id="add-hrm-employee-group"></div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
