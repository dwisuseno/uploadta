<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\HrmInfotype */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="hrm-infotype-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'infotype')->textInput(['maxlength' => true, 'placeholder' => 'Infotype']) ?>

    <?= $form->field($model, 'infotype_name')->textInput(['maxlength' => true, 'placeholder' => 'Infotype Name']) ?>

    <?= $form->field($model, 'status')->dropDownList([ '0', '1', '2', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
