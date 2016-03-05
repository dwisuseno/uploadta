<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\Dropdown;
use yii\bootstrap\ButtonGroup;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\widgets\Menu;
use kartik\sidenav\SideNav;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'ERP 2015',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-default navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            //['label' => 'Home', 'url' => ['/site/index']],
            //['label' => 'About', 'url' => ['/site/about']],
            //['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
                    <li><a href="#">Reports</a></li>
                    <li><a href="#">Analytics</a></li>
                    <li><a href="#">Export</a></li>
                  </ul>
                  <ul class="nav nav-sidebar">
                    <li><a href="">Nav item</a></li>
                    <li><a href="">Nav item again</a></li>
                    <li><a href="">One more nav</a></li>
                    <li><a href="">Another nav item</a></li>
                    <li><a href="">More navigation</a></li>
                  </ul>
                  <ul class="nav nav-sidebar">
                    <li><a href="">Nav item again</a></li>
                    <li><a href="">One more nav</a></li>
                    <li><a href="">Another nav item</a></li>
                  </ul>
            </div>
        </div>
        <div class="col-xs-6 col-sm-3">
            <?php
            echo SideNav::widget([
                    'type' => SideNav::TYPE_DEFAULT,
                    'heading' => 'Dashboard',
                    'items' => [
                        [
                            'url' => 'index.php?r=hrm/default/menu',
                            'label' => 'KPI',
                            'icon' => 'user'
                        ],
                        [
                            'label' => 'Setting KPI',
                            'icon' => 'question-sign',
                            'items' => [
                                ['label' => 'Sasaran Strategis',  'url'=>'index.php?r=hrm/sasaran-strategis'],
                                ['label' => 'Key Results Area', 'url'=>'index.php?r=hrm/kra'],
                                ['label' => 'Tasks', 'url'=>'index.php?r=hrm/tasks'],
                                ['label' => 'KPI per Tasks', 'url'=>'index.php?r=hrm/kpi'],
                                ['label' => 'KPI Type', 'url'=>'index.php?r=hrm/kpi-type'],
                            ],
                        ],
                    ],
                ]); 
            echo SideNav::widget([
                'type' => SideNav::TYPE_DEFAULT,
                'heading' => 'Structure',
                'items' => [
                    [
                        'url' => 'index.php?r=hrm',
                        'label' => 'Org Structure',
                        'icon' => 'home'
                    ],
                    [
                        'label' => 'Setting Structure',
                        'icon' => 'question-sign',
                        'items' => [
                            ['label' => 'Client',  'url'=>'index.php?r=hrm/client'],
                            ['label' => 'Company', 'url'=>'index.php?r=hrm/company'],
                            ['label' => 'Personnel Area', 'url'=>'index.php?r=hrm/personnel-area'],
                            ['label' => 'Personnel Subarea', 'url'=>'index.php?r=hrm/personnel-sub-area'],
                        ],
                    ],
                    [
                        'url' => 'index.php?r=hrm',
                        'label' => 'Personnel Structure',
                        'icon' => 'home'
                    ],
                    [
                        'label' => 'Setting Person Structure',
                        'icon' => 'question-sign',
                        'items' => [
                            ['label' => 'Positions',  'url'=>'index.php?r=hrm/positions'],
                            ['label' => 'Employee Group', 'url'=>'index.php?r=hrm/employee-group'],
                            ['label' => 'Employee Subgroup', 'url'=>'index.php?r=hrm/employee-sub-group'],
                            ['label' => 'Jobs', 'url'=>'index.php?r=hrm/jobs'],
                        ],
                    ],
                ],
            ]);
                echo SideNav::widget([
                    'type' => SideNav::TYPE_DEFAULT,
                    'heading' => 'Person',
                    'items' => [
                        [
                            'url' => 'index.php?r=hrm/employee',
                            'label' => 'Employee',
                            'icon' => 'home'
                        ],
                        [
                            'label' => 'Setting Employee',
                            'icon' => 'question-sign',
                            'items' => [
                                ['label' => 'Skill', 'url'=>'index.php?r=hrm/skill'],
                                ['label' => 'HR Data', 'url'=>'index.php?r=hrm/hr-data'],
                                ['label' => 'Bank Account', 'url'=>'index.php?r=hrm/bank-account'],
                            ],
                        ],
                    ],
                ]);
                echo SideNav::widget([
                    'type' => SideNav::TYPE_DEFAULT,
                    'heading' => 'Payroll',
                    'items' => [
                        [
                            'url' => 'index.php?r=hrm/payroll',
                            'label' => 'Payroll',
                            'icon' => 'home'
                        ],
                        [
                            'label' => 'Setting Payroll',
                            'icon' => 'question-sign',
                            'items' => [
                                ['label' => 'Salary',  'url'=>'index.php?r=hrm/salary'],
                                ['label' => 'Family Allowance', 'url'=>'index.php?r=hrm/family-allowance'],
                                ['label' => 'Work Exp', 'url'=>'index.php?r=hrm/work-exp'],
                            ],
                        ],
                    ],
                ]);
                
            ?>
        </div>
        <div class="col-md-9 center">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Lab. Manajemen Informasi <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered()?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
