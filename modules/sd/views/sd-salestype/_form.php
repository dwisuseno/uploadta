<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdSalestype */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="sd-salestype-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'code_salestype')->textInput(['maxlength' => true, 'placeholder' => 'Code Salestype']) ?>
        </div>
        <div class="col-lg-8">
            <?= $form->field($model, 'desc_salestype')->textInput(['maxlength' => true, 'placeholder' => 'Desc Salestype']) ?>
        </div>
    </div>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'),['index'],['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
