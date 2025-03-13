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

$isParking = isset($_GET["checked"]) && $_GET["checked"] == "on" ? true : false;
$minVote = isset($_GET["minVote"]) && is_numeric($_GET["minVote"]) ? $_GET["minVote"] : 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>PHP Hotel</title>
</head>

<body class="p-3">



    <h1 class="text-center">PHP Hotel</h1>

    <h2 class="text-center">Filtra i tuoi Hotels</h2>

    <form action="" method="GET" class="p-4 border rounded shadow-sm mb-2">

        <!-- Parking Checkbox -->
        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" id="parking" name="checked">
            <label class="form-check-label" for="parking">Solo Hotel con parcheggio</label>
        </div>

        <!-- Minimum Vote -->
        <div class="mb-3">
            <label for="minVote" class="form-label">Voto minimo</label>
            <input style="width: 75px;" type="number" id="minVote" name="minVote" min="1" class="form-control">
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit" class="btn btn-primary">Filtra</button>
        </div>
    </form>

    <table class="table">
        <thead>
            <tr>
                <?php

                foreach ($hotels[0] as $key => $value) {
                    echo "<th scope='col'>$key</th>";
                }

                ?>
            </tr>
        </thead>
        <tbody>
            <?php

            if ((!$isParking && !$minVote)) {

                foreach ($hotels as $hotel) {

                    echo "<tr>
                <th scope='row'>" . $hotel["name"] . "</th>
                <td>" . $hotel["description"] . "</td>
                <td>" . ($hotel["parking"] ? "Sì" : "No") . "</td>
                <td>" . $hotel["vote"] . "</td>
                <td>" . $hotel["distance_to_center"] . " KM" . "</td>
                
                     </tr>";
                }
            } else {
                foreach ($hotels as $hotel) {

                    if ($hotel["parking"] && $hotel["vote"] >= $minVote) {
                        echo "<tr>
                <th scope='row'>" . $hotel["name"] . "</th>
                <td>" . $hotel["description"] . "</td>
                <td>" . ($hotel["parking"] ? "Sì" : "No") . "</td>
                <td>" . $hotel["vote"] . "</td>
                <td>" . $hotel["distance_to_center"] . " KM" . "</td>
                
                     </tr>";
                    } else if (!$isParking && $hotel["vote"] >= $minVote) {
                        echo "<tr>
                <th scope='row'>" . $hotel["name"] . "</th>
                <td>" . $hotel["description"] . "</td>
                <td>" . ($hotel["parking"] ? "Sì" : "No") . "</td>
                <td>" . $hotel["vote"] . "</td>
                <td>" . $hotel["distance_to_center"] . " KM" . "</td>
                
                     </tr>";
                    }
                }
            }
            ?>
        </tbody>
    </table>



</body>

</html>