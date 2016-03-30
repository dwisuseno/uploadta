<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdSalesitem */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'SdPricedetail', 
        'relID' => 'sd-pricedetail', 
        'value' => \yii\helpers\Json::encode($model->sdPricedetails),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'SdSchedule', 
        'relID' => 'sd-schedule', 
        'value' => \yii\helpers\Json::encode($model->sdSchedules),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="sd-salesitem-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'iwm_item_master_id')->widget(\kartik\widgets\Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(\app\modules\iwm\models\IwmItemmaster::find()->orderBy('id')->asArray()->all(), 'id', 'item_name'),
                'options' => ['placeholder' => 'Choose Iwm itemmaster'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
                'disabled' => true,
            ]) ?>
            <div class="row">
                <div class="col-lg-8 no-right-pad">
                    <?= $form->field($model, 'quantity_salesitem')->textInput(['readOnly' =>true, 'placeholder' => 'Quantity Salesitem', 'class' => 'form-control sharp-right-corner']) ?>
                </div>
                <div class="col-lg-4 no-left-pad">
                    <?= $form->field($model, 'uom_salesitem')->textInput(['readOnly' =>true, 'maxlength' => true, 'placeholder' => 'Uom Salesitem', 'class' => 'form-control sharp-left-corner'])->label('label') ?>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 no-right-pad">
                    <?= $form->field($model, 'linetotal_salesitem')->textInput(['readOnly' =>true, 'placeholder' => 'Linetotal Salesitem', 'class' => 'form-control sharp-right-corner']) ?>
                </div>
                <div class="col-lg-4 no-left-pad">
                    <?= $form->field($model, 'currency_id')->widget(\kartik\widgets\Select2::classname(), [
                        'data' => \yii\helpers\ArrayHelper::map(\app\modules\master\models\Currency::find()->orderBy('id')->asArray()->all(), 'id', 'codeCurrency'),
                        'options' => ['placeholder' => 'Choose Currency'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                        'disabled' => true,
                    ]) ?>
                </div>
            </div>

            <?= $form->field($model, 'price_salesitem')->textInput(['readOnly' =>true, 'placeholder' => 'Price Salesitem']) ?>
            
            <div style="display: none">
                <?= $form->field($model, 'priceori_salesitem')->textInput(['readOnly' =>true, 'placeholder' => 'Priceori Salesitem'])->label(false) ?>
            </div>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'desc_salesitem')->textInput(['readOnly' =>true, 'maxlength' => true, 'placeholder' => 'Desc Salesitem']) ?>

            <?= $form->field($model, 'batch')->textInput(['readOnly' =>true, 'placeholder' => 'Batch']) ?>

            <?= $form->field($model, 'weight_salesitem')->textInput(['readOnly' =>true, 'placeholder' => 'Weight Salesitem']) ?>            
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'confirmqty_salesitem')->textInput(['readOnly' => true, 'placeholder' => 'Confirmqty Salesitem']) ?>

            <?= $form->field($model, 'pickqty')->textInput(['readOnly' =>true, 'placeholder' => 'Pickqty']) ?>

            <?= $form->field($model, 'delivqty_salesitem')->textInput(['readOnly' =>true, 'placeholder' => 'Delivqty Salesitem']) ?>
        </div>
    </div>

    <ul class="nav nav-tabs top-limit">
        <li class="active"><a href="#price" class="btn btn-sm btn-success" data-toggle="tab">Price</a></li>
        <li><a href="#schedule" class="btn btn-sm btn-success" data-toggle="tab">Schedule</a></li>
    </ul>
    
    <div class="tab-content top-limit">
        <div class="tab-pane fade in active" id="price">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group" id="add-sd-pricedetail"></div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade in" id="schedule">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group" id="add-sd-schedule"></div>
                </div>
            </div>
        </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'),['index'],['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
