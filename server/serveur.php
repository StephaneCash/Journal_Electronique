<?php
$host = "127.0.0.1";
$port = 20205;
set_time_limit(0);

$sock = socket_create(AF_INET, SOCK_STREAM, 0) or die("impossible de créer le socket\n");
$result = socket_bind($sock, $host, $port) or die("impossible de lier le socket\n");

$result = socket_listen($sock, 3) or die("impossible de configurer l'écouteur de socket\n");
echo "Liste de connexions";

class chat
{
    function readLine()
    {
        return rtrim(fgets(STDIN));
    }
}

do {
    $accept = socket_accept($sock) or die("n'a pas pu accepter la connexion entrante\n");
    $msg = socket_read($accept, 1024) or die("Impossible de lire l'input");

    $msg = trim($msg);
    echo "Cleint dit : \t" . $msg . "\n\n";

    $line = new chat();
    echo "Message retour : \t";
    $reply = $line->readLine();

    socket_write($accept, $reply, strlen($reply)) or die("Impossible d'écrire");
} while (true);

socket_close($accept, $sock);
