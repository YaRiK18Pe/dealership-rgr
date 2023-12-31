<!DOCTYPE html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Оберіть категорію</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="css/style1.css" media="screen" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand p-0" href="index.php">Головна сторінка</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link order-1" aria-current="page" href="all.php">Автосалон</a>
                    <a class="nav-link order-2" href="car.php">Машини</a>
                    <a class="nav-link order-3" href="customers.php">Покупці</a>
                    <a class="nav-link order-4" href="employees.php">Працівники</a>
                    <a class="nav-link order-5" href="order.php">Замовлення</a>
                    <!--<a class="nav-link disabled" aria-disabled="true">Disabled</a>-->
                </div>
            </div>
        </div>
    </nav>

    <!-- Bootstrap JS (optional) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
        }
        h1 {
            margin: 30px;
            font-size: 30px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Add text shadow for the outline effect */
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .item {
            width: 40%;
            margin-bottom: 20px;
        }

        .item img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            margin: 10px;
            cursor: pointer;
            border-radius: 10px;
        }
    </style>

</head>
<body>
    <h1>Оберіть категорію</h1>
    <div class="container">
        <div class="item">
            <img class="rounded-img" src="a1.jpg" alt="Картинку не завантажено"/>
            <button onclick="location.href='car.php'">Автомобілі</button>
        </div>
        <div class="item">
            <img class="rounded-img" src="c1.jpg" alt="Картинку не завантажено"/>
            <button onclick="location.href='customers.php'">Покупці</button>
        </div>
        <div class="item">
            <img class="rounded-img" src="e1.jpg" alt="Картинку не завантажено"/>
            <button onclick="location.href='employees.php'">Працівники</button>
        </div>
        <div class="item">
            <img class="rounded-img" src="o1.jpg" alt="Картинку не завантажено"/>
            <button onclick="location.href='order.php'">Замовлення</button>
        </div>
    </div>
</body>
</html>
    <div id="map-container"></div>

    <script>
        // Initialize and add the map
        function initMap() {
            var centerCoords = { lat: 48.8566, lng: 2.3522 }; // Change these coordinates

            var map = new google.maps.Map(document.getElementById('map-container'), {
                center: centerCoords,
                zoom: 10
            });

            var marker = new google.maps.Marker({
                map: map,
                position: centerCoords,
                title: 'Hello World!'
            });
        }
    </script>

    <!-- Include the Google Maps JavaScript API with your API key -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>

    <!-- Bootstrap JS (optional) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
