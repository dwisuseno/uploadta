<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdSalesarea */

$this->title = $model->code_salesarea;
$this->params['breadcrumbs'][] = ['label' => 'Sd Salesarea', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sd-salesarea-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Sd Salesarea'.' '. Html::encode($this->title) ?></h2>
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

<?php 
    $gridColumn = [
        'code_salesarea',
        [
            'attribute' => function($model){
                return $model['company']['company_name'].' - '.$model['company']['company_code'];
            },
            'label' => 'Company',
        ],
        [
            'attribute' => function($model){
                return $model['sdSalesorg']['name_salesorg'].' - '.$model['sdSalesorg']['code_salesorg'];
            },
            'label' => 'Sd Salesorg',
        ],
        [
            'attribute' => function($model){
                return $model['sdDivision']['name_division'].' - '.$model['sdDivision']['code_division'];
            },
            'label' => 'Sd Division',
        ],
        [
            'attribute' => function($model){
                return $model['sdDchl']['name_dchl'].' - '.$model['sdDchl']['code_dchl'];
            },
            'label' => 'Sd Dchl',
        ],
        'status_salesarea',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>