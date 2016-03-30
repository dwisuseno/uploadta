<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\HrmKeyPerformanceIndicator */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="hrm-key-performance-indicator-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'key_result_area_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\modules\hrm\models\HrmKeyResultArea::find()->orderBy('id')->asArray()->all(), 'id', 'key_result_area'),
        'options' => ['placeholder' => 'Choose Hrm key result area'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'kpi_detail')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'weight')->textInput(['placeholder' => 'Weight']) ?>

    <?= $form->field($model, 'target')->textInput(['placeholder' => 'Target']) ?>

    <?= $form->field($model, 'realisasi')->textInput(['placeholder' => 'Realisasi']) ?>

    <?= $form->field($model, 'skor')->textInput(['placeholder' => 'Skor']) ?>

    <?= $form->field($model, 'final_skor')->textInput(['placeholder' => 'Final Skor']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
