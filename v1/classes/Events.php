<?php

class Events {

    private PDO $db;

    public function __construct( PDO $db )
    {
        $this->db = $db;
    }

    public function get_categories() : array
    {
        $stmt = $this->db->prepare('SELECT * FROM categories');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_events_by_category( $category ) : array
    {
        $stmt = $this->db->prepare('SELECT * FROM events WHERE _category = ?');
        $stmt->execute([$category]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}