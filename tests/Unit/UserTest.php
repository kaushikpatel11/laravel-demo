<?php

namespace Tests\Unit;

use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testLogin()
    {
        $this->email    = 'owner@gmail.com';
        $this->password = 'owner@gmail.com';
        $this->loginUser(true);
    }

}
