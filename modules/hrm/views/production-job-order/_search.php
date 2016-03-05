<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\ProductionJobOrderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="production-job-order-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'operation_id') ?>

    <?= $form->field($model, 'machine_id') ?>

    <?= $form->field($model, 'employee_id') ?>

    <?= $form->field($model, 'start_planning') ?>

    <?php // echo $form->field($model, 'end_planning') ?>

    <?php // echo $form->field($model, 'start_real') ?>

    <?php // echo $form->field($model, 'end_real') ?>

    <?php // echo $form->field($model, 'planning_duration') ?>

    <?php // echo $form->field($model, 'real_duration') ?>

    <?php // echo $form->field($model, 'quantity_produced') ?>

    <?php // echo $form->field($model, 'time_per_production') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
