<?php
$bdd = new PDO('mysql:host=localhost;dbname=erablichat;charset=utf8', 'root', '');
if(isset($_POST["valider"])){
    if(!empty($_POST['pseudo']) AND !empty($_POST["msg"])){
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $msg = nl2br(htmlspecialchars($_POST["msg"]));

        $insererMessage = $bdd->prepare('INSERT INTO  messages(pseudo, msg) VALUES(?, ?)');
        $insererMessage->execute(array($pseudo, $msg));
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Érabli Chat</title>
        <meta charset="UTF-8">
        <link rel="icon" type="image/x-icon" href="erablelogo2.png">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" href="style.css">
    </head>
    <body id="body">
        <div class="warn">
            <h2>⚠️ ATTENTION ! ⚠️</h2>
            <h4>Ce site internet n'est pas modéré si vous l'utilisez c'est que vous savez que n'importe qui peut prendre l'identité de quelqu'un et peut envoyez toutes sortes de messages et que vous êtes d'accord avec cela.</h6>
        </div>
        <br>
        <br>
        <form method="post" action="" align="center" id="form">
            <input type="text" name="pseudo" placeholder="Nom" class="ibox">
            <br><br>
            <textarea name="msg" placeholder="Message" class="ibox"></textarea>
            <br>
            <br>
            <input type="submit" name="valider" placeholder="Envoyez" class="valider">
        </form>
        <br>
        <section id="messages">
        </section>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <footer id="footer"><br><a href="#form" class="backbutton">Retourner en haut !</a><br><p>Créé par : Gaël Hébert-Furoy</p></footer>
        <script>
            setInterval('load_message()', 500);
            function load_message(){
                $('#messages').load('loadMessage.php');
            }

            //Prevent ressumbiting on refresh
            $(document).ready(function(){
            window.history.replaceState("","",window.location.href)
            });
        </script>
    </body>
</html>