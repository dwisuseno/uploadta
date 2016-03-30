<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\master\models\Currency */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'ArPayment', 
        'relID' => 'ar-payment', 
        'value' => \yii\helpers\Json::encode($model->arPayments),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'ArTransaction', 
        'relID' => 'ar-transaction', 
        'value' => \yii\helpers\Json::encode($model->arTransactions),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'IwmItemDetail', 
        'relID' => 'iwm-item-detail', 
        'value' => \yii\helpers\Json::encode($model->iwmItemDetails),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'PurPoHeader', 
        'relID' => 'pur-po-header', 
        'value' => \yii\helpers\Json::encode($model->purPoHeaders),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'PurQuotationHeader', 
        'relID' => 'pur-quotation-header', 
        'value' => \yii\helpers\Json::encode($model->purQuotationHeaders),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'PurRfqHeader', 
        'relID' => 'pur-rfq-header', 
        'value' => \yii\helpers\Json::encode($model->purRfqHeaders),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'SdCustomer', 
        'relID' => 'sd-customer', 
        'value' => \yii\helpers\Json::encode($model->sdCustomers),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'SdPrice', 
        'relID' => 'sd-price', 
        'value' => \yii\helpers\Json::encode($model->sdPrices),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
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
        'class' => 'SdSale', 
        'relID' => 'sd-sale', 
        'value' => \yii\helpers\Json::encode($model->sdSales),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'SdSalesitem', 
        'relID' => 'sd-salesitem', 
        'value' => \yii\helpers\Json::encode($model->sdSalesitems),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'SdShip', 
        'relID' => 'sd-ship', 
        'value' => \yii\helpers\Json::encode($model->sdShips),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'SdShipdetail', 
        'relID' => 'sd-shipdetail', 
        'value' => \yii\helpers\Json::encode($model->sdShipdetails),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'SdTaxdetail', 
        'relID' => 'sd-taxdetail', 
        'value' => \yii\helpers\Json::encode($model->sdTaxdetails),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Tax', 
        'relID' => 'tax', 
        'value' => \yii\helpers\Json::encode($model->taxes),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="currency-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'codeCurrency')->textInput(['maxlength' => true, 'placeholder' => 'CodeCurrency']) ?>

    <?= $form->field($model, 'nameCurrency')->textInput(['maxlength' => true, 'placeholder' => 'NameCurrency']) ?>

    <div class="form-group" id="add-ar-payment"></div>

    <div class="form-group" id="add-ar-transaction"></div>

    <div class="form-group" id="add-iwm-item-detail"></div>

    <div class="form-group" id="add-pur-po-header"></div>

    <div class="form-group" id="add-pur-quotation-header"></div>

    <div class="form-group" id="add-pur-rfq-header"></div>

    <div class="form-group" id="add-sd-customer"></div>

    <div class="form-group" id="add-sd-price"></div>

    <div class="form-group" id="add-sd-pricedetail"></div>

    <div class="form-group" id="add-sd-sale"></div>

    <div class="form-group" id="add-sd-salesitem"></div>

    <div class="form-group" id="add-sd-ship"></div>

    <div class="form-group" id="add-sd-shipdetail"></div>

    <div class="form-group" id="add-sd-taxdetail"></div>

    <div class="form-group" id="add-tax"></div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'),['index'],['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
