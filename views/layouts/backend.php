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
    <head>
        <title>Rotas para transporte escolar</title>

        <link rel="shortcut icon" href="/assets/images/icon-brazil.png">
        <link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
        <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
        <!-- Custom styles for our template -->
        <link rel="stylesheet" href="/assets/css/bootstrap-theme.css" media="screen" >
        <link rel="stylesheet" href="/assets/css/main.css">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="/web/assets/js/html5shiv.js"></script>
        <script src="/web/assets/js/respond.min.js"></script>
        <![endif]-->
        <script src="/assets/js/jquery.js"></script>
        <script src="/assets/js/bootstrap.js"></script>
        <style>
            body{
                color: #2b542c;
            }
        </style>
    </head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top headroom" >
        <div class="container">
            <div class="navbar-header">
                <!-- Button for smallest screens -->
                <!-- Button for smallest screens -->
                <!--                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" aria-expanded="false" data-target="#navbar" aria-controls="navbar"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>-->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarz">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><img src="/assets/images/icon-brazil.png" alt="Nav"></a>
            </div>
            <div class="navbar-collapse collapse" id="navbarz">
                <ul class="nav navbar-nav pull-right">
                    <li><a href="/">Usuários</a></li>
                    <li><a href="/usuario/rota">Gerar Rota</a></li>
                    <li class="active">
                        <?= Html::a('Logout',
                        ['/site/logout'],
                        ['class' => 'btn btn-success', 'data-method'=>'post']);?>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
    <!-- /.navbar -->

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer id="footer" class="top-space">
    <div class="footer2">
        <div class="container">
            <div class="row">
                <div class="col-md-6 widget">
                    <div class="widget-body">
                        <p class="text-right">
                            Copyright &copy; 2016, Gustavo Dionisio, Gustavo Oliveira, Alexandre Laureano.
                        </p>
                    </div>
                </div>

            </div> <!-- /row of widgets -->
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
