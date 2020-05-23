<?php
class Shouhin
{
    // プロパティの宣言
    private $sid;
    private $sname;
    private $skubunId;
    private $skubunName;

    public function __construct($sid,$sname,$skubunId,$skubunName)
    {
        $this->sid = $sid;
        $this->sname = $sname;
        $this->skubunId = $skubunId;
        $this->skubunName = $skubunName;
    }

    public function getSid()
    {
        return $this->sid;
    }

    public function getSname()
    {
        return $this->sname;
    }

    public function getSkubunId()
    {
        return $this->skubunId;
    }

    public function getSkubunName()
    {
        return $this->skubunName;
    }

    public function getKingaku()
    {
//        return $this->skubunName;
    }
}
