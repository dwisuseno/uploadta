<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\WorkExp */

$this->title = 'Create Work Exp';
$this->params['breadcrumbs'][] = ['label' => 'Work Exp', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-exp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
