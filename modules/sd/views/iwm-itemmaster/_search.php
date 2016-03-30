<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\IwmItemmasterSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-iwm-itemmaster-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'code_itemmaster')->textInput(['maxlength' => true, 'placeholder' => 'Code Itemmaster']) ?>

    <?= $form->field($model, 'desc_itemmaster')->textInput(['maxlength' => true, 'placeholder' => 'Desc Itemmaster']) ?>

    <?= $form->field($model, 'weight_itemmaster')->textInput(['placeholder' => 'Weight Itemmaster']) ?>

    <?= $form->field($model, 'price_itemmaster')->textInput(['placeholder' => 'Price Itemmaster']) ?>

    <?php /* echo $form->field($model, 'uom_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\modules\sd\models\Uom::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => 'Choose Uom'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) */ ?>

    <?php /* echo $form->field($model, 'currency_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\modules\sd\models\Currency::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => 'Choose Currency'],
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
