<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Usuario2Busca */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuario2s';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario2-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Usuario2', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'firstName',
            'lastName',
            'username',
            'password',
            // 'authKey',
            // 'email:email',
            // 'admin',
            // 'telefone',
            // 'cpf',
            // 'rg',
            // 'dataNasc',
            // 'estado',
            // 'cidade',
            // 'bairro',
            // 'rua',
            // 'numero',
            // 'referencia',
            // 'nomeEmergencia',
            // 'telefoneEmergencia',
            // 'latitude',
            // 'longitude',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
