<main>
        <h1>Iniciar Sesión</h1>
        <?php foreach($errores as $error):?>
            <div class="alerta error">
                <?php echo $error;?>
            </div>
        <?php endforeach;?>
        <form method="POST" action="/">
            <fieldset>
                <legend>Email y Password</legend>
                <label for="email">E-mail</label>
                <input id="email" type="email" placeholder="Tu email" name="email">
                <label for="password">Password</label>
                <input id="password" type="password" placeholder="Tu password" name="password">
            </fieldset>
            <input type="submit" value="Iniciar Sesión">
        </form>
</main>