<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\IwmItemmaster */

$this->title = $model->code_itemmaster;
$this->params['breadcrumbs'][] = ['label' => 'Iwm Itemmaster', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="iwm-itemmaster-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Iwm Itemmaster'.' '. Html::encode($this->title) ?></h2>
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
        'code_itemmaster',
        'desc_itemmaster',
        [
            'attribute' => 'uom.id',
            'label' => 'Uom',
        ],
        'price_itemmaster',
        [
            'attribute' => 'currency.id',
            'label' => 'Currency',
        ],
        'weight_itemmaster',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
</div>