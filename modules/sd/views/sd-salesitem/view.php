<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdSalesitem */

$this->title = $model['iwmItemMaster']['item_name'];
$this->params['breadcrumbs'][] = ['label' => 'Sd Salesitem', 'url' => [Url::previous()]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sd-salesitem-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Sd Salesitem'.' '. Html::encode($this->title) ?></h2>
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

    <div class="row">
        <div class="col-lg-6">
            <?php 
                $gridColumn = [
                    [
                        'attribute' => function($model){
                            return $model['iwmItemMaster']['item_name'];
                        },
                        'label' => 'Iwm Item Master',
                    ],
                    [
                        'attribute' => function($model){
                            return $model['quantity_salesitem'].' '.$model['uom_salesitem'];
                        },
                        'label' => 'Quantity',
                    ],
                    'desc_salesitem',
                    [
                        'attribute' => function($model){
                            return $model['price_salesitem'].' '.$model['currency']['codeCurrency'];
                        },
                        'label' => 'Price',
                    ],
                    [
                        'attribute' => function($model){
                            return $model['linetotal_salesitem'].' '.$model['currency']['codeCurrency'];
                        },
                        'label' => 'Line Price',
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
                    'batch',
                    [
                        'attribute' => function($model){
                            return $model['weight_salesitem'].' Kg';
                        },
                        'label' => 'Weight Total',
                    ],
                    [
                        'attribute' => 'confirmqty_salesitem',
                        'label' => 'Confirmed Qty',
                    ],
                    'pickqty',
                    'delivqty_salesitem',
                ];
                echo DetailView::widget([
                    'model' => $model,
                    'attributes' => $gridColumn
                ]); 
            ?>
        </div>
    </div>

    <ul class="nav nav-tabs top-limit">
        <li class="active"><a href="#price" class="btn btn-sm btn-success" data-toggle="tab">Price</a></li>
        <li><a href="#schedule" class="btn btn-sm btn-success" data-toggle="tab">Schedule</a></li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane fade in active" id="price">
            <div class="row">
                <div class="col-lg-12">
                    <?php
                        if($providerSdPricedetail->totalCount){
                            $gridColumnSdPricedetail = [
                                ['class' => 'yii\grid\SerialColumn'],
                                [
                                    'attribute' => 'sdPrice.code_price',
                                    'label' => 'Sd Price'
                                ],
                                [
                                    'attribute' => 'tax.code_tax',
                                    'label' => 'Tax'
                                ],
                                [
                                    'attribute' => 'currency.codeCurrency',
                                    'label' => 'Currency'
                                ],
                                'name_pricedetail',
                                'amount_pricedetail',
                                'value_pricedetail',
                                'line_pricedetail',
                            ];
                            echo Gridview::widget([
                                'dataProvider' => $providerSdPricedetail,
                                'pjax' => true,
                                'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-sd-pricedetail']],
                                'panel' => [
                                'type' => GridView::TYPE_PRIMARY,
                                'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Sd Pricedetail'.' '. $this->title),
                                ],
                                'columns' => $gridColumnSdPricedetail
                            ]);
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="tab-pane fade in" id="schedule">
            <div class="row">
                <div class="col-lg-12">
                    <?php
                        if($providerSdSchedule->totalCount){
                            $gridColumnSdSchedule = [
                                ['class' => 'yii\grid\SerialColumn'],
                                    ['attribute' => 'id', 'hidden' => true],
                                    'confirmdate_schedule',
                                    'confirmqty_schedule',
                                    'pickdate_schedule',
                                    'pickqty_schedule',
                                    'delivdate_schedule',
                                    'delivqty_schedule',
                            ];
                            echo Gridview::widget([
                                'dataProvider' => $providerSdSchedule,
                                'pjax' => true,
                                'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-sd-schedule']],
                                'panel' => [
                                'type' => GridView::TYPE_PRIMARY,
                                'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Sd Schedule'.' '. $this->title),
                                ],
                                'columns' => $gridColumnSdSchedule
                            ]);
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>