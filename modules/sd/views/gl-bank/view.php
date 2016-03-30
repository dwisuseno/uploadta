<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\GlBank */

$this->title = $model->name_bank;
$this->params['breadcrumbs'][] = ['label' => 'Gl Bank', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gl-bank-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Gl Bank'.' '. Html::encode($this->title) ?></h2>
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
        'name_bank',
        'city_bank',
        [
            'attribute' => function($model){
                return $model['country']['name_country'].' - '.$model['country']['code_country'];
            },
            'label' => 'Country',
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
</div>