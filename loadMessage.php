<?php
$bdd = new PDO('mysql:host=localhost;dbname=erablichat;charset=utf8', 'root', '');
$recupMessage = $bdd->query('SELECT * FROM messages');
while($message = $recupMessage->fetch())
{
    ?>
    <br>
    <div class="msg">
        <h4><?= $message['pseudo']; ?></h4>
        <p><?= $message['msg']; ?></p>
    </div>
    <br>
    <?php
}
?>