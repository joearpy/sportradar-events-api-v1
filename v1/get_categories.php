<?php
require_once './classes/Database.php';
require_once './classes/Events.php';

$db = new Database();
$events = new Events($db->pdo);

$response = $events->get_categories();

echo json_encode($response);