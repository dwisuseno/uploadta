<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdCustomer */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'SdCustomeraccount', 
        'relID' => 'sd-customeraccount', 
        'value' => \yii\helpers\Json::encode($model->sdCustomeraccounts),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="sd-customer-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <ul class="nav nav-tabs top-limit no-bot-border">
        <li class="active"><a href="#genData" class="btn btn-sm btn-success" data-toggle="tab">General Data</a></li>
        <li><a href="#comData" class="btn btn-sm btn-success" data-toggle="tab">Company Data</a></li>
        <li><a href="#saleData" class="btn btn-sm btn-success" data-toggle="tab">Sales Data</a></li>
    </ul>

    <div class="row top-limit2">
        <div class="col-lg-4">
            <?= $form->field($model, 'sd_salesarea_id')->widget(\kartik\widgets\Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(\app\modules\sd\models\SdSalesarea::find()
                    ->select('sd_salesarea.*, sd_salesorg.code_salesorg, sd_dchl.code_dchl, sd_division.code_division')
                    ->leftJoin('sd_salesorg', 'sd_salesorg.id = sd_salesarea.sd_salesorg_id')
                    ->leftJoin('sd_dchl', 'sd_dchl.id = sd_salesarea.sd_dchl_id')
                    ->leftJoin('sd_division', 'sd_division.id = sd_salesarea.sd_division_id')
                    ->orderBy('sd_salesarea.id')
                    ->asArray()
                    ->all(), 
                    'id', 
                    function($model, $defaultValue) {
                        return $model['code_salesarea'].' - '.$model['code_salesorg'].' | '.$model['code_dchl'].' | '.$model['code_division'];
                    }
                ),
                'options' => ['placeholder' => 'Choose Sd salesarea'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]) ?>
        </div>
    </div>

    <div class="tab-content">
        <div class="tab-pane fade in active" id="genData">
            <ul class="nav nav-tabs top-limit">
                <li class="active"><a href="#address" data-toggle="tab">Address</a></li>
                <li><a href="#transaction" data-toggle="tab">Payment Transaction</a></li>
                <li><a href="#cp" data-toggle="tab">Contact Person</a></li>
            </ul>
            <div class="row">
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="address">
                        <div class="top-limit">
                            <div class="col-lg-4">
                                <?= $form->field($model, 'title_customer')->widget(\kartik\widgets\Select2::classname(), [
                                    'data' => [ 'Mr.' => 'Mr.', 'Mrs.' => 'Mrs.', 'Ms.' => 'Ms.', 'Company' => 'Company', ],
                                    'options' => ['placeholder' => 'Choose Customer Title'],
                                    'pluginOptions' => [
                                        'allowClear' => true
                                    ],
                                ]) ?>
                            </div>
                            <div class="col-lg-4">
                                <?= $form->field($model, 'name_customer')->textInput(['maxlength' => true, 'placeholder' => 'Name Customer']) ?>
                            </div>
                            <div class="col-lg-4">
                                <?= $form->field($model, 'street_customer')->textInput(['maxlength' => true, 'placeholder' => 'Street Customer']) ?>
                            </div>
                            <div class="col-lg-4">
                                <?= $form->field($model, 'postal_customer')->textInput(['maxlength' => true, 'placeholder' => 'Postal Customer']) ?>
                            </div>
                            <div class="col-lg-4">
                                <?= $form->field($model, 'city_customer')->textInput(['maxlength' => true, 'placeholder' => 'City Customer']) ?>
                            </div>
                            <div class="col-lg-4">
                                <?= $form->field($model, 'country_id')->widget(\kartik\widgets\Select2::classname(), [
                                    'data' => \yii\helpers\ArrayHelper::map(\app\modules\master\models\Country::find()->orderBy('id')->asArray()->all(), 'id',
                                        function($model, $defaultValue) {
                                            return $model['code_country'].' - '.$model['name_country'];
                                        }
                                    ),
                                    'options' => ['placeholder' => 'Choose Country'],
                                    'pluginOptions' => [
                                        'allowClear' => true
                                    ],
                                ]) ?>
                            </div>
                            <div class="col-lg-4">
                                <?= $form->field($model, 'pb_customer')->textInput(['maxlength' => true, 'placeholder' => 'Pb Customer']) ?>
                            </div>
                            <div class="col-lg-3 no-right-pad">
                                <?= $form->field($model, 'telp_customer')->textInput(['maxlength' => true, 'placeholder' => 'Telp Customer', 'class' => 'form-control sharp-right-corner']) ?>
                            </div>
                            <div class="col-lg-1 no-left-pad">
                                <?= $form->field($model, 'telpext_customer')->textInput(['maxlength' => true, 'placeholder' => 'Telpext Customer', 'class' => 'form-control sharp-left-corner']) ?>
                            </div>
                            <div class="col-lg-4">
                                <?= $form->field($model, 'mobile_customer')->textInput(['maxlength' => true, 'placeholder' => 'Mobile Customer']) ?>
                            </div>
                            <div class="col-lg-4">
                                <?= $form->field($model, 'email_customer')->textInput(['maxlength' => true, 'placeholder' => 'Email Customer']) ?>
                            </div>
                            <div class="col-lg-12">
                                <?= $form->field($model, 'comment_customer')->textarea(['rows' => 3]) ?>
                            </div>
                            <div class="col-lg-4">

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade in" id="transaction">
                        <div class="top-limit">
                            <div class="col-lg-12">
                                <div class="form-group" id="add-sd-customeraccount"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade in" id="cp">
                        <div class="top-limit">
                            <div class="col-lg-4">
                                <?= $form->field($model, 'sd_cp_id')->widget(\kartik\widgets\Select2::classname(), [
                                    'data' => \yii\helpers\ArrayHelper::map(\app\modules\sd\models\SdCp::find()->orderBy('id')->asArray()->all(), 'id', 
                                        function($model, $defaultValue) {
                                            return $model['code_cp'].' - '.$model['firstname_cp'].' '.$model['lastname_cp'];
                                        }
                                    ),
                                    'options' => ['placeholder' => 'Choose Sd cp'],
                                    'pluginOptions' => [
                                        'allowClear' => true
                                    ],
                                ]) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade in" id="comData">
            <ul class="nav nav-tabs top-limit">
                <li class="active"><a href="#transaction1" data-toggle="tab">Payment Transaction</a></li>
                <li><a href="#cores" data-toggle="tab">Corespondence</a></li>
            </ul>
            <div class="row">
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="transaction1">
                        <div class="top-limit">
                            <div class="col-lg-4">
                                <?= $form->field($model, 'ar_payterm_id')->widget(\kartik\widgets\Select2::classname(), [
                                    'data' => \yii\helpers\ArrayHelper::map(\app\modules\ar\models\ArPayterm::find()->orderBy('id')->asArray()->all(), 'id', 
                                        function($model, $defaultValue) {
                                            return $model['code_payterm'].' - '.$model['name_payterm'];
                                        }
                                    ),
                                    'options' => ['placeholder' => 'Choose Ar payterm'],
                                    'pluginOptions' => [
                                        'allowClear' => true
                                    ],
                                ]) ?>
                            </div>
                            <div class="col-lg-4">
                                <?= $form->field($model, 'pay_customer')->widget(\kartik\widgets\Select2::classname(), [
                                    'data' => [ 'Cash' => 'Cash', 'Bank Transfer' => 'Bank Transfer', 'Cheque' => 'Cheque', ],
                                    'options' => ['placeholder' => 'Choose Payment Method'],
                                    'pluginOptions' => [
                                        'allowClear' => true
                                    ],
                                ]) ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade in" id="cores">
                        <div class="top-limit">
                            <div class="col-lg-4">
                                <?= $form->field($model, 'ar_dunning_id')->widget(\kartik\widgets\Select2::classname(), [
                                    'data' => \yii\helpers\ArrayHelper::map(\app\modules\ar\models\ArDunning::find()->orderBy('id')->asArray()->all(), 'id', 
                                        function($model, $defaultValue) {
                                            return $model['codeDunning'].' - '.$model['description'];
                                        }
                                    ),
                                    'options' => ['placeholder' => 'Choose Ar dunning'],
                                    'pluginOptions' => [
                                        'allowClear' => true
                                    ],
                                ]) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade in" id="saleData">
            <ul class="nav nav-tabs top-limit">
                <li class="active"><a href="#sales" data-toggle="tab">Sales</a></li>
                <li><a href="#shipping" data-toggle="tab">Shipping</a></li>
            </ul>
            <div class="row">
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="sales">
                        <div class="top-limit">
                            <div class="col-lg-4">
                                <?php echo $form->field($model, 'probability_customer', [
                                    'addon' => ['append' => ['content'=>'%']],
                                ])->textInput(['placeholder' => 'Order Probability']) ?>
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
                    </div>
                    <div class="tab-pane fade in" id="shipping">
                        <div class="top-limit">
                            <div class="col-lg-4">
                                <?= $form->field($model, 'sd_ship_id')->widget(\kartik\widgets\Select2::classname(), [
                                    'data' => \yii\helpers\ArrayHelper::map(\app\modules\sd\models\SdShip::find()->orderBy('id')->asArray()->all(), 'id', 
                                        function($model, $defaultValue) {
                                            return $model['code_ship'].' - '.$model['desc_ship'];
                                        }
                                    ),
                                    'options' => ['placeholder' => 'Choose Sd ship'],
                                    'pluginOptions' => [
                                        'allowClear' => true
                                    ],
                                ]) ?>
                            </div>
                            <div class="col-lg-4">
                                <?= $form->field($model, 'delivprior_customer')->widget(\kartik\widgets\Select2::classname(), [
                                    'data' => [ 'Standard' => 'Standard', 'Urgent' => 'Urgent', ],
                                    'options' => ['placeholder' => 'Choose Sd ship'],
                                    'pluginOptions' => [
                                        'allowClear' => true
                                    ],
                                ]) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'),['index'],['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
