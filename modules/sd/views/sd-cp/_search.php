<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdCpSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-sd-cp-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'code_cp')->textInput(['maxlength' => true, 'placeholder' => 'Code Cp']) ?>

    <?= $form->field($model, 'title_cp')->dropDownList([ 'Mr.' => 'Mr.', 'Mrs.' => 'Mrs.', 'Ms.' => 'Ms.', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'firstname_cp')->textInput(['maxlength' => true, 'placeholder' => 'Firstname Cp']) ?>

    <?= $form->field($model, 'middlename_cp')->textInput(['maxlength' => true, 'placeholder' => 'Middlename Cp']) ?>

    <?php /* echo $form->field($model, 'lastname_cp')->textInput(['maxlength' => true, 'placeholder' => 'Lastname Cp']) */ ?>

    <?php /* echo $form->field($model, 'email_cp')->textInput(['maxlength' => true, 'placeholder' => 'Email Cp']) */ ?>

    <?php /* echo $form->field($model, 'telp_cp')->textInput(['maxlength' => true, 'placeholder' => 'Telp Cp']) */ ?>

    <?php /* echo $form->field($model, 'telpext_cp')->textInput(['maxlength' => true, 'placeholder' => 'Telpext Cp']) */ ?>

    <?php /* echo $form->field($model, 'mobile_cp')->textInput(['maxlength' => true, 'placeholder' => 'Mobile Cp']) */ ?>

    <?php /* echo $form->field($model, 'department_cp')->textInput(['maxlength' => true, 'placeholder' => 'Department Cp']) */ ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
