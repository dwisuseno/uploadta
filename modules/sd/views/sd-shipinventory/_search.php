<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdShipinventorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-sd-shipinventory-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'code_shipinventory')->textInput(['maxlength' => true, 'placeholder' => 'Code Shipinventory']) ?>

    <?= $form->field($model, 'name_shipinventory')->textInput(['maxlength' => true, 'placeholder' => 'Name Shipinventory']) ?>

    <?= $form->field($model, 'cap_shipinventory')->textInput(['placeholder' => 'Cap Shipinventory']) ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
