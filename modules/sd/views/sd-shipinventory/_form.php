<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdShipinventory */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="sd-shipinventory-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'code_shipinventory')->textInput(['maxlength' => true, 'placeholder' => 'Code Shipinventory']) ?>
        </div>
        <div class="col-lg-8">
            <?= $form->field($model, 'name_shipinventory')->textInput(['maxlength' => true, 'placeholder' => 'Name Shipinventory']) ?>
        </div>
        <div class="col-lg-4">
            <?php echo $form->field($model, 'cap_shipinventory', ['addon' => ['append' => ['content'=>'Kg']],
                ])->textInput(['placeholder' => 'Capacity Shipinventory']) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'),['index'],['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
