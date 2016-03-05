<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\Kra */

$this->title = 'Create Kra';
$this->params['breadcrumbs'][] = ['label' => 'Kra', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kra-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
