<?php
include_once 'db.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    echo $username;
    echo $password;
    $query = "select * from login where username = '$username' and password='$password'";
    $result = mysqli_query($connection, $query);

    $userdetails = mysqli_fetch_assoc($result);

    if($userdetails['username']=='manager')
    {
        header('Location: index.php?room_mang');
    }
    else{

        header('Location: login.php');
    }


}

if (isset($_POST['submit'])) {

    $emp_id = $_POST['emp_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $staff_type_id = $_POST['staff_type_id'];
    $shift_id= $_POST['shift_id'];
    $id_card_type = $_POST['id_card_type'];
    $id_card_no = $_POST['id_card_no'];
    $address = $_POST['address'];
    $contact_no = $_POST['contact_no'];
    $joining_date = strtotime($_POST['joining_date']);

    $salary = $_POST['salary'];

    $query="UPDATE staff
SET emp_name='$first_name $last_name', staff_type_id='$staff_type_id', shift_id='$shift_id', id_card_type=$id_card_type,
id_card_no='$id_card_no',address='$address',contact_no='$contact_no',joining_date='$joining_date',salary='$salary'
WHERE emp_id=$emp_id ";
//echo $query;
    if (mysqli_query($connection, $query)) {
        header('Location: index.php?staff_mang');
    } else {
        echo "Error updating record: " . mysqli_error($connection);
    }


}
// Vérifier si l'ID de l'employé est fourni dans l'URL
if (isset($_GET['emp_id'])) {
    // Récupérer l'ID de l'employé depuis l'URL
    $emp_id = $_GET['emp_id'];
    
    // Connexion à la base de données
    $connection = mysqli_connect('localhost', 'root', '', 'hotelms');
    
    // Vérifier si la connexion a réussi
    if (!$conn) {
      die("Erreur de connexion à la base de données : " . mysqli_connect_error());
    }
    
    // Préparer la requête SQL de suppression
    $sql = "DELETE FROM staff WHERE emp_id = " . $emp_id;
    
    // Exécuter la requête SQL
    if (mysqli_query($connection, $sql)) {
      // Rediriger l'utilisateur vers la page de liste du personnel
      header("Location: liste_staff.php");
    } else {
      echo "Erreur lors de la suppression de l'employé : " . mysqli_error($conn);
    }
    
    // Fermer la connexion à la base de données
    mysqli_close($connection);
  }
  



/*if (isset($_GET['emp_id']) && $_GET['emp_id'] != "") {
    
    $emp_id = $_GET['emp_id'];
    $deleteQuery = "DELETE FROM staff WHERE emp_id=$emp_id";
    $stmt = mysqli_prepare($connection, $deleteQuery);
    mysqli_stmt_bind_param($stmt, "i", $emp_id);
    if (mysqli_stmt_execute($stmt)) {
        header('Location: index.php?staff_mang');
} else {
    echo "Error updating record: " . mysqli_error($connection);
}
mysqli_stmt_close($stmt);


    /*$deleteQuery = "DELETE FROM staff WHERE emp_id=$emp_id";
    if (mysqli_query($connection, $deleteQuery)) {
        header('Location: index.php?staff_mang');
    } else {
        echo "Error updating record: " . mysqli_error($connection);
    }*/

?>