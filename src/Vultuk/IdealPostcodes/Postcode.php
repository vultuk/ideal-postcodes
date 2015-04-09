<?php

namespace Vultuk\IdealPostcodes;

class Postcode
{

    public $thoroughfare = null;
    public $postcode_inward = null;
    public $postcode_outward = null;

    public $addresses = [];


    public function __construct(array $lookupDetails)
    {
        if (!isset($lookupDetails[0]))
        {
            throw new \Exception('No postcode details found.');
        }

        $this->transformPostcodeDetails($lookupDetails[0], $lookupDetails);

        return $this;
    }

    private function transformPostcodeDetails($lookupItem, $fullDetails)
    {
        $this->thoroughfare = (!isset($lookupItem['thoroughfare'])) ? null : $lookupItem['thoroughfare'];
        $this->postcode_inward = (!isset($lookupItem['postcode_inward'])) ? null : $lookupItem['postcode_inward'];
        $this->postcode_outward = (!isset($lookupItem['postcode_outward'])) ? null : $lookupItem['postcode_outward'];

        $this->addresses = array_map(function($address) {
            return new Address($address);
        }, $fullDetails);

        return $this;
    }

}
