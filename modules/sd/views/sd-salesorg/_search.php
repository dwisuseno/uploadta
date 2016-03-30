<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdSalesorgSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-sd-salesorg-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'code_salesorg')->textInput(['maxlength' => true, 'placeholder' => 'Code Salesorg']) ?>

    <?= $form->field($model, 'name_salesorg')->textInput(['maxlength' => true, 'placeholder' => 'Name Salesorg']) ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
