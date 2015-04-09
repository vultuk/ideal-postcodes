<?php

namespace spec\Vultuk\IdealPostcodes;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AddressSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith([]);
        $this->shouldHaveType('Vultuk\IdealPostcodes\Address');
    }
}
