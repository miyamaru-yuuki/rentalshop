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
        $sql = $this->db->prepare("SELECT * FROM shouhin3 INNER JOIN shouhinkubun ON shouhin3.skubunId=shouhinkubun.skubunId WHERE shouhin3.sname LIKE ? ORDER BY sname ASC");
        $sql->bindValue(1, '%'. $sname .'%');
        $sql->execute();
        $all = $sql->fetchAll();

        $ret = array();
        foreach($all as $data){
            $shouhin = new Shouhin($data['sid'],$data['sname'],$data['skubunId'],$data['skubunName']);
            $ret[] = $shouhin;
        }
        return $ret;
    }

}