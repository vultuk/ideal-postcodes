<?php

namespace Vultuk\IdealPostcodes;

/**
 * Class FormatPostcode
 * @package Vultuk\IdealPostcodes
 */
class FormatPostcode
{

    /**
     * @var null
     */
    private $givenPostcode = null;

    /**
     * @var string
     */
    private $formattingType = "ukFormatting";


    /**
     * @param null $givenPostcode
     * @throws \Exception
     */
    public function __construct($givenPostcode = null)
    {
        $this->givenPostcode = $this->checkPostcode($givenPostcode);
    }

    /**
     * @return mixed
     */
    public function formatPostcode()
    {
        return call_user_func([$this, $this->formattingType], $this->givenPostcode);
    }


    /**
     * @param $givenPostcode
     * @return mixed|string
     * @throws \Exception
     */
    private function ukFormatting($givenPostcode)
    {
        $givenPostcode = strtoupper($givenPostcode);
        $givenPostcode = preg_replace('/[^A-Z0-9]/', '', $givenPostcode);
        $givenPostcode = preg_replace('/([A-Z0-9]{3})$/', ' \1', $givenPostcode);
        $givenPostcode = trim($givenPostcode);

        if (!preg_match('/^[a-z](\d[a-z\d]?|[a-z]\d[a-z\d]?) \d[a-z]{2}$/i', $givenPostcode)) {
            throw new \Exception('Postcode is not valid');
        }

        return $givenPostcode;
    }


    /**
     * @param $givenPostcode
     * @return mixed
     * @throws \Exception
     */
    private function checkPostcode($givenPostcode)
    {
        if (is_null($givenPostcode)) {
            throw new \Exception('No Postcode Given');
        }

        return $givenPostcode;
    }


    /**
     * @param null $givenPostcode
     * @return mixed
     */
    public static function format($givenPostcode = null)
    {
        return (new Static($givenPostcode))->formatPostcode();
    }

}
