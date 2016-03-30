<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdCustomer */

?>
<div class="sd-customer-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->id) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'code_customer',
        'title_customer',
        'name_customer',
        'street_customer',
        'postal_customer',
        'city_customer',
        'pay_customer',
        'probability_customer',
        'delivprior_customer',
        'pb_customer',
        'telp_customer',
        'telpext_customer',
        'mobile_customer',
        'email_customer:email',
        'comment_customer:ntext',
        [
            'attribute' => 'sdSalesarea.id',
            'label' => 'Sd Salesarea',
        ],
        [
            'attribute' => 'arPayterm.id',
            'label' => 'Ar Payterm',
        ],
        [
            'attribute' => 'sdCp.id',
            'label' => 'Sd Cp',
        ],
        [
            'attribute' => 'sdShip.id',
            'label' => 'Sd Ship',
        ],
        [
            'attribute' => 'currency.id',
            'label' => 'Currency',
        ],
        [
            'attribute' => 'arDunning.id',
            'label' => 'Ar Dunning',
        ],
        [
            'attribute' => 'country.id',
            'label' => 'Country',
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>