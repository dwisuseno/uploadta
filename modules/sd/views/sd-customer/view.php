<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdCustomer */

$this->title = $model->code_customer;
$this->params['breadcrumbs'][] = ['label' => 'Sd Customer', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sd-customer-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Sd Customer'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
                        
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <ul class="nav nav-tabs top-limit no-bot-border">
        <li class="active"><a href="#genData" class="btn btn-sm btn-success" data-toggle="tab">General Data</a></li>
        <li><a href="#comData" class="btn btn-sm btn-success" data-toggle="tab">Company Data</a></li>
        <li><a href="#saleData" class="btn btn-sm btn-success" data-toggle="tab">Sales Data</a></li>
    </ul>

    <div class="row">
        <div class="col-lg-12">
            <?php 
                $gridColumn = [
                    'code_customer',
                    [
                        'attribute' => function($model){
                            return $model['sdSalesarea']['code_salesarea'];
                        },
                        'label' => 'Sd Salesarea',
                    ],
                ];
                echo DetailView::widget([
                    'model' => $model,
                    'attributes' => $gridColumn
                ]); 
            ?>
        </div>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade in active" id="genData">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#address" data-toggle="tab">Address</a></li>
                <li><a href="#transaction" data-toggle="tab">Payment Transaction</a></li>
                <li><a href="#cp" data-toggle="tab">Contact Person</a></li>
            </ul>
            <div class="row">
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="address">
                        <div class="col-lg-6">
                            <?php 
                                $gridColumn = [
                                    'title_customer',
                                    'name_customer',
                                    'street_customer',
                                    'postal_customer',
                                    'city_customer',
                                    [
                                        'attribute' => function($model){
                                            return $model['country']['name_country'].' - '.$model['country']['code_country'];
                                        },
                                        'label' => 'Country',
                                    ],
                                    'pb_customer',
                                ];
                                echo DetailView::widget([
                                    'model' => $model,
                                    'attributes' => $gridColumn
                                ]); 
                            ?>
                        </div>
                        <div class="col-lg-6">
                            <?php 
                                $gridColumn = [
                                    'telp_customer',
                                    'telpext_customer',
                                    'mobile_customer',
                                    'email_customer:email',
                                    'comment_customer:ntext',
                                ];
                                echo DetailView::widget([
                                    'model' => $model,
                                    'attributes' => $gridColumn
                                ]); 
                            ?>
                        </div>
                    </div>
                    <div class="tab-pane fade in" id="transaction">
                        <div class="col-lg-12">
                            <?php
                            if($providerSdCustomeraccount->totalCount){
                                $gridColumnSdCustomeraccount = [
                                    ['class' => 'yii\grid\SerialColumn'],
                                    [
                                        'attribute' => 'gl_bank_id',
                                        'value' => function($model){
                                            return $model['glBank']['name_bank'];
                                        },
                                        'label' => 'Gl Bank'
                                    ],
                                    'city_bank',
                                    'country_bank',
                                    'key_bank',
                                    'account_bank',
                                    'holder_customeraccount',
                                ];
                                echo Gridview::widget([
                                    'dataProvider' => $providerSdCustomeraccount,
                                    'pjax' => true,
                                    'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-sd-customeraccount']],
                                    'panel' => [
                                    'type' => GridView::TYPE_PRIMARY,
                                    'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Sd Customeraccount'.' '. $this->title),
                                    ],
                                    'columns' => $gridColumnSdCustomeraccount
                                ]);
                            }
                            ?>
                        </div>
                    </div>
                    <div class="tab-pane fade in" id="cp">
                        <div class="col-lg-12">
                            <?php 
                                $gridColumn = [
                                    [
                                        'attribute' => function($model){
                                            return $model['sdCp']['firstname_cp'].' '.$model['sdCp']['lastname_cp'].' - '.$model['sdCp']['code_cp'];
                                        },
                                        'label' => 'Sd Cp',
                                    ],
                                ];
                                echo DetailView::widget([
                                    'model' => $model,
                                    'attributes' => $gridColumn
                                ]); 
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade in" id="comData">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#transaction1" data-toggle="tab">Payment Transaction</a></li>
                <li><a href="#cores" data-toggle="tab">Corespondence</a></li>
            </ul>
            <div class="row">
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="transaction1">
                        <div class="col-lg-12">
                            <?php 
                                $gridColumn = [
                                    [
                                        'attribute' => function($model){
                                            return $model['arPayterm']['name_payterm'].' - '.$model['arPayterm']['code_payterm'];
                                        },
                                        'label' => 'Ar Payterm',
                                    ],
                                    'pay_customer',
                                ];
                                echo DetailView::widget([
                                    'model' => $model,
                                    'attributes' => $gridColumn
                                ]); 
                            ?>
                        </div>
                    </div>
                    <div class="tab-pane fade in" id="cores">
                        <div class="col-lg-12">
                            <?php 
                                $gridColumn = [
                                    [
                                        'attribute' => function($model){
                                            return $model['arDunning']['description'].' - '.$model['arDunning']['codeDunning'];
                                        },
                                        'label' => 'Ar Dunning',
                                    ],
                                ];
                                echo DetailView::widget([
                                    'model' => $model,
                                    'attributes' => $gridColumn
                                ]); 
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade in" id="saleData">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#sales" data-toggle="tab">Sales</a></li>
                <li><a href="#shipping" data-toggle="tab">Shipping</a></li>
            </ul>
            <div class="row">
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="sales">
                        <div class="col-lg-12">
                            <?php 
                                $gridColumn = [
                                    [
                                        'attribute' => function($model){
                                            return $model['probability_customer'].' %';
                                        },
                                        'label' => 'Probability Customer',
                                    ],
                                    [
                                        'attribute' => function($model){
                                            return $model['currency']['nameCurrency'].' - '.$model['currency']['codeCurrency'];
                                        },
                                        'label' => 'Currency',
                                    ],
                                ];
                                echo DetailView::widget([
                                    'model' => $model,
                                    'attributes' => $gridColumn
                                ]); 
                            ?>
                        </div>
                    </div>
                    <div class="tab-pane fade in" id="shipping">
                        <div class="col-lg-12">
                            <?php 
                                $gridColumn = [
                                    [
                                        'attribute' => function($model){
                                            return $model['sdShip']['desc_ship'].' - '.$model['sdShip']['code_ship'];
                                        },
                                        'label' => 'Sd Ship',
                                    ],
                                    'delivprior_customer',
                                ];
                                echo DetailView::widget([
                                    'model' => $model,
                                    'attributes' => $gridColumn
                                ]); 
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>