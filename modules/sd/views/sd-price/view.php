<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdPrice */

$this->title = $model->code_price;
$this->params['breadcrumbs'][] = ['label' => 'Sd Price', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sd-price-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Sd Price'.' '. Html::encode($this->title) ?></h2>
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
        'code_price',
        'name_price',
        [
            'attribute' => function($model){
                return $model['amount_price'].' '.$model['currency']['codeCurrency'];
            },
            'label' => 'Amount Price',
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
</div>