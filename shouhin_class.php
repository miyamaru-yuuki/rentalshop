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
        $kingaku = 0;
        if($this->getSkubunId() == 1){
            $kingaku = 50 * $rentalDays;
        }elseif($this->getSkubunId() == 2){
            for($num=1;$num<=$rentalDays;$num++){
                if($num == 1){
                    $kingaku = 300;
                }else{
                    $kingaku = $kingaku + 100;
                }
            }
        }else{
            for($num=1;$num<=$rentalDays;$num++){
                if($num <= 7){
                    $kingaku = 300;
                }else{
                    $kingaku = $kingaku + 100;
                }
            }
        }
        return $kingaku;
    }
}
