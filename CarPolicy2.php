<?php
class CarPolicy
{
    private $policyNumber="";
    private $yearlyPremium="";
    private $dateOfLastClaim="";

    public function __construct($pNumber,$yPremium)
    {
        $this->policyNumber = $pNumber;
        $this->yearlyPremium = $yPremium;
    }

    public function setDateOfLastClaim($dolc)
    {
        $this-> dateOfLastClaim = $dolc;
    }

    public function getTotalYearsNoClaims()
    {
     $currentDate = new DateTime();
     $lastDate= new DateTime($this->dateOfLastClaim);
     $interval = $currentDate->diff($lastDate);
     return $interval->format("%y");
    }

    public function __toString()
    {
        return "PN:" . $this-> policyNumber;
    }


    public function getDiscount()
    {
        $discount = 0;

        if ($this->$getTotalYearsNoClaims >=3 && $this->$getTotalYearsNoClaims <=5){
            $discount = 0.10;
        }
        elseif ($this->getTotalYearsNoClaims > 5) {
            $discount = 0.15;
        }
        return $discount;
    }

    public function getDiscountedPremium()
    {
        $discount = $this->getDiscount();

        $discountPremium = $this->yearlyPremium * (1 - $discount);
        return $discountPremium;

    }

}
?>