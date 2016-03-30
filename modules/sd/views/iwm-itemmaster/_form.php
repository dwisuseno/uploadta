<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\IwmItemmaster */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="iwm-itemmaster-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'code_itemmaster')->textInput(['maxlength' => true, 'placeholder' => 'Code Itemmaster']) ?>
        </div>
        <div class="col-lg-8">
            <?= $form->field($model, 'desc_itemmaster')->textInput(['maxlength' => true, 'placeholder' => 'Desc Itemmaster']) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'uom_id')->widget(\kartik\widgets\Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(\app\modules\master\models\Uom::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => 'Choose Uom'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'price_itemmaster')->textInput(['placeholder' => 'Price Itemmaster']) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'currency_id')->widget(\kartik\widgets\Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(\app\modules\master\models\Currency::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => 'Choose Currency'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]) ?>
        </div>
        <div class="col-lg-4">
            <?php echo $form->field($model, 'weight_itemmaster', ['addon' => ['append' => ['content'=>'Kg']],
                ])->textInput(['placeholder' => 'Weight Itemmaster']) ?>
        </div>
    </div>
            
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'),['index'],['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
