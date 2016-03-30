<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\GlBank */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="gl-bank-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'name_bank')->textInput(['maxlength' => true, 'placeholder' => 'Name Bank']) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'city_bank')->textInput(['maxlength' => true, 'placeholder' => 'City Bank']) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'country_id')->widget(\kartik\widgets\Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(\app\modules\master\models\Country::find()->orderBy('id')->asArray()->all(), 'id', 
                    function($model, $defaultValue) {
                        return $model['code_country'].' - '.$model['name_country'];
                    }
                ),
                'options' => ['placeholder' => 'Choose Country'],
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
