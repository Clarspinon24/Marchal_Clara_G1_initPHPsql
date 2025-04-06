<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Météo</title>
</head>
<body>
    <h1>Météo Actuelle</h1>

    <form method="GET">
        <label for="ville">Entrez une ville :</label>
        <input type="text" id="ville" name="ville">
        <button type="submit">Afficher la météo</button>
    </form>

    <?php
    require 'vendor/autoload.php';

    use GuzzleHttp\Client;
    use GuzzleHttp\Exception\GuzzleException; // Correction de la typo

    $apiKey = '8a359ec4b24202c9436f452581df9840'; // Remplacez par votre clé API OpenWeatherMap
    $ville = $_GET['ville'] ?? 'Paris'; // Récupère la ville depuis le formulaire ou utilise 'Paris' par défaut

    function getMeteo($ville, $apikey) {
        $client = new Client();
        try {
            $response = $client->request('GET', 'https://api.openweathermap.org/data/2.5/weather', [
                'query' => [
                    'q' => $ville, // Utilisation de la variable $ville
                    'appid' => $apikey,
                    'units' => 'metric',
                    'lang' => 'fr',
                ],
                'verify' => 'C:\laragon\bin\php\php-8.3.16-Win32-vs16-x64\cacert-2025-02-25.pem'
            ]);
            return json_decode($response->getBody(), true);
        } catch (GuzzleException $e) { // Correction de la typo et utilisation de GuzzleException
            return ['error' => $e->getMessage()];
        }
    }

    function afficheMeteo($ville, $data) {
        echo "<div class='resultat'>";
        if (isset($data['error'])) {
            echo "<p><strong>Erreur :</strong> " . htmlspecialchars($data['error']) . "</p>";
        } elseif (isset($data['main']['temp'], $data['weather'][0]['description'])) {
            echo "<h2>Météo à " . htmlspecialchars($ville) . "</h2>";
            echo "<p>" . $data['main']['temp'] . "°C</p>"; // Ajout de la balise <p>
            echo "<p>" . ucfirst($data['weather'][0]['description']) . "</p>"; // Correction de la typo 'wearther'
        } else {
            echo "<p>Données météo non disponibles.</p>";
        }
        echo "</div>";
    }

    $meteoData = getMeteo($ville, $apiKey);
    afficheMeteo($ville, $meteoData);
    ?>

</body>
</html>
