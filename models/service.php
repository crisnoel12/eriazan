<?php
require_once('../inc/config.php');

class Service{

    private $db;
    private $name;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function create($serviceName)
    {
        $this->db->create('services', 'name', $serviceName);
    }

    public function get($id)
    {
        $service = $this->db->selectWhere('services', 'id', $id);
        return $service;
    }

    public function getAll()
    {
        $services = $this->db->select('services', null);
        return $services;
    }

    public function delete($id)
    {
        $this->db->delete('services', 'id', $id);
    }

    public function display($services)
    {
        foreach ($services as $service) {
            echo '<li>' . $service['name'];
            if (!empty($_SESSION['username'])){
                echo ' <a href="deleteservice.php?id='. $service['id'] .'" class="glyphicon glyphicon-remove-sign red" title="Delete service"></a>';
            }
            echo '</li>';
        }
    }

}
