<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

    if(isset($_POST['parking']) && !empty($_POST['parking'])) {
        $temp = [];

        foreach($hotels as $hotel) {
            $park = $hotel['parking'] ? 'si' : 'no';
            if($park == $_POST['parking']) {
                $temp[] = $hotel; 
            }
        }
        $hotels = $temp;
    }
    if(isset($_POST['vote']) && !empty($_POST['vote'])) {
        $vote = $_POST['vote'];
        $hotels = array_filter($hotels, fn($value) => $value['vote'] >= $vote);
    }   
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hotel</title>
        <link rel="stylesheet" href="./css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>

    <body>
        <div class="container">
            <h1 class="text-center mt-5 display-1 fw-bold">Hotel</h1>
            <h5 class="text-center mt-3 mb-5">Trova il tuo hotel</h5>
            <div class="my-5 d-flex justify-content-center">
                <form action="index.php" method="POST">
                    <div class="d-flex">
                        <div class="me-5">
                            <label for="parking">Vuoi il parcheggio?</label>
                            <select name="parking" class="form-select" id="parking">
                                <option value="">Scegli</option>
                                <option value="si">Con parcheggio</option>
                                <option value="no">No parcheggio</option>
                            </select>
                        </div>
                        <div>
                            <label for="vote">Seleziona un voto da 1 a 5</label>
                            <select name="vote" class="form-select" id="vote">
                                <option value="">Scegli</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4 w-100">Invia</button>
                </form>
            </div>
            <div class='d-flex flex-wrap justify-content-between'>
                <h3 class="mt-4">Hotel Disponibili</h3>
                <table class='table text-capitalize'>
                    <thead>
                        <tr>
                            <th class='col'>name</th>
                            <th class='col'>description</th>
                            <th class='col'>parking</th>
                            <th class='col'>vote</th>
                            <th class='col'>distance of center</th>
                        </tr>
                    </thead>
                    <?php foreach($hotels as $hotel) { 
                        $park=$hotel['parking']? 'si':'no';
                    ?>
                    <tr>
                        <td><?php echo $hotel['name']; ?></td>
                        <td><?php echo $hotel['description']; ?></td>
                        <td><?php echo $park; ?></td>
                        <td><?php echo $hotel['vote']; ?></td>
                        <td><?php echo $hotel['distance_to_center']; ?></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </body>
</html>