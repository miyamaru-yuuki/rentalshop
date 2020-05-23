<?php
require_once ('shouhin_class.php');

class ShouhinTable
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function search($tid)
    {
        $sql = $this->db->prepare("SELECT * FROM todo2 WHERE tid=?");
        $sql->bindValue(1, $tid);
        $sql->execute();
        $data = $sql->fetch();
        $todo = new Todo($data['tid'],$data['tname'],$data['status'],$data['priority'],$data['registrationTime']);

        return $todo;
    }

}