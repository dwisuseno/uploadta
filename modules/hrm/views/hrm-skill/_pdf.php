<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\HrmSkill */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Hrm Skill', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hrm-skill-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Hrm Skill'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'level.level_code',
            'label' => 'Hrm Level',
        ],
        'skill_code',
        'detail_skill:ntext',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>