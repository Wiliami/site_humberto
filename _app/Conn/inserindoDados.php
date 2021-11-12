<?php

//--------------------------------------------------------------------------------//
include ('_app/Config.inc.php');
//BANCO DE DADOS

//CADASTRAR
$DataCreate['user_name' ] = 'carlos';
$DataCreate['user_email'] = 'carlos123a@gmail.com';
$DataCreate['user_password'] = date('Y-m-d H:i:s');
$DataCreate['user_create_date'] = date('Y-m-d H:i:s');
$DataCreate['user_level'] = '9';
$Create = new Create();
$Create->ExeCreate('users', $DataCreate);

//LER
// $Read = new Read();
// $Read->FullRead("SELECT * FROM users WHERE user_id=31");
// Check::var_dump_json($Read->getResult());


// //ATUALIZAR
// $DataUpdate['user_name'] = 'abbaa';
// $DataUpdate['user_email'] = 'abba@gmail.com';
// $DataUpdate['user_update_date'] = date('Y-m-d H:i:s');
// $Update = new Update();


// $Id=31;
// $Update->ExeUpdate("users", $DataUpdate, "WHERE user_id = :id", "id={$Id}");
// Check::var_dump_json($Update->getResult());


//DELETE
// $Id = 2;
// $Delete = new Delete();
// $Delete->ExeDelete("users", "WHERE user_id = :id", "id={$Id}");