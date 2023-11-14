<?php
/**
 * Cómo utilizar esta api
 * TODO como utilizar apiUser
 * 
 * 
 * 
 *
 * 
 */


// Autoload
include_once $_SERVER["DOCUMENT_ROOT"]."/helpers/Autoload.php";

// Cabeceras
header('Content-Type: application/json');

// Api
switch ($_SERVER["REQUEST_METHOD"]) 
{
    case 'GET':
        switch ($_GET["user"]) 
        {
            case 'findAll':
                $users = DBUser::findAll();
                echo json_encode(['data' => $users]);
                break;

            case 'findByName':
                $name = isset($_GET["name"]) ? $_GET["name"] : null;
                $user = DBUser::findByName($name);
                echo json_encode(['data' => $user]);
                break;

            case 'findByRole':
                $role = isset($_GET["role"]) ? $_GET["role"] : null;
                $users = DBUser::findByRole($role);
                echo json_encode(['data' => $users]);
                break;
            
            default:
                echo json_encode(['error' => 'Invalid operation']);
                break;
        }
        break;

    case 'POST':
        $name = isset($_POST["name"]) ? $_POST["name"] : null;
        $password = isset($_POST["password"]) ? $_POST["password"] : null;

        if ($name !== null && $password !== null) {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            DBUser::insert(new User(null, $name, $hashedPassword, null));
            echo json_encode(['success' => 'User inserted successfully']);
        } else {
            echo json_encode(['error' => 'Invalid input']);
        }
        break;

    case 'PUT':
        // TODO: Handle PUT request
        echo json_encode(['error' => 'Not implemented']);
        break;

    case 'DELETE':
        // TODO: Handle DELETE request
        echo json_encode(['error' => 'Not implemented']);
        break;
    
    default:
        echo json_encode(['error' => 'Invalid request']);
        break;
}

?>