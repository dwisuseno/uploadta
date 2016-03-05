<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Personnelstructure */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Personnelstructure', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personnelstructure-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Personnelstructure'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'positions.positions_code',
            'label' => 'Positions',
        ],
        [
            'attribute' => 'employeegroup.employeegroup_name',
            'label' => 'Employeegroup',
        ],
        [
            'attribute' => 'employeesubgroup.employeesubgroup_name',
            'label' => 'Employeesubgroup',
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>