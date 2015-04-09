<?php

namespace spec\Vultuk\IdealPostcodes;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LookupPostcodeSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Vultuk\IdealPostcodes\LookupPostcode');
    }


    function it_should_find_postcode_details()
    {
        $this->beConstructedWith("ID1 1QD");
        $postcode = $this->lookupPostcode()->shouldHaveType('\Vultuk\IdealPostcodes\Postcode');
    }

}
