<?php
if ($_GET['operation'] === 'licht2') {
    $response =  array('response' => !(bool)$_GET['switch']);
    exit;
} ?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body style="background-color: #333333">

<div class="container mt-5">
    <h4 class="text-white"><b>Energiemanagement</b></h4>
</div>

<div class="container mt-1 border">
    <p class="text-white">Nordflügel</p>
    <span id="lightKitchen" data-state="1" class="col-3 btn btn-warning mb-2">Küche</span>
    <span id="lightLroom" data-state="1" class="col-3 btn btn-warning mb-2">Wohnen</span>
</div>
<div class="container mt-1 border">
    <p class="text-white">Südflügel</p>
    
    <span id="testBtn2" data-state="1" class="col-3 btn btn-warning mb-2">Büro</span>
</div>
<div class="container mt-1 border">
    <p class="text-white">Sonstige</p>
    <span id="testBtn1" data-state="1" class="col-3 btn btn-warning mb-2">Terasse</span>
    <span id="testBtn2" data-state="1" class="col-3 btn btn-warning mb-2">Lüftung</span>
</div>




<!--    jQuery      -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
<!--    Bootstrap   -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous">
</script>
<script>
    $(function () {
        $('#testBtn2').click(function(event) {
            const state = Boolean($('#testBtn2').data('state'));
            console.debug(state);
            $.ajax({
                url:'index.php',
                method: 'get',
                data: {
                    'operation' : 'licht2',
                    'switch' : state
                },
                success: (response) => {
                    response = JSON.parse(response);
                    console.debug(response.response);
                    $('#testBtn2').data('state', Number (response.response));
                    $('#testBtn2').toggleClass('btn-warning btn-secondary');

                }
            });
        })
    })
</script>
</body>
</html>
