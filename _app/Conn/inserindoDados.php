<?php

//--------------------------------------------------------------------------------//
include ('_app/Config.inc.php');
//BANCO DE DADOS

//CADASTRAR
$DataCreate['user_admin' ] = 'Juca';
$DataCreate['user_email'] = 'juliano@gmail.com';
$DataCreate['user_password'] = date('Y-m-d H:i:s');
$Create = new Create();
$Create->ExeCreate('users_tipo', $DataCreate);

//LER
// $Read = new Read();
// $Read->FullRead("SELECT * FROM users_tipo WHERE 2=1");
// //Check::var_dump_json($Read->getResult());


// //ATUALIZAR
// $DataUpdate['user_admin'] = 'Carlos';
// $DataUpdate['user_email'] = 'Sampaio';
// $DataUpdate['user_update_date'] = date('Y-m-d H:i:s');
// $Update = new Update();


// $Id=2;
// $Update->ExeUpdate("users", $DataUpdate, "WHERE user_id = :id", "id={$Id}");
// Check::var_dump_json($Update->getResult());


//DELETE
// $Id = 2;
// $Delete = new Delete();
// $Delete->ExeDelete("users", "WHERE user_id = :id", "id={$Id}");