<?php

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\sd\models\SdSaleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sd Sale';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
    $('.search-form').toggle(1000);
    return false;
});";
$this->registerJs($search);
?>
<div class="sd-sale-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Sales Order', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Advance Search', '#', ['class' => 'btn btn-info search-button']) ?>
    </p>
        <div class="search-form" style="display:none">
        <?=  $this->render('_search', ['model' => $searchModel]); ?>
    </div>
        <?php 
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        // [
        //     'class' => 'kartik\grid\ExpandRowColumn',
        //     'width' => '50px',
        //     'value' => function ($model, $key, $index, $column) {
        //         return GridView::ROW_COLLAPSED;
        //     },
        //     'detail' => function ($model, $key, $index, $column) {
        //         return Yii::$app->controller->renderPartial('_expand', ['model' => $model]);
        //     },
        //     'headerOptions' => ['class' => 'kartik-sheet-style'],
        //     'expandOneOnly' => true
        // ],
        ['attribute' => 'id', 'hidden' => true],
        'socode_sale',
        'quotationcode_sale',
        [
            'attribute' => 'billstatus_sale',
            'format' => 'html',
            'label' => 'Bill Status',
            'value' => function($model){
                if($model->billstatus_sale == "0") return '<h4><span class="label label-warning">Incomplete</span></h4>';
                else if($model->billstatus_sale == "1") return '<h4><span class="label label-success">Complete</span></h4>';
            }
        ],
        [
            'attribute' => 'sostatus_sale',
            'format' => 'html',
            'label' => 'So Status',
            'value' => function($model){
                if($model->sostatus_sale == "2") return '<h4><span class="label label-warning">Incomplete</span></h4>';
                else if($model->sostatus_sale == "3") return '<h4><span class="label label-success">Complete</span></h4>';
            }
        ],
        [
            'attribute' => 'sd_salestype_id',
            'label' => 'Sd Salestype',
            'value' => function($model){
                return $model['sdSalestype']['code_salestype'];
            },
            'filterType' => GridView::FILTER_SELECT2,
            'filter' => \yii\helpers\ArrayHelper::map(\app\modules\sd\models\SdSalestype::find()->asArray()->all(), 'id', 'code_salestype'),
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
            'filterInputOptions' => ['placeholder' => 'Sd salestype', 'id' => 'grid-sd-sale-search-sd_salestype_id']
        ],
        [
            'attribute' => 'sd_salesarea_id',
            'label' => 'Sd Salesarea',
            'value' => function($model){
                return $model['sdSalesarea']['code_salesarea'];
            },
            'filterType' => GridView::FILTER_SELECT2,
            'filter' => \yii\helpers\ArrayHelper::map(\app\modules\sd\models\SdSalesarea::find()->asArray()->all(), 'id', 'code_salesarea'),
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
            'filterInputOptions' => ['placeholder' => 'Sd salesarea', 'id' => 'grid-sd-sale-search-sd_salesarea_id']
        ],
        [
            'attribute' => 'sd_customer_id',
            'label' => 'Sd Customer',
            'value' => function($model){
                return $model['sdCustomer']['code_customer'];
            },
            'filterType' => GridView::FILTER_SELECT2,
            'filter' => \yii\helpers\ArrayHelper::map(\app\modules\sd\models\SdCustomer::find()->asArray()->all(), 'id', 'code_customer'),
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
            'filterInputOptions' => ['placeholder' => 'Sd customer', 'id' => 'grid-sd-sale-search-sd_customer_id']
        ],
        'shipto_sale',
        [
            'attribute' => 'billto_sale',
            'label' => 'Sd Billto',
            'value' => function($model){
                return $model['sdCustomer']['code_customer'];
            },
            'filterType' => GridView::FILTER_SELECT2,
            'filter' => \yii\helpers\ArrayHelper::map(\app\modules\sd\models\SdCustomer::find()->asArray()->all(), 'id', 'code_customer'),
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
            'filterInputOptions' => ['placeholder' => 'Sd customer', 'id' => 'grid-sd-sale-search-billto_sale']
        ],
        [
            'attribute' => 'net_sale',
            'label' => 'Net Price',
            'value' => function($model){
                return $model['net_sale'].' '.$model['currency']['codeCurrency'];
            },
        ],
        [
            'attribute' => 'freightcost_sale',
            'label' => 'Freight Cost',
            'value' => function($model){
                return $model['freightcost_sale'].' '.$model['currency']['codeCurrency'];
            },
        ],
        'freightpayto_sale',
        'ponumber_sale',
        'delivdate_sale',
        [
            'attribute' => 'ar_payterm_id',
            'label' => 'Ar Payterm',
            'value' => function($model){
                return $model['arPayterm']['id'];
            },
            'filterType' => GridView::FILTER_SELECT2,
            'filter' => \yii\helpers\ArrayHelper::map(\app\modules\ar\models\ArPayterm::find()->asArray()->all(), 'id', 'id'),
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
            'filterInputOptions' => ['placeholder' => 'Ar payterm', 'id' => 'grid-sd-sale-search-ar_payterm_id']
        ],  
        [
            'class' => 'yii\grid\ActionColumn',
        ],
    ]; 
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumn,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-sd-sale']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
        ],
        // set a label for default menu
        'export' => [
            'label' => 'Page',
            'fontAwesome' => true,
        ],
        // your toolbar can include the additional full export menu
        'toolbar' => [
            '{export}',
            ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => $gridColumn,
                'target' => ExportMenu::TARGET_BLANK,
                'fontAwesome' => true,
                'dropdownOptions' => [
                    'label' => 'Full',
                    'class' => 'btn btn-default',
                    'itemsBefore' => [
                        '<li class="dropdown-header">Export All Data</li>',
                    ],
                ],
            ]) ,
        ],
    ]); ?>

</div>
