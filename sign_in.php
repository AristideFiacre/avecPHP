<style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-image:url('img/n.jpg')
            margin: 0;
        }
        h2 {
            margin-top: 20px;
        }
        form {
            width: 500px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f2f2f2;
            border-radius: 5px;
            box-shadow: 0px 0px 5px #ccc;
        }
        label {
            display: inline-block;
            width: 100px;
            margin-bottom: 10px;
            font-weight: bold;
        }
        input[type=text], input[type=email], input[type=password] {
            width: 300px;
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            border-radius: 5px;
            box-shadow: 0px 0px 5px #ccc;
        }
        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #3e8e41;
        }
    </style>

    <body>
<h1>Creation d'un utilisateur</h1>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="name">Nom :</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="username">Nom d'utilisateur :</label>
    <input type="text" id="username" name="username" required><br><br>

    <label for="email">Email :</label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required><br><br>

    <input type="submit" value="Créer l'utilisateur">
</form>

</body>
</html>



<?php


// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Se connecter à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hotelms";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("La connexion a échoué : " . $conn->connect_error);
    }

    // Préparer la requête d'insertion
    $stmt = $conn->prepare("INSERT INTO user (name, username, email, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $username, $email, $password);

    // Définir les valeurs pour les paramètres
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Exécuter la requête d'insertion
    if ($stmt->execute()) {
        echo '<div class="alert alert-success" role="alert">L\'utilisateur a été créé avec succès !</div>';
    } else {
        echo "Une erreur est survenue lors de la création de l'utilisateur : " . $stmt->error;
    }

    // Fermer la requête et la connexion
    $stmt->close();
    $conn->close();
    // affiche ce message si 'utilisateur a été crée avec succès

   

session_start();
unset($_SESSION['user_id']);
unset($_SESSION['username']);
session_abort();
header('Location:login.php');
}


?>



