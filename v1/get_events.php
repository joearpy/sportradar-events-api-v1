<?php
require_once './classes/Database.php';
require_once './classes/Events.php';

$db = new Database();
$events = new Events($db->pdo);

foreach ($events->get_events() as $event) {
    $response[] = [
        'title' => $event['title'],
        'date' => date('Y/m/d', strtotime($event['date'])),
        'desc' => $event['title'] . " at " . $event['date'] . " Watch it!",
    ];
}

echo json_encode($response);