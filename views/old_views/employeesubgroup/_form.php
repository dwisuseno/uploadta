<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Employeesubgroup */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Personnelstructure', 
        'relID' => 'personnelstructure', 
        'value' => \yii\helpers\Json::encode($model->personnelstructures),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="employeesubgroup-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'employeesubgroup_code')->textInput(['maxlength' => true, 'placeholder' => 'Employeesubgroup Code']) ?>

    <?= $form->field($model, 'employeesubgroup_name')->textInput(['maxlength' => true, 'placeholder' => 'Employeesubgroup Name']) ?>

    <div class="form-group" id="add-personnelstructure"></div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
