<?php

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\sd\models\SdCustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sd Customer';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="sd-customer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Sd Customer', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Advance Search', '#', ['class' => 'btn btn-info search-button']) ?>
    </p>
        <div class="search-form" style="display:none">
        <?=  $this->render('_search', ['model' => $searchModel]); ?>
    </div>
        <?php 
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        'code_customer',
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
            'filterInputOptions' => ['placeholder' => 'Sd salesarea', 'id' => 'grid-sd-customer-search-sd_salesarea_id']
        ],
        [
            'attribute' => 'name_customer',
            'label' => 'Name Customer',
            'value' => function($model){
                return $model['title_customer'].' '.$model['name_customer'];
            },
        ],
        'city_customer',
        [
            'attribute' => 'country_id',
            'label' => 'Country',
            'value' => function($model){
                return $model['country']['code_country'];
            },
            'filterType' => GridView::FILTER_SELECT2,
            'filter' => \yii\helpers\ArrayHelper::map(\app\modules\master\models\Country::find()->asArray()->all(), 'id', 'code_country'),
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
            'filterInputOptions' => ['placeholder' => 'Country', 'id' => 'grid-sd-customer-search-country_id']
        ],
        [
            'attribute' => 'probability_customer',
            'label' => 'Probability',
            'value' => function($model){
                return $model['probability_customer'].' %';
            },
        ],
        [
            'attribute' => 'currency_id',
            'label' => 'Currency',
            'value' => function($model){
                return $model['currency']['codeCurrency'];
            },
            'filterType' => GridView::FILTER_SELECT2,
            'filter' => \yii\helpers\ArrayHelper::map(\app\modules\master\models\Currency::find()->asArray()->all(), 'id', 'codeCurrency'),
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
            'filterInputOptions' => ['placeholder' => 'Currency', 'id' => 'grid-sd-customer-search-currency_id']
        ],
        'delivprior_customer',
        [
            'attribute' => 'telp_customer',
            'label' => 'Telp Customer',
            'value' => function($model){
                return $model['telp_customer'].' ext.'.$model['telpext_customer'];
            },
        ],
        'mobile_customer',
        'email_customer:email',
        [
            'attribute' => 'sd_cp_id',
            'label' => 'Sd Cp',
            'value' => function($model){
                return $model['sdCp']['code_cp'];
            },
            'filterType' => GridView::FILTER_SELECT2,
            'filter' => \yii\helpers\ArrayHelper::map(\app\modules\sd\models\SdCp::find()->asArray()->all(), 'id', 'code_cp'),
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
            'filterInputOptions' => ['placeholder' => 'Sd cp', 'id' => 'grid-sd-customer-search-sd_cp_id']
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
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-sd-customer']],
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
