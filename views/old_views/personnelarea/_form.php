<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Personnelarea */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Orgstructure', 
        'relID' => 'orgstructure', 
        'value' => \yii\helpers\Json::encode($model->orgstructures),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="personnelarea-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'personnelarea_code')->textInput(['maxlength' => true, 'placeholder' => 'Personnelarea Code']) ?>

    <?= $form->field($model, 'personnelarea_name')->textInput(['maxlength' => true, 'placeholder' => 'Personnelarea Name']) ?>

    <div class="form-group" id="add-orgstructure"></div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>