<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdForecast */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="sd-forecast-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'code_forecast')->textInput(['maxlength' => true, 'placeholder' => 'Code Forecast']) ?>

    <?= $form->field($model, 'year_forecast')->textInput(['placeholder' => 'Year Forecast']) ?>

    <?= $form->field($model, 'demand_forecast')->textInput(['placeholder' => 'Demand Forecast']) ?>

    <?= $form->field($model, 'month_forecast')->textInput(['maxlength' => true, 'placeholder' => 'Month Forecast']) ?>

    <?= $form->field($model, 'predict_forecast')->textInput(['placeholder' => 'Predict Forecast']) ?>

    <?= $form->field($model, 'error_forecast')->textInput(['placeholder' => 'Error Forecast']) ?>

    <?= $form->field($model, 'sd_sale_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\modules\sd\models\SdSale::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => 'Choose Sd sale'],
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
