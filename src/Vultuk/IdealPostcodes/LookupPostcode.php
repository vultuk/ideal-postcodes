<?php

namespace Vultuk\IdealPostcodes;

class LookupPostcode
{

    private $givenPostcode = null;

    private $endpoint = "https://api.ideal-postcodes.co.uk";
    private $apiVersion = "v1";
    private $apiKey = "";

    public function __construct($givenPostcode = null)
    {
        $this->givenPostcode = FormatPostcode::format($givenPostcode);

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

        return new Postcode((array)$liveLookup['result']);

    }




}
