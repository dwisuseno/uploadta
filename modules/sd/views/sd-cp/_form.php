<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdCp */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="sd-cp-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'title_cp')->widget(\kartik\widgets\Select2::classname(), [
                'data' => [ 'Mr.' => 'Mr.', 'Mrs.' => 'Mrs.', 'Ms.' => 'Ms.', ],
                'options' => ['placeholder' => 'Choose Cp Title'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]) ?>
            <?= $form->field($model, 'firstname_cp')->textInput(['maxlength' => true, 'placeholder' => 'Firstname Cp']) ?>
            <?= $form->field($model, 'middlename_cp')->textInput(['maxlength' => true, 'placeholder' => 'Middlename Cp']) ?>
            <?= $form->field($model, 'lastname_cp')->textInput(['maxlength' => true, 'placeholder' => 'Lastname Cp']) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'email_cp')->textInput(['maxlength' => true, 'placeholder' => 'Email Cp']) ?>
        </div>
        <div class="col-lg-3 no-right-pad">
            <?= $form->field($model, 'telp_cp')->textInput(['maxlength' => true, 'placeholder' => 'Telp Cp', 'class' => 'form-control sharp-right-corner']) ?>
        </div>
        <div class="col-lg-1 no-left-pad">
            <?= $form->field($model, 'telpext_cp')->textInput(['maxlength' => true, 'placeholder' => 'Telpext Cp', 'class' => 'form-control sharp-left-corner']) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'mobile_cp')->textInput(['maxlength' => true, 'placeholder' => 'Mobile Cp']) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'department_cp')->textInput(['maxlength' => true, 'placeholder' => 'Department Cp']) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'),['index'],['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
