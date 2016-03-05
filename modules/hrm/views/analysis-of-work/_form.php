<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\AnalysisOfWork */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="analysis-of-work-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'employee_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\modules\hrm\models\Employee::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => 'Choose Employee'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'sub_skill_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\modules\hrm\models\SubSkill::find()->orderBy('id')->asArray()->all(), 'id', 'sub_skill_code'),
        'options' => ['placeholder' => 'Choose Sub skill'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'count')->textInput(['placeholder' => 'Count']) ?>

    <?= $form->field($model, 'late_time')->textInput(['placeholder' => 'Late Time']) ?>

    <?= $form->field($model, 'on_time')->textInput(['placeholder' => 'On Time']) ?>

    <?= $form->field($model, 'wage')->textInput(['placeholder' => 'Wage']) ?>

    <?= $form->field($model, 'on_time_bonus')->textInput(['placeholder' => 'On Time Bonus']) ?>

    <?= $form->field($model, 'total_work_time')->textInput(['placeholder' => 'Total Work Time']) ?>

    <?= $form->field($model, 'total_late_time')->textInput(['placeholder' => 'Total Late Time']) ?>

    <?= $form->field($model, 'total_on_time')->textInput(['placeholder' => 'Total On Time']) ?>

    <?= $form->field($model, 'total_wage')->textInput(['placeholder' => 'Total Wage']) ?>

    <?= $form->field($model, 'total_loss')->textInput(['placeholder' => 'Total Loss']) ?>

    <?= $form->field($model, 'total_on_time_bonus')->textInput(['placeholder' => 'Total On Time Bonus']) ?>

    <?= $form->field($model, 'variance')->textInput(['placeholder' => 'Variance']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
