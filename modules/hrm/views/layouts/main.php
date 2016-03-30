<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

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
<div id="wrapper">
    <div style="display:none;">
    <?php NavBar::begin();NavBar::end(); ?>
    </div>

    <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">ERP2015</a>
        </div>
        <!-- /.navbar-header -->
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li><a href="index.php?r=hrm/dashboard"><i class="glyphicon glyphicon-dashboard"></i> Dashboard</a></li>
                    <li>
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseOne"><i class="glyphicon glyphicon-user"></i> Recruitement and Hiring<span class="glyphicon glyphicon-chevron-right go-right"></span></a>
                        <ul id="collapseTwo" class="panel-collapse collapse nav nav-second-level" role="tabpanel">
                            <li><a href="index.php?r=hrm/hrm-job-requisition">Job Requisition</a></li>
                            <li><a href="index.php?r=hrm/hrm-candidate">Candidate</a></li>
                            <li><a href="index.php?r=hrm/hrm-hire-candidate">Hire Candidate</a></li>
                        </ul>
                    </li>
                    <li>
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseOne"><i class="glyphicon glyphicon-send"></i> Assignment<span class="glyphicon glyphicon-chevron-right go-right"></span></a>
                        <ul id="collapseThree" class="panel-collapse collapse nav nav-second-level" role="tabpanel">
                            <li><a href="index.php?r=hrm/hrm-bank-account">Bank Account</a></li>
                            <li><a href="index.php?r=hrm/hrm-skill">Skill</a></li>
                            <li><a href="index.php?r=hrm/hrm-level">Level</a></li>
                            <li><a href="index.php?r=hrm/hrm-shift">Shift</a></li>
                            <li><a href="index.php?r=hrm/hrm-employee">Employee</a></li>
                        </ul>
                    </li>
                    <li>
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour"><i class="glyphicon glyphicon-bookmark"></i> Training<span class="glyphicon glyphicon-chevron-right go-right"></span></a>
                        <ul id="collapseFour" class="panel-collapse collapse nav nav-second-level" role="tabpanel">
                            <li><a href="index.php?r=hrm/hrm-training">Training</a></li>
                            <li><a href="index.php?r=hrm/hrm-employee">Update Level</a></li>
                        </ul>
                    </li>
                    <li>
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><i class="glyphicon glyphicon-stats"></i> Target A Goal<span class="glyphicon glyphicon-chevron-right go-right"></span></a>
                        <ul id="collapseOne" class="panel-collapse collapse nav nav-second-level" role="tabpanel">
                            <li class="border-bot"><a href="index.php?r=hrm/hrm-strategic-target">Strategic Target</a></li>
                            <li><a href="index.php?r=hrm/hrm-key-result-area">Key Result Area</a></li>
                            <li><a href="index.php?r=hrm/hrm-key-performance-indicator">Key Performance Indicator</a></li>
                        </ul>
                    </li>
                    <li>
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="true" aria-controls="collapseOne"><i class="glyphicon glyphicon-tag"></i> Payroll<span class="glyphicon glyphicon-chevron-right go-right"></span></a>
                        <ul id="collapseFive" class="panel-collapse collapse nav nav-second-level" role="tabpanel">
                            <li class="border-bot"><a href="index.php?r=hrm/hrm-family-allowance">Family Allowance</a></li>
                            <li class="border-bot"><a href="index.php?r=hrm/hrm-work-exp">Working Experience</a></li>
                            <li class="border-bot"><a href="index.php?r=hrm/hrm-salary">Salary</a></li>
                            <li class="border-bot"><a href="index.php?r=hrm/hrm-payroll">Payroll</a></li>
                        </ul>
                    </li>
                    <li>
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="true" aria-controls="collapseOne"><i class="glyphicon glyphicon-remove-sign"></i> Decruiting<span class="glyphicon glyphicon-chevron-right go-right"></span></a>
                        <ul id="collapseSix" class="panel-collapse collapse nav nav-second-level" role="tabpanel">
                            <li class="border-bot"><a href="index.php?r=hrm/hrm-employee">Update Employee</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <div id="page-wrapper">
        <br><br>
        <div class="top-limit">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
        </div>
        <?= $content ?>
        <div class="bot-limit">
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Enterprise Resource Planning <?= date('Y') ?></p>  
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
