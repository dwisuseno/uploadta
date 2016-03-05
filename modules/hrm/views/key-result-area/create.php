<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\KeyResultArea */

$this->title = 'Create Key Result Area';
$this->params['breadcrumbs'][] = ['label' => 'Key Result Area', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="key-result-area-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
