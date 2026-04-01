<?php
include 'db.php';

// =====================
// AJOUTER UTILISATEUR
// =====================
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
    $conn->exec($sql);
}

// =====================
// SUPPRIMER UTILISATEUR
// =====================
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $sql = "DELETE FROM users WHERE id=$id";
    $conn->exec($sql);
}

// =====================
// LISTER UTILISATEURS
// =====================
$users = $conn->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mini CRUD</title>
</head>
<body>

<h1>👤 Gestion des utilisateurs</h1>

<!-- FORMULAIRE AJOUT -->
<h2>Ajouter utilisateur</h2>
<form method="POST">
    Nom : <input type="text" name="name" required><br><br>
    Email : <input type="email" name="email" required><br><br>
    <button type="submit" name="add">Ajouter</button>
</form>

<hr>

<!-- LISTE -->
<h2>Liste des utilisateurs</h2>

<table border="1">
<tr>
    <th>ID</th>
    <th>Nom</th>
    <th>Email</th>
    <th>Action</th>
</tr>

<?php foreach ($users as $user): ?>
<tr>
    <td><?= $user['id'] ?></td>
    <td><?= $user['name'] ?></td>
    <td><?= $user['email'] ?></td>
    <td>
        <a href="?delete=<?= $user['id'] ?>">Supprimer</a>
    </td>
</tr>
<?php endforeach; ?>

</table>

</body>
</html>