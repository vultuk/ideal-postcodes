<?php

namespace spec\Vultuk\IdealPostcodes;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FormatPostcodeSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Vultuk\IdealPostcodes\FormatPostcode');
    }

    function it_should_throw_an_exception() {
        $this->shouldThrow(new \Exception('No Postcode Given'))->during('__construct');
    }

    function it_should_return_a_valid_postcode()
    {
        $this->beConstructedWith("ID1 1QD");
        $this->formatPostcode()->shouldReturn("ID1 1QD");
    }

}
