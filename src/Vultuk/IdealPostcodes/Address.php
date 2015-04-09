<?php

namespace Vultuk\IdealPostcodes;

class Address
{

    public $organisation_name = null;
    public $line_1 = null;
    public $line_2 = null;
    public $line_3 = null;
    public $country = null;
    public $county = null;
    public $district = null;
    public $ward = null;
    public $longitude = null;
    public $latitude = null;
    public $udprn = null;

    public function __construct(array $addressDetails)
    {
        $this->transformAddress($addressDetails);
    }

    private function transformAddress($addressDetails)
    {
        $this->organisation_name = (!isset($addressDetails['organisation_name'])) ? null : $addressDetails['organisation_name'];
        $this->line_1 = (!isset($addressDetails['line_1'])) ? null : $addressDetails['line_1'];
        $this->line_2 = (!isset($addressDetails['line_2'])) ? null : $addressDetails['line_2'];
        $this->line_3 = (!isset($addressDetails['line_3'])) ? null : $addressDetails['line_3'];
        $this->country = (!isset($addressDetails['country'])) ? null : $addressDetails['country'];
        $this->county = (!isset($addressDetails['county'])) ? null : $addressDetails['county'];
        $this->district = (!isset($addressDetails['district'])) ? null : $addressDetails['district'];
        $this->ward = (!isset($addressDetails['ward'])) ? null : $addressDetails['ward'];
        $this->longitude = (!isset($addressDetails['longitude'])) ? null : $addressDetails['longitude'];
        $this->latitude = (!isset($addressDetails['latitude'])) ? null : $addressDetails['latitude'];
        $this->udprn = (!isset($addressDetails['udprn'])) ? null : $addressDetails['udprn'];
    }

}
