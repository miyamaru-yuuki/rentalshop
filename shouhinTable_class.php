<?php
require_once ('shouhin_class.php');

class ShouhinTable
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function search($sname)
    {
        $sql = $this->db->prepare("SELECT * FROM shouhin3 WHERE sname LIKE ? ORDER BY sname ASC");
        $sql->bindValue(1, '%'. $sname .'%');
        $sql->execute();
        $all = $sql->fetchAll();

        $ret = array();
        foreach($all as $data){
            $shouhin = new Shouhin($data['sid'],$data['sname'],$data['skubunId'],null);
            $ret[] = $shouhin;
        }
        return $ret;
    }

    public function getSname($sid)
    {
        $sql = $this->db->prepare("SELECT sname FROM shouhin3 WHERE sid=?");
        $sql->bindValue(1,$sid);
        $sql->execute();
        $data = $sql->fetch();
        return $data['sname'];
    }

    public function getSkubunId($sid)
    {
        $sql = $this->db->prepare("SELECT skubunId FROM shouhin3 WHERE sid=?");
        $sql->bindValue(1,$sid);
        $sql->execute();
        $data = $sql->fetch();
        return $data['skubunId'];
    }

    public function getSkubunName($skubunId)
    {
        $sql = $this->db->prepare("SELECT skubunName FROM shouhinkubun WHERE skubunId=?");
        $sql->bindValue(1,$skubunId);
        $sql->execute();
        $data = $sql->fetch();
        return $data['skubunName'];
    }

}