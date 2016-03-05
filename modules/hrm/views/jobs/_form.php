<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\Jobs */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Positions', 
        'relID' => 'positions', 
        'value' => \yii\helpers\Json::encode($model->positions),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="jobs-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Create Jobs</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'jobs_code')->textInput(['maxlength' => true, 'placeholder' => 'Jobs Code']) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?= $form->field($model, 'jobs_detail')->textarea(['rows' => 6]) ?>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group" id="add-positions"></div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
