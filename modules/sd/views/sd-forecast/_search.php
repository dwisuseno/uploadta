<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdForecastSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-sd-forecast-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'code_forecast')->textInput(['maxlength' => true, 'placeholder' => 'Code Forecast']) ?>

    <?= $form->field($model, 'year_forecast')->textInput(['placeholder' => 'Year Forecast']) ?>

    <?= $form->field($model, 'demand_forecast')->textInput(['placeholder' => 'Demand Forecast']) ?>

    <?= $form->field($model, 'month_forecast')->textInput(['maxlength' => true, 'placeholder' => 'Month Forecast']) ?>

    <?php /* echo $form->field($model, 'predict_forecast')->textInput(['placeholder' => 'Predict Forecast']) */ ?>

    <?php /* echo $form->field($model, 'error_forecast')->textInput(['placeholder' => 'Error Forecast']) */ ?>

    <?php /* echo $form->field($model, 'sd_sale_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\modules\sd\models\SdSale::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => 'Choose Sd sale'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) */ ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
