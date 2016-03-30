<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\MasterPersonnelSubArea */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Master Personnel Sub Area', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-personnel-sub-area-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Master Personnel Sub Area'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'personnelArea.id',
            'label' => 'Master Personnel Area',
        ],
        'personnel_subarea_code',
        'personnel_subarea_name',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnHrmEmployee = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'personnelSubArea.id',
            'label' => 'Master Personnel Sub Area',
        ],
        'person_id',
        'title',
        'first_name',
        'middle_name',
        'last_name',
        'address:ntext',
        'photo',
        'nickname',
        'email:email',
        'start_work',
        'to_work',
        'last_education',
        'gender',
        'phone_number',
        'status',
        'personnel_number',
        'date_of_birth',
        'language',
        'nationality',
        'marital_status',
        [
            'attribute' => 'bankAccount.id',
            'label' => 'Hrm Bank Account',
        ],
        'bank_account_own',
        'bank_account_number',
        'type',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerHrmEmployee,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode('Hrm Employee'.' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnHrmEmployee
    ]);
?>
    </div>
</div>