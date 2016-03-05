<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\PersonnelSubArea */

$this->title = 'Create Personnel Sub Area';
$this->params['breadcrumbs'][] = ['label' => 'Personnel Sub Area', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personnel-sub-area-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
