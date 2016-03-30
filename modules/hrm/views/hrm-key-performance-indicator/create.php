<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\HrmKeyPerformanceIndicator */

$this->title = 'Create Hrm Key Performance Indicator';
$this->params['breadcrumbs'][] = ['label' => 'Hrm Key Performance Indicator', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hrm-key-performance-indicator-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
