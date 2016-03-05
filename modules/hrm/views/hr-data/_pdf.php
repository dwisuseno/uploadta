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