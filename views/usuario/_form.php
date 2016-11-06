<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */

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
?>

<div class="usuario-form col-md-6">

    <?php $form = ActiveForm::begin(); ?>

    <?php IF($model->isNewRecord):?>
        <?= $form->field($model, 'firstName')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'lastName')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
    <?php ELSE:?>


    <?php ENDIF;?>

    <?= $form->field($model, 'firstName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= ""//$form->field($model, 'authKey')->textInput(['maxlength' => true])   ?>

    <div class="form-group form-inline hidden">
        <?= $form->field($model, 'latitude')->textInput(['maxlength' => true, 'readonly' => true, 'class' => 'form-control']) ?>

        <?= $form->field($model, 'longitude')->textInput(['maxlength' => true, 'readonly' => true, 'class' => 'form-control']) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Salvar' : 'Salvar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

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
        clearMarkers();
        var marker = new google.maps.Marker({
            position: location,
            map: map
        });
        $("#usuario-latitude").val(location.lat());
        $("#usuario-longitude").val(location.lng());
        markers.push(marker);
    }

    // Sets the map on all markers in the array.
    function setMapOnAll(map) {
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(map);
        }
    }

    // Removes the markers from the map, but keeps them in the array.
    function clearMarkers() {
        setMapOnAll(null);
    }

    // Shows any markers currently in the array.
    function showMarkers() {
        setMapOnAll(map);
    }

    // Deletes all markers in the array by removing references to them.
    function deleteMarkers() {
        clearMarkers();
        markers = [];
    }

</script>


