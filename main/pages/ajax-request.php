<?php
session_start();
include_once(__DIR__.'/../../config/functions.php');

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : "";

header('Content-Type: application/json');

// Use $_POST to retrieve the data
$data = $_POST;
// $files = $_FILES;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($data['action'])) {
    try {
        switch ($data['action']) {
            case 'update_user_preferences':
                ajax_user_meta($data, $user_id);
                break;
            }
    } catch (Exception $e) {
        error_log('Error processing request: ' . $e->getMessage());
        echo json_encode(['error' => $e->getMessage()]);
    }
}

function ajax_user_meta($params, $user_id){
    try {

        $brand=!empty($params['brandItems'])?serialize($params['brandItems']):"";
        $category=!empty($params['categoryItems'])?serialize($params['categoryItems']):"";
        $type=!empty($params['typeItem'])?serialize($params['typeItem']):"";

        //brand
       $response= updateUserMeta($user_id, '_brand_preferences', $brand);
       $response= updateUserMeta($user_id, '_category_preferences', $category);
       $response= updateUserMeta($user_id, '_type_preferences', $type);

       if($response){
        echo json_encode(['status'=>'success', 'message'=>'Successfully Updated.']);
       }else{
         echo json_encode(['status'=>'error', 'message'=>'Failed to Update.']);
       }

    } catch (\Throwable $th) {
        error_log('Error processing request: ' . $e->getMessage());
        echo json_encode(['error' => $e->getMessage()]);
    }
}