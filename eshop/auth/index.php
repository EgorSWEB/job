<form action="../system/controllers/users/auth.php" method="GET">
    <div>
        <input required type="text" name="login" placeholder="Логин или E-mail">
    </div>
    <div>
        <input required type="password" name="password" placeholder="Пароль">
    </div>
    <div>
        <? if(isset($_GET['wrong'])){ ?>
            <div style="color:red;">
                Неверный логин или пароль
            </div>
        <?}?>
        <button>Войти</button>
    </div>
    <div>
        или <a href="reg/index.php">зарегестрироваться</a>
    </div>
</form>