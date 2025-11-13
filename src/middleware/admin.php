<?php


function admin($request, $response, $container, $next){

    $user = $request->get("SESSION", "user");
    
    
    
    if(is_null($user)){
        $response->redirect("Location: index.php");
        return $response;
    }



    if($user['isAdmin'] != 1){
        $response->redirect("Location: index.php");
        return $response;
    }


    print_r($user); 
    $response = $next($request, $response, $container);
    $response->set("user", $user);

    return $response;
}


// declare(strict_types=1);

// /**
//  * Check if a user is an admin.
//  *
//  * @param \PDO $db
//  * @param int  $userId
//  * @return bool
//  */


// function isAdmin(\PDO $db, int $userId): bool
// {
    
    
    
//     $stmt = $db->prepare('SELECT isAdmin FROM users WHERE id = :id LIMIT 1');
//     $stmt->execute([':id' => $userId]);
//     $row = $stmt->fetch(\PDO::FETCH_ASSOC);

//     if ($row === false || !isset($row['isAdmin'])) {
//         return false;
//     }

//     return (int)$row['isAdmin'] === 1;
// }