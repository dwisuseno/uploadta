<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Employeehashrdata */

$this->title = $model->employee_id;
$this->params['breadcrumbs'][] = ['label' => 'Employeehashrdata', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employeehashrdata-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Employeehashrdata'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            <?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . 'PDF', 
                ['pdf', 'id' => $model['employee_id']],
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => 'Will open the generated PDF file in a new window'
                ]
            )?>                        
            <?= Html::a('Update', ['update', 'employee_id' => $model->employee_id, 'hrdata_id' => $model->hrdata_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'employee_id' => $model->employee_id, 'hrdata_id' => $model->hrdata_id], [
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
        [
            'attribute' => 'employee.id',
            'label' => 'Employee',
        ],
        [
            'attribute' => 'hrdata.id',
            'label' => 'Hrdata',
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>