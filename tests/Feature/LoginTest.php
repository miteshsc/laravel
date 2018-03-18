<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;

class LoginTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */    

    public function testLogin()
    {
    	$user = factory(User::class)->create();

    	$response = $this->actingAs($user)
    	->withSession(["foo" => "bar"])
    	->get("/home")->assertSee('You are logged in!');
    }

    public function testLoginRequired()
    {    	
    	$response = $this->get("/home")->assertSee('Redirecting to');
    }

}
