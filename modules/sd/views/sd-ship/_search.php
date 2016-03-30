<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdShipSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-sd-ship-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'code_ship')->textInput(['maxlength' => true, 'placeholder' => 'Code Ship']) ?>

    <?= $form->field($model, 'desc_ship')->textInput(['maxlength' => true, 'placeholder' => 'Desc Ship']) ?>

    <?= $form->field($model, 'cost_ship')->textInput(['placeholder' => 'Cost Ship']) ?>

    <?= $form->field($model, 'worktime_ship')->textInput(['placeholder' => 'Worktime Ship']) ?>

    <?php /* echo $form->field($model, 'loadtime_ship')->textInput(['placeholder' => 'Loadtime Ship']) */ ?>
    
    <?php /* echo $form->field($model, 'pciktime_ship')->textInput(['placeholder' => 'Pciktime Ship']) */ ?>
    
    <?php /* echo $form->field($model, 'startday_ship')->textInput(['maxlength' => true, 'placeholder' => 'Startday Ship']) */ ?>
    
    <?php /* echo $form->field($model, 'endday_ship')->textInput(['maxlength' => true, 'placeholder' => 'Endday Ship']) */ ?>

    <?= $form->field($model, 'currency_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\modules\master\models\Currency::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => 'Choose Currency'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
