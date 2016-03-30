<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdSalesitemSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-sd-salesitem-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'quantity_salesitem')->textInput(['placeholder' => 'Quantity Salesitem']) ?>

    <?= $form->field($model, 'uom_salesitem')->textInput(['maxlength' => true, 'placeholder' => 'Uom Salesitem']) ?>

    <?= $form->field($model, 'desc_salesitem')->textInput(['maxlength' => true, 'placeholder' => 'Desc Salesitem']) ?>

    <?= $form->field($model, 'price_salesitem')->textInput(['placeholder' => 'Price Salesitem']) ?>

    <?php /* echo $form->field($model, 'priceori_salesitem')->textInput(['placeholder' => 'Priceori Salesitem']) */ ?>

    <?php /* echo $form->field($model, 'linetotal_salesitem')->textInput(['placeholder' => 'Linetotal Salesitem']) */ ?>

    <?php /* echo $form->field($model, 'delivqty_salesitem')->textInput(['placeholder' => 'Delivqty Salesitem']) */ ?>

    <?php /* echo $form->field($model, 'confirmqty_salesitem')->textInput(['placeholder' => 'Confirmqty Salesitem']) */ ?>

    <?php /* echo $form->field($model, 'pickqty')->textInput(['placeholder' => 'Pickqty']) */ ?>

    <?php /* echo $form->field($model, 'batch')->textInput(['placeholder' => 'Batch']) */ ?>

    <?php /* echo $form->field($model, 'weight_salesitem')->textInput(['placeholder' => 'Weight Salesitem']) */ ?>

    <?php /* echo $form->field($model, 'currency_id')->textInput(['placeholder' => 'Currency']) */ ?>

    <?php /* echo $form->field($model, 'currency_id1')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\modules\sd\models\Currency::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => 'Choose Currency'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) */ ?>

    <?php /* echo $form->field($model, 'iwm_item_master_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\modules\sd\models\IwmItemMaster::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => 'Choose Iwm item master'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) */ ?>

    <?php /* echo $form->field($model, 'sd_sale_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\modules\sd\models\SdSale::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => 'Choose Sd sale'],
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
