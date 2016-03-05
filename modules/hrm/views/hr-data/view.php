<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\HrData */

$this->title = $model->employee_id;
$this->params['breadcrumbs'][] = ['label' => 'Hr Data', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hr-data-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Hr Data'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            <?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . 'PDF', 
                ['pdf', 'id' => $model['id']],
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => 'Will open the generated PDF file in a new window'
                ]
            )?>                        
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
        [
            'attribute' => 'bankAccount.bankaccount_name',
            'label' => 'Bank Account',
        ],
        'personnelnumber',
        'date_of_birth',
        'language',
        'nationality',
        'marital_status',
        'children',
        [
            'attribute' => 'employee.employee_id',
            'label' => 'Employee',
        ],
        'valid_from',
        'valid_to',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>