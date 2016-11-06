<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario2Busca */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario2-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'firstName') ?>

    <?= $form->field($model, 'lastName') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'password') ?>

    <?php // echo $form->field($model, 'authKey') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'admin') ?>

    <?php // echo $form->field($model, 'telefone') ?>

    <?php // echo $form->field($model, 'cpf') ?>

    <?php // echo $form->field($model, 'rg') ?>

    <?php // echo $form->field($model, 'dataNasc') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'cidade') ?>

    <?php // echo $form->field($model, 'bairro') ?>

    <?php // echo $form->field($model, 'rua') ?>

    <?php // echo $form->field($model, 'numero') ?>

    <?php // echo $form->field($model, 'referencia') ?>

    <?php // echo $form->field($model, 'nomeEmergencia') ?>

    <?php // echo $form->field($model, 'telefoneEmergencia') ?>

    <?php // echo $form->field($model, 'latitude') ?>

    <?php // echo $form->field($model, 'longitude') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
