<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\HrData */

$this->title = 'Create Hr Data';
$this->params['breadcrumbs'][] = ['label' => 'Hr Data', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hr-data-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
