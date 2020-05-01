<?php
    include "./init.php";

    if(session_status() == PHP_SESSION_NONE)
        session_start();

    if($userData->password == "")
    {
        $_SESSION["user"] = $userData->name;
    }

    if(isset($_SESSION["user"]))
    {
        header("Location: watch.php");
    }

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        if(password_verify($_POST["pass"],$data->password))
        {
            $_SESSION["user"] = $data->name;
            header("Location: watch.php");
        } 
        else {
            $_SESSION["error"] = "Yanlış şife girdiniz";
            header("Location: login.php");
        }
    }
    include "./header.php";
?>
<body class="bg-gray-100">
    <div class="mt-20 max-w-xs mx-auto bg-white shadow py-8 rounded">
        <form class="w-auto" method="POST">
            <input class="block mx-auto p-2 mt-10 shadow rounded" type="password" name="pass" id="password" autocomplete="off" placeholder="şifre lütfen">
            <?php if(isset($_SESSION["error"])) { ?>
            <div class="text-red-600 text-center p-4 mx-auto"><?= $_SESSION["error"] ?></div>
            <?php } ?>
            <button class="block mx-auto py-2 my-10 rounded bg-green-500 text-white font-bold px-5 tracking-wide" type="submit">Giriş</button>
        </form>
    </div>
</body>
</html>