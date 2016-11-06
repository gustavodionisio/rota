 <?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioBusca */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Passageiros da rota';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= $admin?Html::a('Cadastrar Usuário', ['create'] , ['class' => 'btn btn-success']):'' ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'id',
                'contentOptions' => ['style' => 'width:100px;'],

            ],
            'firstName',
            'lastName',
//            'username',
//            'password',
//             'authKey',
//             'email:email',
//             'latitude',
//             'longitude',
//             'admin',

            [
                'class' => 'yii\grid\ActionColumn','template' => $admin?'{view} {update} {delete}':'{view}',
                'contentOptions' => ['style' => 'width:100px;'],
            ],
        ],
    ]); ?>
</div>
