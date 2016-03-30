<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdShipcondition */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'SdShiprule', 
        'relID' => 'sd-shiprule', 
        'value' => \yii\helpers\Json::encode($model->sdShiprules),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="sd-shipcondition-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'code_shipcondition')->textInput(['maxlength' => true, 'placeholder' => 'Code Shipcondition']) ?>
        </div>
        <div class="col-lg-8">
            <?= $form->field($model, 'desc_shipcondition')->textInput(['maxlength' => true, 'placeholder' => 'Desc Shipcondition']) ?>
        </div>
    </div>

    <div class="form-group" id="add-sd-shiprule"></div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'),['index'],['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
