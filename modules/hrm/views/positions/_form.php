<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\Positions */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'EmployeeGroup', 
        'relID' => 'employee-group', 
        'value' => \yii\helpers\Json::encode($model->employeeGroups),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="positions-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'jobs_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\modules\hrm\models\Jobs::find()->orderBy('id')->asArray()->all(), 'id', 'jobs_code'),
        'options' => ['placeholder' => 'Choose Jobs'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'positions_code')->textInput(['maxlength' => true, 'placeholder' => 'Positions Code']) ?>

    <?= $form->field($model, 'vacancy')->dropDownList([ 'Open' => 'Open', 'Closed' => 'Closed', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'employee_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\modules\hrm\models\Employee::find()->orderBy('id')->asArray()->all(), 'id', 'personnel_number'),
        'options' => ['placeholder' => 'Choose Employee'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'positions_as')->dropDownList([ 'Head' => 'Head', 'Staff' => 'Staff', 'Labour' => 'Labour', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'basic_salary')->textInput(['placeholder' => 'Basic Salary']) ?>

    <div class="form-group" id="add-employee-group"></div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
