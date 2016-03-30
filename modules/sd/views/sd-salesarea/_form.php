<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdSalesarea */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="sd-salesarea-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'code_salesarea')->textInput(['maxlength' => true, 'placeholder' => 'Code Salesarea']) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'company_id')->widget(\kartik\widgets\Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(\app\modules\master\models\Company::find()->orderBy('id')->asArray()->all(), 'id',
                    function($model, $defaultValue) {
                        return $model['company_code'].' - '.$model['company_name'];
                    }
                ),
                'options' => ['placeholder' => 'Choose Company'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'status_salesarea')->widget(\kartik\widgets\Select2::classname(), [
                'data' => ['Active' => 'Active', 'Inactive' => 'Inactive'],
                'options' => ['placeholder' => 'Status Salesarea'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'sd_salesorg_id')->widget(\kartik\widgets\Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(\app\modules\sd\models\SdSalesorg::find()->orderBy('id')->asArray()->all(), 'id', 
                    function($model, $defaultValue) {
                        return $model['code_salesorg'].' - '.$model['name_salesorg'];
                    }
                ),
                'options' => ['placeholder' => 'Choose Sd salesorg'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'sd_dchl_id')->widget(\kartik\widgets\Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(\app\modules\sd\models\SdDchl::find()->orderBy('id')->asArray()->all(), 'id', 
                    function($model, $defaultValue) {
                        return $model['code_dchl'].' - '.$model['name_dchl'];
                    }
                ),
                'options' => ['placeholder' => 'Choose Sd dchl'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'sd_division_id')->widget(\kartik\widgets\Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(\app\modules\sd\models\SdDivision::find()->orderBy('id')->asArray()->all(), 'id', 
                    function($model, $defaultValue) {
                        return $model['code_division'].' - '.$model['name_division'];
                    }
                ),
                'options' => ['placeholder' => 'Choose Sd division'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'),['index'],['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
