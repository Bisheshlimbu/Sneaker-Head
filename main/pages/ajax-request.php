<?php
session_start();
include_once(__DIR__ . '/../../config/functions.php');

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : "";

header('Content-Type: application/json');

// Use $_POST to retrieve the data
$data = $_POST;
$files = $_FILES;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($data['action'])) {
    try {
        switch ($data['action']) {
            case 'update_user_preferences':
                ajax_user_meta($data, $user_id);
                break;
            case 'add_to_cart':
                ajax_add_to_Cart($data);
                break;
            case 'update_product':
                ajax_update_product($data);
                break;
            case 'add_to_fav':
                ajax_add_to_fav($data);
                break;
            case 'add_highlight':
                ajax_add_highlight($data, $files);
                break;
            case 'make_visible_frontend':
                ajax_make_visible_highlight($data);
                break;
        }
    } catch (Exception $th) {
        error_log('Error processing request: ' . $th->getMessage());
        echo json_encode(['error' => $th->getMessage()]);
    }
}

function ajax_add_highlight($params, $files)
{
    try {
        if (!empty($params) && !empty($files)) {
            $response = create_highlights($params, $files);

            if ($response) {
                echo json_encode($response);
            }
        }
    } catch (\Throwable $th) {
        error_log('Error processing request: ' . $th->getMessage());
        echo json_encode(['error' => $th->getMessage()]);
    }
}


function ajax_make_visible_highlight($params)
{

    try {
        if (!empty($params)) {
            $response = updateHighlightsMakeVisible($params);
           
            if ($response) {
                echo json_encode($response);
                return;
            }
        }
    } catch (\Throwable $th) {
        error_log('Error processing request: ' . $th->getMessage());
        echo json_encode(['error' => $th->getMessage()]);
    }
}


function ajax_user_meta($params, $user_id)
{
    try {

        $brand = !empty($params['brandItems']) ? serialize($params['brandItems']) : "";
        $category = !empty($params['categoryItems']) ? serialize($params['categoryItems']) : "";
        $type = !empty($params['typeItem']) ? serialize($params['typeItem']) : "";

        //brand
        $response = updateUserMeta($user_id, '_brand_preferences', $brand);
        $response = updateUserMeta($user_id, '_category_preferences', $category);
        $response = updateUserMeta($user_id, '_type_preferences', $type);

        if ($response) {
            echo json_encode(['status' => 'success', 'message' => 'Successfully Updated.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to Update.']);
        }

    } catch (\Throwable $th) {
        error_log('Error processing request: ' . $th->getMessage());
        echo json_encode(['error' => $th->getMessage()]);
    }
}



function ajax_add_to_Cart($params)
{
    try {
        $response = saveCartItems($params);

        if ($response) {
            echo json_encode(['status' => 'success', 'message' => 'Successfully Added to Cart.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to add to cart.']);
        }

    } catch (\Throwable $th) {
        error_log('Error processing request: ' . $th->getMessage());
        echo json_encode(['error' => $th->getMessage()]);
    }
}

function ajax_update_product($params)
{
    try {
        $response = updateProductDetails($params);
        if ($response) {
            echo json_encode(['status' => 'success', 'message' => 'Product Updated Successfully.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to update product.']);
        }

    } catch (\Throwable $th) {
        error_log('Error processing request: ' . $th->getMessage());
        echo json_encode(['error' => $th->getMessage()]);
    }
}


function ajax_add_to_fav($params)
{

    try {
        $response = add_to_fav($params);
        if ($response['status'] == 'success') {
            if ($response['like'] == 1) {
                echo json_encode(['status' => 'success', 'message' => 'Product added to favorites!']);

            } else {
                echo json_encode(['status' => 'success', 'message' => 'Product remove from favorites!']);

            }
        }

    } catch (\Throwable $th) {
        error_log('Error processing request: ' . $th->getMessage());
        echo json_encode(['error' => $th->getMessage()]);
    }
}