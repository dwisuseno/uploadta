<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\Kra */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'SasaranStrategis', 
        'relID' => 'sasaran-strategis', 
        'value' => \yii\helpers\Json::encode($model->sasaranStrategis),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="kra-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Create Key Result Area</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'key_result_area')->textInput(['maxlength' => true, 'placeholder' => 'Key Result Area']) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'tasks_id')->widget(\kartik\widgets\Select2::classname(), [
                        'data' => \yii\helpers\ArrayHelper::map(\app\modules\hrm\models\Tasks::find()->orderBy('id')->asArray()->all(), 'id', 'task_detail'),
                        'options' => ['placeholder' => 'Choose Tasks'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]) ?>
                </div>
                <div class="col-md-6">
                     <div class="form-group" id="add-sasaran-strategis"></div>
                </div>
            </div>
        </div>
    </div>
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
