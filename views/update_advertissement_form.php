<?php
session_start();

require_once '../controllers/AdvertisementController.php';
require_once '../config/config.php';

try {
    $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $advertisementController = new AdvertisementController($db);

    // Vérifiez si 'user_id' est défini dans $_GET
    if (isset($_GET['id_advertisement'])) {
        $id_advertisement = $_GET['id_advertisement'];
        $advertissementDetail = $advertisementController->getAdvertisement($id_advertisement);

        if (!$advertissementDetail) {
            echo "Aucun utilisateur trouvé pour l'ID spécifié.";
            exit();
        }
    } else {
        header("Location: index.php");
        exit();
    }
} catch (PDOException $e) {
    echo 'Database connection error: ' . $e->getMessage();
}
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Update</title>
    </head>

    <body>
        <h2>Update Advertissment</h2>

        <form action="../script/update_advertissement.php" method="POST" id="update-form">
                <input type="hidden" id="id_advertisement" name="id_advertisement" value="<?php echo $_GET['id_advertisement']; ?>" readonly>
    <input type="hidden" name="id_advertisement" value="<?php echo $_GET['id_advertisement']; ?>" readonly><br>

<label for="title">Title :</label>
<input type="text" id="title" name="title" value="<?= $advertissementDetail['title'] ?>"><br>

<label for="address">Address :</label>
<input type="text" id="address" name="address" value="<?= $advertissementDetail['address'] ?>"><br>

<label for="email">Zip :</label>
<input type="text" id="zip_code" name="zip_code" value="<?= $advertissementDetail['zip_code'] ?>"><br>

<label for="country">Country :</label>
<input type="text" id="country" name="country" value="<?= $advertissementDetail['country'] ?>"><br>

<label for="city">City :</label>
<input type="text" id="city" name="city" value="<?= $advertissementDetail['city'] ?>"><br>

<label for="desc">Description :</label>
<input type="text" id="desc" name="desc" value="<?= $advertissementDetail['desc'] ?>"><br>

<label for="salary">Salary :</label>
<input type="text" id="salary" name="salary" value="<?= $advertissementDetail['salary'] ?>"><br>

<label for="date">date :</label>
<input type="text" id="date" name="date" value="<?= $advertissementDetail['date'] ?>"><br>

<label for="phone">Phone :</label>
<input type="text" id="phone" name="phone" value="<?= $advertissementDetail['phone'] ?>"><br>

<label for="salary">Salary :</label>
<input type="text" id="salary" name="salary" value="<?= $advertissementDetail['salary'] ?>"><br>

<label for="contact">Contact :</label>
<input type="text" id="contact" name="contact" value="<?= $advertissementDetail['contact'] ?>"><br>

<label for="company_id">company id :</label>
<input type="text" id="company_id" name="company_id" value="<?= $advertissementDetail['company_id'] ?>"><br>


<input type="submit" value="Update" onclick="updateAdvertisement(event)">
</form>


<script>
    function updateAdvertisement(event) {
        event.preventDefault(); // Empêche la soumission du formulaire par défaut

        const id_advertisement = document.getElementById('id_advertisement').value;
        const title = document.getElementById('title').value;
        const address = document.getElementById('address').value;
        const zip_code = document.getElementById('zip_code').value;
        const country = document.getElementById('country').value;
        const city = document.getElementById('city').value;
        const desc = document.getElementById('desc').value;
        const salary = document.getElementById('salary').value;
        const date = document.getElementById('date').value;
        const phone = document.getElementById('phone').value;
        const contact = document.getElementById('contact').value;
        const company_id = document.getElementById('company_id').value;; // Remplacez par l'ID de votre entreprise

        const data = {
            id_advertisement,
            title,
            address,
            zip_code,
            country,
            city,
            desc,
            salary,
            date,
            phone,
            contact,
            company_id
        };

        // Effectuez la requête PUT
        fetch('../script/update_advertissement.php', {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Échec de la requête');
            }
            return response.json();
        })
        .then(data => {
            console.log(data);
            window.location.href = "./admin_dashboard.php";
     })
        .catch(error => {
            console.error('Erreur : ', error);
        });
    }
    
</script>



    </body>
</html>