<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\HrmPersonnelSubArea */

$this->title = 'Create Hrm Personnel Sub Area';
$this->params['breadcrumbs'][] = ['label' => 'Hrm Personnel Sub Area', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hrm-personnel-sub-area-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
