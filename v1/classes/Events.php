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
        $stmt = $this->db->prepare('SELECT name as "title", time as "date" FROM events WHERE _category = ?');
        $stmt->execute([$category]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_events(): array
    {
        $stmt = $this->db->prepare('SELECT name as "title", time as "date" FROM events');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}