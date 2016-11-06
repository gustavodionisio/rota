<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>


<!-- container -->
<div class="container">

    <div class="row">

        <!-- Article main content -->
        <article class="col-sm-9 maincontent">
            <header class="page-header">
                <h1 class="page-title">Contato</h1>
            </header>

            <p> Se você tem alguma dúvida, sugestão, problema ou quer nos informar sobre algo, preencha o formúlario
                abaixo!
            </p>
            <br>
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
            <div class="row">
                <div class="col-sm-4">
                    <input class="form-control" type="text" placeholder="Nome">
                </div>
                <div class="col-sm-4">
                    <input class="form-control" type="text" placeholder="E-mail">
                </div>
                <div class="col-sm-4">
                    <input class="form-control" type="text" placeholder="Celular">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-12">
                    <textarea placeholder="Digite sua mensagem aqui..." class="form-control" rows="9"></textarea>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-6 text-right">
                    <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>
            </div>
            <?php ActiveForm::end(); ?>

        </article>
        <!-- /Article -->

    </div>
</div>    <!-- /container -->