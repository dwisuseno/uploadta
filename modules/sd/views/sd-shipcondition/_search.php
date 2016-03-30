<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdShipconditionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-sd-shipcondition-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'code_shipcondition')->textInput(['maxlength' => true, 'placeholder' => 'Code Shipcondition']) ?>

    <?= $form->field($model, 'desc_shipcondition')->textInput(['maxlength' => true, 'placeholder' => 'Desc Shipcondition']) ?>

    <?php /* echo $form->field($model, 'picktime_shipcondition')->textInput(['placeholder' => 'Picktime Shipcondition']) */ ?>

    <?php /* echo $form->field($model, 'workday_shipcondition')->textInput(['maxlength' => true, 'placeholder' => 'Workday Shipcondition']) */ ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
