<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Bankaccount */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Hrdata', 
        'relID' => 'hrdata', 
        'value' => \yii\helpers\Json::encode($model->hrdatas),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="bankaccount-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'bankaccount_name')->textInput(['maxlength' => true, 'placeholder' => 'Bankaccount Name']) ?>

    <?= $form->field($model, 'bankaccount_number')->textInput(['maxlength' => true, 'placeholder' => 'Bankaccount Number']) ?>

    <?= $form->field($model, 'bankaccount_own')->textInput(['maxlength' => true, 'placeholder' => 'Bankaccount Own']) ?>

    <div class="form-group" id="add-hrdata"></div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
