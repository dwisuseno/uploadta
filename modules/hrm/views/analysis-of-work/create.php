<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\AnalysisOfWork */

$this->title = 'Create Analysis Of Work';
$this->params['breadcrumbs'][] = ['label' => 'Analysis Of Work', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="analysis-of-work-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
