<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\KeyResultArea */

$this->title = 'Update Key Result Area: ' . ' ' . $model->key_result_area;
$this->params['breadcrumbs'][] = ['label' => 'Key Result Area', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->key_result_area, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="key-result-area-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
