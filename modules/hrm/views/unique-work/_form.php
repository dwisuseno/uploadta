<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\UniqueWork */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="unique-work-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'employee_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\modules\hrm\models\Employee::find()->orderBy('id')->asArray()->all(), 'id', 'person_id'),
        'options' => ['placeholder' => 'Choose Employee'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'start_real')->widget(\kartik\widgets\DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Choose Start Real'],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy/mm/dd hh:ii:ss'
        ]
    ]) ?>

    <?= $form->field($model, 'end_real')->widget(\kartik\widgets\DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Choose End Real'],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy/mm/dd hh:ii:ss'
        ]
    ]) ?>

    <?= $form->field($model, 'duration_plan')->textInput(['placeholder' => 'Duration Plan']) ?>

    <?= $form->field($model, 'duration_real')->textInput(['placeholder' => 'Duration Real']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
