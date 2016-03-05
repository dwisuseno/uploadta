<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Hrdata */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Employeehashrdata', 
        'relID' => 'employeehashrdata', 
        'value' => \yii\helpers\Json::encode($model->employeehashrdatas),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="hrdata-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'employee_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Employee::find()->orderBy('id')->asArray()->all(), 'id', 'employee_id'),
        'options' => ['placeholder' => 'Choose Employee'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'personnelnumber')->textInput(['maxlength' => true, 'placeholder' => 'Personnelnumber']) ?>

    <?= $form->field($model, 'date_of_birth')->widget(\kartik\widgets\DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Choose Date Of Birth'],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'mm/dd/yyyy hh:ii:ss'
        ]
    ]) ?>

    <?= $form->field($model, 'language')->textInput(['maxlength' => true, 'placeholder' => 'Language']) ?>

    <?= $form->field($model, 'nationality')->textInput(['maxlength' => true, 'placeholder' => 'Nationality']) ?>

    <?= $form->field($model, 'marital_status')->textInput(['maxlength' => true, 'placeholder' => 'Marital Status']) ?>

    <?= $form->field($model, 'children')->textInput(['placeholder' => 'Children']) ?>

    <?= $form->field($model, 'bankaccount_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Bankaccount::find()->orderBy('id')->asArray()->all(), 'id', 'bankaccount_name'),
        'options' => ['placeholder' => 'Choose Bankaccount'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <div class="form-group" id="add-employeehashrdata"></div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
