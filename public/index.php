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
include "../src/models/Answer.php";
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
include "../src/controllers/ctrlViewQuest.php";
include "../src/controllers/ctrlSendAnswer.php";
include "../src/controllers/ctrlSubscribeGymkhana.php";
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
include "../src/controllers/ctrlAdminComms.php";
include "../src/controllers/ctrlPublishComm.php";
include "../src/controllers/ctrlDeleteComm.php";
include "../src/controllers/ctrlCarbon.php";
include "../src/controllers/ctrl404.php";

include "../src/middleware/login.php";
include "../src/middleware/admin.php";

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
  $response = admin($request, $response, $container, "ctrlGymkhana");
}
elseif($r === "saveGymkhana") {
  $response = admin($request, $response, $container, "ctrlCreateGymkhana");
}
elseif($r === "viewGymkhana") {
  $response = ctrlViewGymkhana($request, $response, $container);
}
elseif($r === "viewQuest") {
  $response = login($request, $response, $container, "ctrlViewQuest");
}
elseif($r === "sendAnswer") {
  $response = login($request, $response, $container, "ctrlSendAnswer");
}
elseif($r === "subscribeGymkhana") {
  $response = login($request, $response, $container, "ctrlSubscribeGymkhana");
}
elseif($r === "userProfile") {
  $response = login($request, $response, $container, "ctrlUserProfile");
}
elseif($r === "comms") {
  $response = login($request, $response, $container, "ctrlComms");
}
elseif($r === "quill") {
  $response = login($request, $response, $container, "ctrlQuill");
}
elseif($r === "ODS") {
  $response = ctrlOdsIndex($request, $response, $container); // público
}
elseif($r === "editOds") {
  $response = login($request, $response, $container, "ctrlOdsEdit");
}
elseif($r === "OdsUpdate") {
  $response = login($request, $response, $container, "ctrlOdsUpdate");
}
elseif($r === "logOut") {
  $response = login($request, $response, $container, "ctrlDoLogOut");
}
elseif($r === "settings") {
  $response = login($request, $response, $container, "ctrlSettings");
}
elseif($r === "doSettings") {
  $response = login($request, $response, $container, "ctrlDoSettings");
}
elseif($r === "saveSettings") {
  $response = login($request, $response, $container, "ctrlSaveSettings");
}
elseif($r === "adminUser") {
    $response = admin($request, $response, $container, "ctrlUserGet");
}
elseif($r === "UserUpdate") {
    $response = admin($request, $response, $container, "ctrlUserUpdate");
}
elseif($r === "UserDelete"){
    $response = admin($request, $response, $container, "ctrlUserDelete");
}
elseif($r === "UserAdd"){
    $response = admin($request, $response, $container, "ctrlUserAdd");
}
elseif($r === "addComms"){
    $response = ctrlAddComms($request,$response, $container);
}
elseif($r === "adminComms"){
    $response = ctrlAdminComms($request,$response, $container);
}
elseif($r === "publishComm"){
    $response = ctrlPublishComm($request,$response, $container);
}
elseif($r === "deleteComm"){
    $response = ctrlDeleteComm($request,$response, $container);
}
elseif($r === "petjada"){
    $response = ctrlCarbon($request,$response, $container);
}
else {
  $response = ctrl404($request,$response, $container);
}

$response->response();