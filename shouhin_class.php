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

    public function getKingaku($rentalDays)
    {
        if($this->getSkubunId() == 1) {
            $kingaku = $this->getKingakuId1($rentalDays);
        }elseif($this->getSkubunId() == 2) {
            $kingaku = $this->getKingakuId2($rentalDays);
        }else{
            $kingaku = $this->getKingakuId3($rentalDays);
        }
        return $kingaku;
    }

    private function getKingakuId1($rentalDays)
    {
        $kingaku = 50 * $rentalDays;
        return $kingaku;
    }

    private function getKingakuId2($rentalDays)
    {
        $kingaku = 300;
        for($num=2;$num<=$rentalDays;$num++) {
            $kingaku = $kingaku + 100;
        }
        return $kingaku;
    }

    private function getKingakuId3($rentalDays)
    {
        $kingaku = 300;
        for($num=8;$num<=$rentalDays;$num++) {
            $kingaku = $kingaku + 100;
        }
        return $kingaku;
    }
}
