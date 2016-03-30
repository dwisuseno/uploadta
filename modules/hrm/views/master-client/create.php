<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\MasterClient */

$this->title = 'Create Master Client';
$this->params['breadcrumbs'][] = ['label' => 'Master Client', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-client-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
