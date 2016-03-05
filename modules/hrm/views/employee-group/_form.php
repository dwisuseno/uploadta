<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\EmployeeGroup */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'EmployeeSubGroup', 
        'relID' => 'employee-sub-group', 
        'value' => \yii\helpers\Json::encode($model->employeeSubGroups),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="employee-group-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'positions_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\modules\hrm\models\Positions::find()->orderBy('id')->asArray()->all(), 'id', 'positions_code'),
        'options' => ['placeholder' => 'Choose Positions'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'employeegroup_code')->textInput(['maxlength' => true, 'placeholder' => 'Employeegroup Code']) ?>

    <?= $form->field($model, 'employeegroup_name')->textInput(['maxlength' => true, 'placeholder' => 'Employeegroup Name']) ?>

    <div class="form-group" id="add-employee-sub-group"></div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
