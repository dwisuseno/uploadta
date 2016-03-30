<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdCustomeraccount */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="sd-customeraccount-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'city_bank')->textInput(['maxlength' => true, 'placeholder' => 'City Bank']) ?>

    <?= $form->field($model, 'country_bank')->textInput(['maxlength' => true, 'placeholder' => 'Country Bank']) ?>

    <?= $form->field($model, 'key_bank')->textInput(['maxlength' => true, 'placeholder' => 'Key Bank']) ?>

    <?= $form->field($model, 'account_bank')->textInput(['maxlength' => true, 'placeholder' => 'Account Bank']) ?>

    <?= $form->field($model, 'holder_customeraccount')->textInput(['maxlength' => true, 'placeholder' => 'Holder Customeraccount']) ?>

    <?= $form->field($model, 'gl_bank_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\modules\sd\models\GlBank::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => 'Choose Gl bank'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'sd_customer_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\modules\sd\models\SdCustomer::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => 'Choose Sd customer'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'),['index'],['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
