<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\HrmSkill */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="hrm-skill-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'level_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\modules\hrm\models\HrmLevel::find()->orderBy('id')->asArray()->all(), 'id', 'level_code'),
        'options' => ['placeholder' => 'Choose Hrm level'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'skill_code')->textInput(['maxlength' => true, 'placeholder' => 'Skill Code']) ?>

    <?= $form->field($model, 'detail_skill')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
