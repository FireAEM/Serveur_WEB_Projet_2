<?php
    include "partials/header.php";
?>
    
    <div class="home register">
        <h1>Inscription</h1>
        <form action="register.php" method="POST">
            <div class="formGroup">
                <label for="first_name">Prénom :</label>
                <input type="text" id="first_name" name="first_name" required>
            </div>
            <div class="formGroup">
                <label for="last_name">Nom :</label>
                <input type="text" id="last_name" name="last_name" required>
            </div>
            <div class="formGroup">
                <label for="email">E-mail :</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="formGroup">
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">S'inscrire</button>
        </form>
        <p>Déjà un compte ? <a href="/login">Connectez-vous ici</a>.</p>
    </div>
    
<?php
    include "partials/footer.php";
?>