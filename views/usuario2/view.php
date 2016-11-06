<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario2 */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Usuario2s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario2-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'firstName',
            'lastName',
            'username',
            'password',
            'authKey',
            'email:email',
            'admin',
            'telefone',
            'cpf',
            'rg',
            'dataNasc',
            'estado',
            'cidade',
            'bairro',
            'rua',
            'numero',
            'referencia',
            'nomeEmergencia',
            'telefoneEmergencia',
            'latitude',
            'longitude',
        ],
    ]) ?>

</div>
