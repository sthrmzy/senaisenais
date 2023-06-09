<?php

function connect(){
    global $connect;
    $connect = mysqli_connect(
        "https:// lisadb-do-user-14164425-0.b.db.ondigitalocean.com",
        "doadmin",
        "AVNS_rN3CNWKZ1FkAYE1X6AD",
        "defaultdb") or die("Erro de conexão com o banco de dados";

        )
}