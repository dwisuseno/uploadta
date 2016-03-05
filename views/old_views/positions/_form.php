<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Positions */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Employee', 
        'relID' => 'employee', 
        'value' => \yii\helpers\Json::encode($model->employees),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Personnelstructure', 
        'relID' => 'personnelstructure', 
        'value' => \yii\helpers\Json::encode($model->personnelstructures),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="positions-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'positions_code')->textInput(['maxlength' => true, 'placeholder' => 'Positions Code']) ?>

    <?= $form->field($model, 'positions_id')->textInput(['maxlength' => true, 'placeholder' => 'Positions']) ?>

    <?= $form->field($model, 'vacancy')->checkbox() ?>

    <?= $form->field($model, 'jobs_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Jobs::find()->orderBy('id')->asArray()->all(), 'id', 'jobs_detail'),
        'options' => ['placeholder' => 'Choose Jobs'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <div class="form-group" id="add-employee"></div>

    <div class="form-group" id="add-personnelstructure"></div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
