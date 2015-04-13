<?php

namespace Vultuk\IdealPostcodes;

class LookupPostcode
{

    private $givenPostcode = null;

    private $asArray = false;

    private $endpoint = "https://api.ideal-postcodes.co.uk";
    private $apiVersion = "v1";
    private $apiKey = "ak_i10esdz6iOfFQ6vfFAyDhxzvaEM4V";

    public function __construct($givenPostcode = null, $asArray = false)
    {
        $this->givenPostcode = FormatPostcode::format($givenPostcode);
        $this->asArray = $asArray;

        return $this;
    }

    public function lookupPostcode()
    {
        $liveLookup = json_decode(@file_get_contents(
            $this->endpoint . '/' . $this->apiVersion . '/postcodes/' . str_replace(
                ' ',
                '',
                $this->givenPostcode
            ) . '?api_key=' . $this->apiKey
        ), true);

        $postcodeDetails = new Postcode((array)$liveLookup['result']);

        return $this->asArray ? json_decode(json_encode($postcodeDetails), true) : $postcodeDetails;

    }


    public static function lookup($postcode, $asArray = false)
    {
        $repository = new Self($postcode, $asArray);
        return $repository->lookupPostcode();
    }

}
