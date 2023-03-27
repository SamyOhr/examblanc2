<?php
// Connexion à la base de données
$BASE = new PDO('mysql:host=localhost;dbname=id20205701_samy', 'id20205701_samyouicher', '/&*hX18M$A}2#QGr');

// Requête pour récupérer les options de la première liste déroulante
$sql_menu1 = "SELECT * FROM menu1";
$stmt_menu1 = $BASE->query($sql_menu1);
$menu1_options = $stmt_menu1->fetchAll(PDO::FETCH_ASSOC);

// Vérification si la première liste déroulante a été sélectionnée
if (isset($_POST['menu1'])) {
    // Requête pour récupérer les options de la seconde liste déroulante en fonction de la sélection de la première liste
    $menu1_id = $_POST['menu1'];
    $sql_menu2 = "SELECT * FROM menu2 WHERE menu1_id = $menu1_id";
    $stmt_menu2 = $BASE->query($sql_menu2);
    $menu2_options = $stmt_menu2->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!-- Formulaire avec les menus déroulants -->
<form method="POST">
    <label for="menu1">Menu 1:</label>
    <select id="menu1" name="menu1">
        <?php foreach ($menu1_options as $option) { ?>
            <option value="<?php echo $option['id']; ?>"><?php echo $option['label']; ?></option>
        <?php } ?>
    </select>

    <?php if (isset($_POST['menu1'])) { ?>
        <label for="menu2">Menu 2:</label>
        <select id="menu2" name="menu2">
            <?php foreach ($menu2_options as $option) { ?>
                <option value="<?php echo $option['id']; ?>"><?php echo $option['label']; ?></option>
            <?php } ?>
        </select>
    <?php } ?>

    <input type="submit" value="Valider">
</form>
