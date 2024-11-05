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

}
?>