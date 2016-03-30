<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\HrmLevel */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'HrmEmployeehaslevel', 
        'relID' => 'hrm-employeehaslevel', 
        'value' => \yii\helpers\Json::encode($model->hrmEmployeehaslevels),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'HrmSkill', 
        'relID' => 'hrm-skill', 
        'value' => \yii\helpers\Json::encode($model->hrmSkills),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="hrm-level-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'level_code')->textInput(['maxlength' => true, 'placeholder' => 'Level Code']) ?>

    <?= $form->field($model, 'level_name')->textInput(['maxlength' => true, 'placeholder' => 'Level Name']) ?>

    <div class="form-group" id="add-hrm-employeehaslevel"></div>

    <div class="form-group" id="add-hrm-skill"></div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
