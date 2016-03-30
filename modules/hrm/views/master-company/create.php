<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\hrm\models\MasterCompany */

$this->title = 'Create Master Company';
$this->params['breadcrumbs'][] = ['label' => 'Master Company', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-company-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
