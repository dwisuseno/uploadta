<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->sdSalesitems,
        'key' => 'id'
    ]);
    $gridColumns = [
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
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'sd-salesitem'
        ],
    ];
    
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns,
        'containerOptions' => ['style' => 'overflow: auto'],
        'pjax' => true,
        'beforeHeader' => [
            [
                'options' => ['class' => 'skip-export']
            ]
        ],
        'export' => [
            'fontAwesome' => true
        ],
        'bordered' => true,
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'hover' => true,
        'showPageSummary' => false,
        'persistResize' => false,
    ]);
