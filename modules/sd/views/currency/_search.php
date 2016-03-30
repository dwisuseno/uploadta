<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\master\models\CurrencySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-currency-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'codeCurrency')->textInput(['maxlength' => true, 'placeholder' => 'CodeCurrency']) ?>

    <?= $form->field($model, 'nameCurrency')->textInput(['maxlength' => true, 'placeholder' => 'NameCurrency']) ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
