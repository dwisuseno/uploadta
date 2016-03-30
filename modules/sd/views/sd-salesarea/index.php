<?php

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\sd\models\SdSalesareaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sd Salesarea';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="sd-salesarea-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Sd Salesarea', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Advance Search', '#', ['class' => 'btn btn-info search-button']) ?>
    </p>
        <div class="search-form" style="display:none">
        <?=  $this->render('_search', ['model' => $searchModel]); ?>
    </div>
        <?php 
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        'code_salesarea',
        [
                'attribute' => 'company_id',
                'label' => 'Company',
                'value' => function($model){
                    return $model->company->company_code;
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\modules\master\models\Company::find()->asArray()->all(), 'id', 'company_code'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Company', 'id' => 'grid-sd-salesarea-search-company_id']
            ],
        [
                'attribute' => 'sd_salesorg_id',
                'label' => 'Sd Salesorg',
                'value' => function($model){
                    return $model->sdSalesorg->code_salesorg;
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\modules\sd\models\SdSalesorg::find()->asArray()->all(), 'id', 'code_salesorg'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Sd salesorg', 'id' => 'grid-sd-salesarea-search-sd_salesorg_id']
            ],
        [
                'attribute' => 'sd_division_id',
                'label' => 'Sd Division',
                'value' => function($model){
                    return $model->sdDivision->code_division;
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\modules\sd\models\SdDivision::find()->asArray()->all(), 'id', 'code_division'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Sd division', 'id' => 'grid-sd-salesarea-search-sd_division_id']
            ],
        [
            'attribute' => 'sd_dchl_id',
            'label' => 'Sd Dchl',
            'value' => function($model){
                return $model->sdDchl->code_dchl;
            },
            'filterType' => GridView::FILTER_SELECT2,
            'filter' => \yii\helpers\ArrayHelper::map(\app\modules\sd\models\SdDchl::find()->asArray()->all(), 'id', 'code_dchl'),
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
            'filterInputOptions' => ['placeholder' => 'Sd dchl', 'id' => 'grid-sd-salesarea-search-sd_dchl_id']
        ],
        [
            'attribute' => 'status_salesarea',
            'label' => 'Status Salesarea',
            'value' => function($model){
                return $model['status_salesarea'];
            },
            'filterType' => GridView::FILTER_SELECT2,
            'filter' => \yii\helpers\ArrayHelper::map(\app\modules\sd\models\SdSalesarea::find()->asArray()->all(), 'status_salesarea', 'status_salesarea'),
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
            'filterInputOptions' => ['placeholder' => 'Status Salesarea', 'id' => 'grid-sd-salesarea-search-status_salesarea']
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
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-sd-salesarea']],
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
