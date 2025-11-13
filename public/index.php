<?php

include "../src/config.php";

/**
 * Aquest fitxer és un exemple de Front Controller, pel qual passen totes les requests.
 */

include "../src/Emeset/Container.php";
include "../src/Emeset/Request.php";
include "../src/Emeset/Response.php";

include "../src/models/Db.php";
include "../src/models/Users.php";
include "../src/models/Gymkhana.php";
include "../src/models/Comms.php";
include "../src/models/ODS.php";
include "../src/models/Quests.php";
include "../src/Container.php";

/**
 * Carreguem les classes del Framework Emeset
*/


include "../src/controllers/ctrlIndex.php";
include "../src/controllers/ctrlLogin.php";
include "../src/controllers/ctrlDoLogin.php";
include "../src/controllers/ctrlRegister.php";
include "../src/controllers/ctrlDoRegister.php";
include "../src/controllers/ctrlDoLogOut.php";
include "../src/controllers/ctrlGymkhana.php";
include "../src/controllers/ctrlCreateGymkhana.php";
include "../src/controllers/ctrlViewGymkhana.php";
// include "../src/controllers/ctrlViewQuests.php";
include "../src/controllers/ctrlUserProfile.php";
include "../src/controllers/ctrlExplorateGymkhana.php";
include "../src/controllers/ctrlValidarComms.php";
include "../src/controllers/ctrlAddComms.php";
include "../src/controllers/ctrlComms.php";
include "../src/controllers/ctrlOdsGet.php";
include "../src/controllers/ctrlOdsIndex.php";
include "../src/controllers/ctrlOdsList.php";
include "../src/controllers/ctrlOdsSave.php";
include "../src/controllers/ctrlQuill.php";
include "../src/controllers/ctrlOdsEdit.php";
include "../src/controllers/ctrlOdsUpdates.php";
include "../src/controllers/ctrlSearch.php";
include "../src/controllers/ctrlSettings.php";
include "../src/controllers/ctrlDoSettings.php";
include "../src/controllers/ctrlSaveSettings.php";
include "../src/controllers/ctrlAdminUser.php";
include "../src/controllers/ctrlUserGet.php";
include "../src/controllers/ctrlUserUpdate.php";
include "../src/controllers/ctrlUserDelete.php";
include "../src/controllers/ctrlUserAdd.php";

include "../src/middleware/login.php";

$container = new \Container($config);
$request = $container->request();
$response = $container->response();

 /* 
  * Aquesta és la part que fa que funcioni el Front Controller.
  * Si no hi ha cap paràmetre, carreguem la pàgina d'inici.
  * Si hi ha paràmetre, carreguem la pàgina que correspongui.
  * Si no existeix la pàgina, carreguem la pàgina d'error.
  */
 $r = '';
 if(isset($_REQUEST["r"])){
    $r = $_REQUEST["r"];
 }
 
 /* Front Controller, aquí es decideix quina acció s'executa */
if($r === "") {
  $response = ctrlSearch($request, $response, $container);
}
elseif($r === "index") {
  $response = ctrlIndex($request, $response, $container);
}
elseif($r === "login") {
  $response = ctrlLogin($request, $response, $container);
}
elseif($r === "doLogin") {
  $response = ctrlDoLogin($request, $response, $container);
}
elseif($r === "register") {
  $response = ctrlRegister($request, $response, $container);
}
elseif($r === "doRegister") {
  $response = ctrlDoRegister($request, $response, $container);
}
elseif($r === "createGymkhana") {
  // $response = login($request, $response, $container, "ctrlGymkhana");
  $response = ctrlGymkhana($request, $response, $container);
}
elseif($r === "saveGymkhana") {
  // $response = login($request, $response, $container, "ctrlCreateGymkhana");
  $response = ctrlCreateGymkhana($request, $response, $container);
}
elseif($r === "viewGymkhana") {
  // $response = login($request, $response, $container, "ctrlCreateGymkhana");
  $response = ctrlViewGymkhana($request, $response, $container);
}
elseif($r === "ExplorateGymkhana") {
  $response = ctrlExplorateGymkhana($request, $response, $container);
}
elseif($r === "userProfile") {
  $response = login($request, $response, $container, "ctrlUserProfile");
}
elseif($r === "comms") {
  $response = ctrlComms($request, $response, $container);
}
elseif($r === "quill") {
  $response = ctrlQuill($request, $response, $container);
}
elseif($r === "ODS") {
  $response = ctrlOdsIndex($request, $response, $container);
}
elseif($r === "editOds") {
    $response = ctrlOdsEdit($request, $response, $container);
}
elseif($r === "OdsUpdate") {
    $response = ctrlOdsUpdate($request, $response, $container);
}
elseif($r === "logOut") {
    $response = ctrlDoLogOut($request, $response, $container);
}
elseif($r === "search") {
    $response = ctrlSearch($request, $response, $container);
}
elseif($r === "settings") {
    $response = ctrlSettings($request, $response, $container);
}
elseif($r === "doSettings") {
    $response = ctrlDoSettings($request, $response, $container);
}
elseif($r === "saveSettings") {
    $response = ctrlSaveSettings($request, $response, $container);
}
elseif($r === "adminUser") {
    $response = login($request, $response, $container, "ctrlUserGet");
}
elseif($r === "UserUpdate") {
    $response = ctrlUserUpdate($request, $response, $container);
}
elseif($r === "UserDelete"){
    $response = ctrlUserDelete($request,$response, $container);
}
elseif($r === "UserAdd"){
    $response = ctrlUserAdd($request,$response, $container);
}
else {
  echo "No existeix la ruta";
}

$response->response();
/* Enviem la resposta al client només si existeix una resposta vàlida */
// if ($response instanceof \Emeset\Response && $response->template !== null) {
// } else {
//     echo "❌ No existeix la ruta o la plantilla no està definida.";
// }
