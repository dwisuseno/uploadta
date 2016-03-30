<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\sd\models\SdCp */

$this->title = $model->code_cp;
$this->params['breadcrumbs'][] = ['label' => 'Sd Cp', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sd-cp-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Sd Cp'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
                        
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <?php 
                $gridColumn = [
                    'code_cp',
                    'title_cp',
                    'firstname_cp',
                    'middlename_cp',
                    'lastname_cp',
                ];
                echo DetailView::widget([
                    'model' => $model,
                    'attributes' => $gridColumn
                ]); 
            ?>
        </div>
        <div class="col-lg-6">
            <?php 
                $gridColumn = [
                    'email_cp:email',
                    'telp_cp',
                    'telpext_cp',
                    'mobile_cp',
                    'department_cp',
                ];
                echo DetailView::widget([
                    'model' => $model,
                    'attributes' => $gridColumn
                ]); 
            ?>
        </div>
    </div>
</div>