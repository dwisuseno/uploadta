<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdCustomerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-sd-customer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'code_customer')->textInput(['maxlength' => true, 'placeholder' => 'Code Customer']) ?>

    <?= $form->field($model, 'title_customer')->dropDownList([ 'Mr.' => 'Mr.', 'Mrs.' => 'Mrs.', 'Ms.' => 'Ms.', 'Company' => 'Company', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'name_customer')->textInput(['maxlength' => true, 'placeholder' => 'Name Customer']) ?>

    <?= $form->field($model, 'street_customer')->textInput(['maxlength' => true, 'placeholder' => 'Street Customer']) ?>

    <?php /* echo $form->field($model, 'postal_customer')->textInput(['maxlength' => true, 'placeholder' => 'Postal Customer']) */ ?>

    <?php /* echo $form->field($model, 'city_customer')->textInput(['maxlength' => true, 'placeholder' => 'City Customer']) */ ?>

    <?php /* echo $form->field($model, 'pay_customer')->dropDownList([ 'Cash' => 'Cash', 'Bank Transfer' => 'Bank Transfer', 'Cheque' => 'Cheque', ], ['prompt' => '']) */ ?>

    <?php /* echo $form->field($model, 'probability_customer')->textInput(['placeholder' => 'Probability Customer']) */ ?>

    <?php /* echo $form->field($model, 'delivprior_customer')->dropDownList([ 'Standard' => 'Standard', 'Urgent' => 'Urgent', ], ['prompt' => '']) */ ?>

    <?php /* echo $form->field($model, 'pb_customer')->textInput(['maxlength' => true, 'placeholder' => 'Pb Customer']) */ ?>

    <?php /* echo $form->field($model, 'telp_customer')->textInput(['maxlength' => true, 'placeholder' => 'Telp Customer']) */ ?>

    <?php /* echo $form->field($model, 'telpext_customer')->textInput(['maxlength' => true, 'placeholder' => 'Telpext Customer']) */ ?>

    <?php /* echo $form->field($model, 'mobile_customer')->textInput(['maxlength' => true, 'placeholder' => 'Mobile Customer']) */ ?>

    <?php /* echo $form->field($model, 'email_customer')->textInput(['maxlength' => true, 'placeholder' => 'Email Customer']) */ ?>

    <?php /* echo $form->field($model, 'comment_customer')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'sd_salesarea_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\modules\sd\models\SdSalesarea::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => 'Choose Sd salesarea'],
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

    <?php /* echo $form->field($model, 'sd_cp_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\modules\sd\models\SdCp::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => 'Choose Sd cp'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) */ ?>

    <?php /* echo $form->field($model, 'sd_ship_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\modules\sd\models\SdShip::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => 'Choose Sd ship'],
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

    <?php /* echo $form->field($model, 'ar_dunning_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\modules\sd\models\ArDunning::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => 'Choose Ar dunning'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) */ ?>

    <?php /* echo $form->field($model, 'country_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\modules\sd\models\Country::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => 'Choose Country'],
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
