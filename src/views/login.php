<?php
    include "partials/header.php";
?>

    <div class="home login">
        <h1>Connexion</h1>
        <form action="login.php" method="POST">
            <div class="formGroup">
                <label for="email">E-mail :</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="formGroup">
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Se connecter</button>
        </form>
        <p>Pas encore de compte ? <a href="/register">Inscrivez-vous ici</a>.</p>
    </div>
    
<?php
    include "partials/footer.php";
?>