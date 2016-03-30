<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdPrice */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="sd-price-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'code_price')->textInput(['maxlength' => true, 'placeholder' => 'Code Price']) ?>
        </div>
        <div class="col-lg-8">
            <?= $form->field($model, 'name_price')->textInput(['maxlength' => true, 'placeholder' => 'Name Price']) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'amount_price')->textInput(['placeholder' => 'Amount Price']) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'currency_id')->widget(\kartik\widgets\Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(\app\modules\master\models\Currency::find()->orderBy('id')->asArray()->all(), 'id', 
                    function($model, $defaultValue) {
                        return $model['codeCurrency'].' - '.$model['nameCurrency'];
                    }
                ),
                'options' => ['placeholder' => 'Choose Currency'],
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
