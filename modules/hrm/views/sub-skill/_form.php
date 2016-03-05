<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\SubSkill */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Employeehasskill', 
        'relID' => 'employeehasskill', 
        'value' => \yii\helpers\Json::encode($model->employeehasskills),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="sub-skill-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'skill_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\modules\hrm\models\Skill::find()->orderBy('id')->asArray()->all(), 'id', 'skill_code'),
        'options' => ['placeholder' => 'Choose Skill'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'sub_skill_code')->textInput(['maxlength' => true, 'placeholder' => 'Sub Skill Code']) ?>

    <?= $form->field($model, 'level')->textInput(['placeholder' => 'Level']) ?>

    <?= $form->field($model, 'equal_to')->textInput(['placeholder' => 'Equal To']) ?>

    <?= $form->field($model, 'equal_time')->textInput(['placeholder' => 'Equal Time']) ?>

    <div class="form-group" id="add-employeehasskill"></div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
