<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdDchlSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-sd-dchl-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'code_dchl')->textInput(['maxlength' => true, 'placeholder' => 'Code Dchl']) ?>

    <?= $form->field($model, 'name_dchl')->textInput(['maxlength' => true, 'placeholder' => 'Name Dchl']) ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
