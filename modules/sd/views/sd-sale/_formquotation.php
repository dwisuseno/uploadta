<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdSale */
/* @var $form yii\widgets\ActiveForm */

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
        'class' => 'SdTaxdetail',  
        'relID' => 'sd-taxdetail',  
        'value' => \yii\helpers\Json::encode($model->sdTaxdetails), 
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0 
    ] 
]);
?>

<div class="sd-sale-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <div class="row">
        <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-6">
                    <?= $form->field($model, 'sd_salestype_id')->widget(\kartik\widgets\Select2::classname(), [
                        'data' => \yii\helpers\ArrayHelper::map(\app\modules\sd\models\SdSalestype::find()->orderBy('id')->asArray()->all(), 'id',
                            function($model, $defaultValue) {
                                return $model['code_salestype'].' - '.$model['desc_salestype'];
                            }
                        ),
                        'options' => ['placeholder' => 'Choose Sd salestype'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]) ?>
                </div>
                <div class="col-lg-6">
                    <?= $form->field($model, 'sd_salesarea_id')->widget(\kartik\widgets\Select2::classname(), [
                        'data' => \yii\helpers\ArrayHelper::map(\app\modules\sd\models\SdSalesarea::find()
                            ->select('sd_salesarea.*, sd_salesorg.code_salesorg, sd_dchl.code_dchl, sd_division.code_division')
                            ->leftJoin('sd_salesorg', 'sd_salesorg.id = sd_salesarea.sd_salesorg_id')
                            ->leftJoin('sd_dchl', 'sd_dchl.id = sd_salesarea.sd_dchl_id')
                            ->leftJoin('sd_division', 'sd_division.id = sd_salesarea.sd_division_id')
                            ->where('sd_salesarea.status_salesarea = "Active"')
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
            <?= $form->field($model, 'sd_customer_id')->widget(\kartik\widgets\Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(\app\modules\sd\models\SdCustomer::find()->orderBy('id')->asArray()->all(), 'id', 
                    function($model, $defaultValue) {
                        return $model['code_customer'].' - '.$model['name_customer'];
                    }
                ),
                'options' => ['placeholder' => 'Choose Sd customer', 'onchange' => 'getCustomer($(this))'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]) ?>
        </div>
        <div class="col-lg-4">
            <div class="row">
                <div class="col-lg-9 no-right-pad">
                    <?= $form->field($model, 'net_sale')->textInput(['readonly' => true, 'placeholder' => 'Net Sale', 'class' => 'form-control sharp-right-corner']) ?>
                </div>
                <div class="col-lg-3 no-left-pad">
                    <?= $form->field($model, 'currency_id')->widget(\kartik\widgets\Select2::classname(), [
                        'data' => \yii\helpers\ArrayHelper::map(\app\modules\master\models\Currency::find()->orderBy('id')->asArray()->all(), 'id',
                            function($model, $defaultValue) {
                                return $model['codeCurrency'];
                            }
                        ),
                        'options' => ['placeholder' => 'Choose Currency'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]) ?>
                </div>
            </div>
            <?= $form->field($model, 'freightcost_sale')->textInput(['readOnly' => true, 'placeholder' => 'Freightcost Sale']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'ponumber_sale')->textInput(['maxlength' => true, 'placeholder' => 'Ponumber Sale']) ?>
        </div>
        <div class="col-lg-4 col-lg-offset-4">
            <?= $form->field($model, 'podate_sale')->widget(\kartik\widgets\DatePicker::classname(), [
                'options' => ['placeholder' => 'Choose Podate Sale'],
                'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd', 'todayHighlight' => true,
                ]
            ]); ?>
        </div>
    </div>

    <ul class="nav nav-tabs top-limit">
        <li class="active"><a href="#sales" class="btn btn-sm btn-success" data-toggle="tab">Sales</a></li>
        <li><a href="#ship" class="btn btn-sm btn-success" data-toggle="tab">Shipping</a></li>
        <li><a href="#tax" class="btn btn-sm btn-success" data-toggle="tab">Tax</a></li>
        <li><a href="#reject" class="btn btn-sm btn-success" data-toggle="tab">Reason for Rejection</a></li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane fade in active" id="sales">
            <div class="row top-limit">
                <div class="col-lg-7">
                    <div class="row col-lg-9">
                        <?= $form->field($model, 'delivdate_sale')->widget(\kartik\widgets\DatePicker::classname(), [
                            'options' => ['placeholder' => 'Choose Delivdate Sale'],
                            'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
                            'pluginOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-mm-dd', 'todayHighlight' => true,
                            ]
                        ]); ?>

                        <?= $form->field($model, 'validfrom_sale')->widget(\kartik\widgets\DatePicker::classname(), [
                            'options' => ['placeholder' => 'Choose Validfrom Sale'],
                            'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
                            'pluginOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-mm-dd', 'todayHighlight' => true,
                            ]
                        ]); ?>

                        <?= $form->field($model, 'pricedate_sale')->widget(\kartik\widgets\DatePicker::classname(), [
                            'options' => ['placeholder' => 'Choose Pricedate Sale'],
                            'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
                            'pluginOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-mm-dd', 'todayHighlight' => true,
                            ]
                        ]); ?>

                        <?= $form->field($model, 'ar_payterm_id')->widget(\kartik\widgets\Select2::classname(), [
                            'data' => \yii\helpers\ArrayHelper::map(\app\modules\ar\models\ArPayterm::find()->orderBy('id')->asArray()->all(), 'id', 
                                function($model, $defaultValue) {
                                    return $model['code_payterm'].' - '.$model['name_payterm'];
                                }
                            ),
                            'options' => ['placeholder' => 'Choose Ar payterm', 'onchange' => 'getPayterm($(this))'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]) ?>
                    </div>
                </div>
                <div class="col-lg-5">
                    <?php echo $form->field($model, 'weight_sale', ['addon' => ['append' => ['content'=>'Kg']]])
                        ->textInput(['readOnly' => true, 'placeholder' => 'Weight Sale']) ?>

                    <?= $form->field($model, 'validto_sale')->widget(\kartik\widgets\DatePicker::classname(), [
                        'options' => ['placeholder' => 'Choose Validto Sale'],
                        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd', 'todayHighlight' => true,
                        ]
                    ]); ?>

                    <?= $form->field($model, 'priceexp_sale')->widget(\kartik\widgets\DatePicker::classname(), [
                        'options' => ['placeholder' => 'Choose Priceexp Sale'],
                        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd', 'todayHighlight' => true,
                        ]
                    ]); ?>
                </div>
            </div>
        </div>
        <div class="tab-pane fade in" id="ship">
            <div class="row top-limit">
                <div class="col-lg-7">
                    <div class="row col-lg-9">
                        <?= $form->field($model, 'sd_ship_id')->widget(\kartik\widgets\Select2::classname(), [
                            'data' => \yii\helpers\ArrayHelper::map(\app\modules\sd\models\SdShip::find()->orderBy('id')->asArray()->all(), 'id',
                                function($model, $defaultValue) {
                                    return $model['code_ship'].' - '.$model['desc_ship'];
                                }
                            ),
                            'options' => ['placeholder' => 'Choose Sd ship', 'onchange' => 'getShip($(this))'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]) ?>

                        <?= $form->field($model, 'freightpayto_sale')->widget(\kartik\widgets\Select2::classname(), [
                            'data' => ['Customer' => 'Customer', 'Vendor' => 'Vendor'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                            'disabled' => true,
                        ]) ?>
                    </div>
                </div>
                <div class="col-lg-5">
                    <?= $form->field($model, 'sd_shipcondition_id')->widget(\kartik\widgets\Select2::classname(), [
                        'data' => \yii\helpers\ArrayHelper::map(\app\modules\sd\models\SdShipcondition::find()->orderBy('id')->asArray()->all(), 'id', 
                            function($model, $defaultValue) {
                                return $model['code_shipcondition'].' - '.$model['desc_shipcondition'];
                            }
                        ),
                        'options' => ['placeholder' => 'Choose Sd shipcondition', 'onchange' => 'getShipcon($(this))'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]) ?>

                    <?php echo $form->field($model, 'distance_sale', ['addon' => ['append' => ['content'=>'Km']]])
                        ->textInput(['placeholder' => 'Distance Sale', 'onkeyup' => 'getDistance($(this))']) ?>
                </div>
            </div>
        </div>
        <div class="tab-pane fade in" id="tax">
            <div class="top-limit">
                <div class="form-group" id="add-sd-taxdetail"></div> 
            </div>
        </div>
        <div class="tab-pane fade in" id="reject">
            <div class="top-limit">
                <?= $form->field($model, 'reject_sale')->textarea(['rows' => 3]) ?>
            </div>
        </div>
    </div>    

    <div class="form-group" id="add-sd-salesitem"></div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'),['quotation'],['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>