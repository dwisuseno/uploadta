<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdSale */

$this->title = $model->inquirycode_sale;
$this->params['breadcrumbs'][] = ['label' => 'Sd Inquiry', 'url' => ['inquiry']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sd-sale-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Sd Sale'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">                        
            <?= Html::a('Update', ['updateinquiry', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['deleteinquiry', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <?php 
                $gridColumn = [
                    'inquirycode_sale',
                    [
                        'attribute' => function($model){
                            return $model['sdSalestype']['desc_salestype'].' - '.$model['sdSalestype']['code_salestype'];
                        },
                        'label' => 'Sd Salestype',
                    ],
                    [
                        'attribute' => function($model){
                            return $model['sdSalesarea']['code_salesarea'];
                        },
                        'label' => 'Sd Salesarea',
                    ],
                    [
                        'attribute' => function($model){
                            return $model['sdCustomer']['name_customer'].' - '.$model['sdCustomer']['code_customer'];
                        },
                        'label' => 'Sd Customer',
                    ],
                    'ponumber_sale',
                    'podate_sale',
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
                    [
                        'attribute' => function($model){
                            return $model['net_sale'].' '.$model['currency']['codeCurrency'];
                        },
                        'label' => 'Net Price',
                    ],
                    [
                        'attribute' => function($model){
                            return $model['freightcost_sale'].' '.$model['currency']['codeCurrency'];
                        },
                        'label' => 'Freight Cost',
                    ],
                ];
                echo DetailView::widget([
                    'model' => $model,
                    'attributes' => $gridColumn
                ]); 
            ?>
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
            <div class="row">
                <div class="col-lg-6">
                    <?php 
                        $gridColumn = [
                            'delivdate_sale',
                            'validfrom_sale',
                            'pricedate_sale',
                            [
                                'attribute' => function($model){
                                    return $model['arPayterm']['name_payterm'].' - '.$model['arPayterm']['code_payterm'];
                                },
                                'label' => 'Ar Payterm',
                            ],
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
                            [
                                'attribute' => function($model){
                                    return $model['weight_sale'].' Kg';
                                },
                                'label' => 'Weight',
                            ],
                            'validto_sale',                            
                            'priceexp_sale',
                        ];
                        echo DetailView::widget([
                            'model' => $model,
                            'attributes' => $gridColumn
                        ]); 
                    ?>
                </div>
            </div>
        </div>
        <div class="tab-pane fade in" id="ship">
            <div class="row">
                <div class="col-lg-6">
                    <?php 
                        $gridColumn = [
                            [
                                'attribute' => function($model){
                                    return $model['sdShip']['desc_ship'].' - '.$model['sdShip']['code_ship'];
                                },
                                'label' => 'Sd Ship',
                            ],
                            'freightpayto_sale',
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
                            [
                                'attribute' => function($model){
                                    return $model['sdShipcondition']['desc_shipcondition'].' - '.$model['sdShipcondition']['code_shipcondition'];
                                },
                                'label' => 'Sd Shipcondition',
                            ],
                            [
                                'attribute' => function($model){
                                    return $model['distance_sale'].' Km';
                                },
                                'label' => 'Distance',
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
        <div class="tab-pane fade in" id="tax">
            <?php 
                if($providerSdTaxdetail->totalCount){ 
                   $gridColumnSdTaxdetail = [ 
                       ['class' => 'yii\grid\SerialColumn'], 
                       ['attribute' => 'id', 'hidden' => true], 
                       [ 
                           'attribute' => 'tax.code_tax', 
                           'label' => 'Tax' 
                       ],
                       'name_taxdetail', 
                       'value_taxdetail', 
                       [ 
                           'attribute' => 'currency.codeCurrency', 
                           'label' => 'Currency' 
                       ], 
                       'country_taxdetail', 
                   ]; 
                   echo Gridview::widget([ 
                       'dataProvider' => $providerSdTaxdetail, 
                       'pjax' => true, 
                       'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-sd-taxdetail']], 
                       'panel' => [ 
                       'type' => GridView::TYPE_PRIMARY, 
                       'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Sd Taxdetail'.' '. $this->title), 
                       ], 
                       'columns' => $gridColumnSdTaxdetail 
                   ]); 
                } 
            ?> 
        </div>
        <div class="tab-pane fade in" id="reject">
            <?php 
                $gridColumn = [
                    'reject_sale:ntext',
                ];
                echo DetailView::widget([
                    'model' => $model,
                    'attributes' => $gridColumn
                ]); 
            ?>
        </div>
    </div>


    <?php
        if($providerSdSalesitem->totalCount){
            $gridColumnSdSalesitem = [
                ['class' => 'yii\grid\SerialColumn'],
                ['attribute' => 'id', 'hidden' => true],
                [
                    'attribute' => 'iwmItemMaster.item_name',
                    'label' => 'Iwm Item Master'
                ],
                [
                    'attribute' => 'quantity_salesitem',
                    'label' => 'Quantity',
                ],
                [
                    'attribute' => 'desc_salesitem',
                    'label' => 'Item Description',
                ],
                [
                    'attribute' => 'uom_salesitem',
                    'label' => 'Item Uom',
                ],
                'batch',
                [
                    'attribute' => 'price_salesitem',
                    'label' => 'Item Price',
                    'value' => function($model){
                        return $model['price_salesitem'].' '.$model['currency']['codeCurrency'];
                    }
                ],
                [
                    'attribute' => 'weight_salesitem',
                    'label' => 'Total Weight',
                    'value' => function($model){
                        return $model['weight_salesitem'].' Kg';
                    }
                ],
                [
                    'attribute' => 'linetotal_salesitem',
                    'label' => 'Total Price',
                ],
                [
                    'attribute' => 'confirmqty_salesitem',
                    'label' => 'Confirmed Qty',
                ],
                [
                    'attribute' => 'pickqty',
                    'label' => 'Picked Qty',
                ],
                [
                    'attribute' => 'delivqty_salesitem',
                    'label' => 'Delivered Qty',
                ],
            ];
            echo Gridview::widget([
                'dataProvider' => $providerSdSalesitem,
                'pjax' => true,
                'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-sd-salesitem']],
                'panel' => [
                'type' => GridView::TYPE_PRIMARY,
                'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Sd Salesitem'.' '. $this->title),
                ],
                'columns' => $gridColumnSdSalesitem
            ]);
        }
    ?>

</div>