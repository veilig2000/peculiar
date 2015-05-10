<?php

namespace spec\Rfifteen\Peculiar\Ardent;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rhumsaa\Uuid\Uuid;

class PeculiarSpec extends ObjectBehavior
{
    function let()
    {
        $this->beAnInstanceOf('spec\Rfifteen\Peculiar\Ardent\DummyPeculiar');
    }

    function it_is_initializable()
    {
        $this->shouldImplement('Rfifteen\Peculiar\UuidModelInterface');
        $this->shouldImplement('Rfifteen\Peculiar\Ardent\Peculiar');
        $this->shouldImplement('LaravelBook\Ardent\Ardent');
        $this->shouldImplement('Illuminate\Database\Eloquent\Model');
    }

    function it_should_have_incrementing_turned_off()
    {
        $this->getIncrementing()->shouldReturn(false);
    }

    function it_should_generate_a_rhumsaa_uuid()
    {
        $this->generateNewId()->shouldReturnAnInstanceOf('Rhumsaa\Uuid\Uuid');
    }

    function its_primary_key_value_should_be_a_valid_uuid()
    {
        $this->getKey()->shouldMatch('/' . Uuid::VALID_PATTERN . '/');
    }
}

class DummyPeculiar extends \Rfifteen\Peculiar\Ardent\Peculiar
{
}
