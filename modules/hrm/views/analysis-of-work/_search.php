<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\AnalysisOfWorkSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="analysis-of-work-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'employee_id') ?>

    <?= $form->field($model, 'sub_skill_id') ?>

    <?= $form->field($model, 'count') ?>

    <?= $form->field($model, 'late_time') ?>

    <?php // echo $form->field($model, 'on_time') ?>

    <?php // echo $form->field($model, 'wage') ?>

    <?php // echo $form->field($model, 'on_time_bonus') ?>

    <?php // echo $form->field($model, 'total_work_time') ?>

    <?php // echo $form->field($model, 'total_late_time') ?>

    <?php // echo $form->field($model, 'total_on_time') ?>

    <?php // echo $form->field($model, 'total_wage') ?>

    <?php // echo $form->field($model, 'total_loss') ?>

    <?php // echo $form->field($model, 'total_on_time_bonus') ?>

    <?php // echo $form->field($model, 'variance') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
