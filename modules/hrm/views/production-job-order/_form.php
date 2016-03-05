<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\ProductionJobOrder */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="production-job-order-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'operation_id')->textInput(['placeholder' => 'Operation']) ?>

    <?= $form->field($model, 'machine_id')->textInput(['placeholder' => 'Machine']) ?>

    <?= $form->field($model, 'employee_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\modules\hrm\models\Employee::find()->orderBy('id')->asArray()->all(), 'id', 'person_id'),
        'options' => ['placeholder' => 'Choose Employee'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'start_planning')->widget(\kartik\widgets\DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Choose Start Planning'],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'mm/dd/yyyy hh:ii:ss'
        ]
    ]) ?>

    <?= $form->field($model, 'end_planning')->widget(\kartik\widgets\DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Choose End Planning'],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'mm/dd/yyyy hh:ii:ss'
        ]
    ]) ?>

    <?= $form->field($model, 'start_real')->widget(\kartik\widgets\DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Choose Start Real'],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'mm/dd/yyyy hh:ii:ss'
        ]
    ]) ?>

    <?= $form->field($model, 'end_real')->widget(\kartik\widgets\DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Choose End Real'],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'mm/dd/yyyy hh:ii:ss'
        ]
    ]) ?>

    <?= $form->field($model, 'planning_duration')->textInput(['maxlength' => true, 'placeholder' => 'Planning Duration']) ?>

    <?= $form->field($model, 'real_duration')->textInput(['maxlength' => true, 'placeholder' => 'Real Duration']) ?>

    <?= $form->field($model, 'quantity_produced')->textInput(['placeholder' => 'Quantity Produced']) ?>

    <?= $form->field($model, 'time_per_production')->textInput(['maxlength' => true, 'placeholder' => 'Time Per Production']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
