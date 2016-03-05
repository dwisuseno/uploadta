<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KpiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kpi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'sasaranstrategis_id') ?>

    <?= $form->field($model, 'kpitype_id') ?>

    <?= $form->field($model, 'weight') ?>

    <?= $form->field($model, 'target') ?>

    <?php // echo $form->field($model, 'realisasi') ?>

    <?php // echo $form->field($model, 'skor') ?>

    <?php // echo $form->field($model, 'final_skor') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
