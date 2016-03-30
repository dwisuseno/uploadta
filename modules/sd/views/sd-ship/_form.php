<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdShip */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'SdShipdetail', 
        'relID' => 'sd-shipdetail', 
        'value' => \yii\helpers\Json::encode($model->sdShipdetails),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="sd-ship-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'code_ship')->textInput(['maxlength' => true, 'placeholder' => 'Code Ship']) ?>
        </div>
        <div class="col-lg-8">
            <?= $form->field($model, 'desc_ship')->textInput(['maxlength' => true, 'placeholder' => 'Desc Ship']) ?>
        </div>
        <div class="col-lg-4">
            <?php echo $form->field($model, 'worktime_ship', ['addon' => ['append' => ['content'=>'Hours']]])
                ->textInput(['placeholder' => 'Worktime Ship']) ?>
        </div>
        <div class="col-lg-4">
            <?php echo $form->field($model, 'loadtime_ship', ['addon' => ['append' => ['content'=>'Hours']]])
                ->textInput(['placeholder' => 'Loadtime Ship']) ?>
        </div>
        <div class="col-lg-4">
            <?php echo $form->field($model, 'pciktime_ship', ['addon' => ['append' => ['content'=>'Hours']]])
                ->textInput(['placeholder' => 'Pciktime Ship']) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'startday_ship')->widget(\kartik\widgets\Select2::classname(), [
                'data' => ['Sunday' => 'Sunday', 'Monday' => 'Monday', 'Tuesday' => 'Tuesday', 'Wednesday' => 'Wednesday', 'Thursday' => 'Thurday', 'Friday' => 'Friday', 'Saturday' => 'Saturday'],
                'options' => ['placeholder' => 'Startday Ship'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'endday_ship')->widget(\kartik\widgets\Select2::classname(), [
                'data' => ['Sunday' => 'Sunday', 'Monday' => 'Monday', 'Tuesday' => 'Tuesday', 'Wednesday' => 'Wednesday', 'Thursday' => 'Thurday', 'Friday' => 'Friday', 'Saturday' => 'Saturday'],
                'options' => ['placeholder' => 'Endday Ship'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'cost_ship')->textInput(['readOnly' => true, 'placeholder' => 'Cost Ship']) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'currency_id')->widget(\kartik\widgets\Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(\app\modules\master\models\Currency::find()->orderBy('id')->asArray()->all(), 'id', 
                    function($model, $defaultValue) {
                        return $model['codeCurrency'].' - '.$model['nameCurrency'];
                    }
                ),
                'options' => ['placeholder' => 'Choose Currency'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]) ?>
        </div>
    </div>

    <div class="form-group" id="add-sd-shipdetail"></div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'),['index'],['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
