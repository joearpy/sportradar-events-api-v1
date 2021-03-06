<?php

$_POST = json_decode(file_get_contents('php://input'), true);

if (!isset($_POST)) {
    $response = ["Only POST accepted"];
    echo json_encode($response);
    return;
}

require_once './classes/Database.php';
require_once './classes/Events.php';

$db = new Database();
$events = new Events($db->pdo);

$category_id = $_POST['categoryId'];

foreach ($events->get_events_by_category($category_id) as $event) {
    $response[] = [
        'title' => $event['title'],
        'date' => date('Y/m/d', strtotime($event['date'])),
        'desc' => $event['title'] . " at " . $event['date'] . " Watch it!",
    ];
}

echo json_encode($response);