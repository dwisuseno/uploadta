<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdCustomeraccount */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sd Customeraccount', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sd-customeraccount-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Sd Customeraccount'.' '. Html::encode($this->title) ?></h2>
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
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'city_bank',
        'country_bank',
        'key_bank',
        'account_bank',
        'holder_customeraccount',
        [
            'attribute' => 'glBank.id',
            'label' => 'Gl Bank',
        ],
        [
            'attribute' => 'sdCustomer.id',
            'label' => 'Sd Customer',
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>