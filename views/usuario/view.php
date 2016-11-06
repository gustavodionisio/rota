<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */

$lat = "-23.29523984281819";
$long = "-50.07851600646973";
$mod = 0;

if (!$model->isNewRecord && isset($model->latitude, $model->longitude) && $model->latitude && $model->longitude) {
    if ($model->latitude !== $lat && $model->longitude !== $long) {
        $lat = $model->latitude;
        $long = $model->longitude;
        $mod = 1;
    }
}

$this->title = $model->firstName;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-view col-md-6">

    <h1><?= Html::encode($this->title) ?></h1>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'firstName',
            'lastName',
            'username',
//            'password',
//            'authKey',
            'email',
            'latitude',
            'longitude',
            'admin',
        ],
    ]) ?>

    <p>
        <?= Html::a('Editar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Desativar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Você tem certeza que quer deletar esse usuário?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>

<div class="col-md-6">
    <h2>Localização</h2>
    <div id="map"></div>
</div>

<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAnaXRONTKZj07Pu8QukB8DLAE2mEiLsJY&callback=initMap"
        async defer></script>
<script>

    // In the following example, markers appear when the user clicks on the map.
    // The markers are stored in an array.
    // The user can then click an option to hide, show or delete the markers.
    var map;
    var markers = [];

    function initMap() {
        var lat = <?=$lat?>;
        var long = <?=$long?>;
//        alert(lat + " --- " + long);
        var myCenter = new google.maps.LatLng(lat, long);

        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: myCenter
        });

        // This event listener will call addMarker() when the map is clicked.
        map.addListener('click', function (event) {
            clearMarkers();
            addMarker(event.latLng);
        });
        if(<?=$mod?> == 1){
            addMarker(myCenter);
        }

        // Adds a marker at the center of the map.
//        addMarker(myCenter);
    }

    // Adds a marker to the map and push to the array.
    function addMarker(location) {
        var marker = new google.maps.Marker({
            position: location,
            map: map
        });
    }

</script>