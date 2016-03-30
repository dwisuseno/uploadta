<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\HrmPositionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hrm-position-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'jobs_id') ?>

    <?= $form->field($model, 'positions_code') ?>

    <?= $form->field($model, 'vacancy') ?>

    <?= $form->field($model, 'employee_id') ?>

    <?php // echo $form->field($model, 'positions_as') ?>

    <?php // echo $form->field($model, 'basic_salary') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
