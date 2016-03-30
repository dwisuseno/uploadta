<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdSaleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-sd-sale-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'shipto_sale')->textInput(['maxlength' => true, 'placeholder' => 'Shipto Sale']) ?>

    <?= $form->field($model, 'billto_sale')->textInput(['placeholder' => 'Billto Sale']) ?>

    <?= $form->field($model, 'net_sale')->textInput(['placeholder' => 'Net Sale']) ?>

    <?= $form->field($model, 'ponumber_sale')->textInput(['maxlength' => true, 'placeholder' => 'Ponumber Sale']) ?>

    <?php /* echo $form->field($model, 'podate_sale')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => 'Choose Podate Sale'],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); */ ?>

    <?php /* echo $form->field($model, 'weight_sale')->textInput(['placeholder' => 'Weight Sale']) */ ?>

    <?php /* echo $form->field($model, 'validfrom_sale')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => 'Choose Validfrom Sale'],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); */ ?>

    <?php /* echo $form->field($model, 'validto_sale')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => 'Choose Validto Sale'],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); */ ?>

    <?php /* echo $form->field($model, 'pricedate_sale')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => 'Choose Pricedate Sale'],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); */ ?>

    <?php /* echo $form->field($model, 'delivdate_sale')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => 'Choose Delivdate Sale'],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); */ ?>

    <?php /* echo $form->field($model, 'reject_sale')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'priceexp_sale')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => 'Choose Priceexp Sale'],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); */ ?>

    <?php /* echo $form->field($model, 'inquirystatus_sale')->textInput(['placeholder' => 'Inquirystatus Sale']) */ ?>

    <?php /* echo $form->field($model, 'quotationstatus_sale')->textInput(['placeholder' => 'Quotationstatus Sale']) */ ?>

    <?php /* echo $form->field($model, 'sostatus_sale')->textInput(['placeholder' => 'Sostatus Sale']) */ ?>

    <?php /* echo $form->field($model, 'delivstatus_sale')->textInput(['placeholder' => 'Delivstatus Sale']) */ ?>

    <?php /* echo $form->field($model, 'inquirycode_sale')->textInput(['maxlength' => true, 'placeholder' => 'Inquirycode Sale']) */ ?>

    <?php /* echo $form->field($model, 'quotationcode_sale')->textInput(['maxlength' => true, 'placeholder' => 'Quotationcode Sale']) */ ?>

    <?php /* echo $form->field($model, 'socode_sale')->textInput(['maxlength' => true, 'placeholder' => 'Socode Sale']) */ ?>

    <?php /* echo $form->field($model, 'delivcode_sale')->textInput(['maxlength' => true, 'placeholder' => 'Delivcode Sale']) */ ?>

    <?php /* echo $form->field($model, 'freightcost_sale')->textInput(['placeholder' => 'Freightcost Sale']) */ ?>

    <?php /* echo $form->field($model, 'billblock_sale')->textInput(['maxlength' => true, 'placeholder' => 'Billblock Sale']) */ ?>

    <?php /* echo $form->field($model, 'reasonblock_sale')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'billstatus_sale')->textInput(['maxlength' => true, 'placeholder' => 'Billstatus Sale']) */ ?>

    <?php /* echo $form->field($model, 'freightpayto_sale')->textInput(['maxlength' => true, 'placeholder' => 'Freightpayto Sale']) */ ?>

    <?php /* echo $form->field($model, 'sd_ship_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\modules\sd\models\SdShip::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => 'Choose Sd ship'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) */ ?>

    <?php /* echo $form->field($model, 'sd_salestype_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\modules\sd\models\SdSalestype::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => 'Choose Sd salestype'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) */ ?>

    <?php /* echo $form->field($model, 'sd_shipcondition_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\modules\sd\models\SdShipcondition::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => 'Choose Sd shipcondition'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) */ ?>

    <?php /* echo $form->field($model, 'sd_taxdetail_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\modules\sd\models\SdTaxdetail::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => 'Choose Sd taxdetail'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) */ ?>

    <?php /* echo $form->field($model, 'sd_customer_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\modules\sd\models\SdCustomer::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => 'Choose Sd customer'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) */ ?>

    <?php /* echo $form->field($model, 'ar_payterm_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\modules\sd\models\ArPayterm::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => 'Choose Ar payterm'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) */ ?>

    <?php /* echo $form->field($model, 'currency_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\modules\sd\models\Currency::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => 'Choose Currency'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) */ ?>

    <?php /* echo $form->field($model, 'sd_salesarea_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\modules\sd\models\SdSalesarea::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => 'Choose Sd salesarea'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) */ ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
