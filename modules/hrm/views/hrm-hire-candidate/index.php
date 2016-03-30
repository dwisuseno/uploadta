<?php

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use yii\bootstrap\Alert;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\hrm\models\HrmCandidateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hire Candidate';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="hrm-candidate-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="search-form" style="display:none">
        <?=  $this->render('_search', ['model' => $searchModel]); ?>
    </div>

    <?php 
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        'name',
         [                     
            'format' => 'html',
            'attribute' => 'photo',
            'label' => 'Photo',
            'content' => function($model){
                return Html::img($model->photo, ['alt'=>$model->photo,'width'=>'150']);
                }
        ],
        [
            'format' => 'html',
            'attribute' => 'cv', 
            'label' => 'File CV',
            'content' => function($model){
                return Html::a($model->cv,$model->cv,['target' => '_blank']);
            }
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{hire} {remove}',
            'buttons' => [
                'hire' => function($url,$model,$key){
                    if($model->status == "0"){
                        return Html::a(
                            "<span class='btn btn-default'><i class='glyphicon glyphicon-ok'></i></span>",
                            $url,[
                                'title' => 'dawu',
                                'data-pjax' => '0',
                            ]
                        );
                    } else if($model->status == "1") {
                        return "<h4><span class='label label-success'>Hired</span></h4>";
                    }
                     else {
                        return "<h4><span class='label label-danger'>Rejected</span></h4>"; 
                    }
                },
                'remove' => function($url,$model,$key){
                    if($model->status == "0"){
                        // Alert::begin([
                        //     'options' => [
                        //         'class' => 'alert-warning',
                        //     ],
                        // ]);

                        // echo 'Say hello...';

                        // Alert::end();
                        return Html::a(
                            "<span class='btn btn-default'><i class='glyphicon glyphicon-remove'></i></span>",
                            $url,[
                                'title' => 'dawu',
                                'data-pjax' => '0',
                            ]
                        );
                    } 
                },
            ], 
        ],
        [
            'attribute' => 'created_at', 
            'label' => 'Date Submitted',
        ],
    ]; 
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumn,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode($this->title) . ' </h3>',
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
