<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Faker\Factory;

use App\User;
class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk register test for email already been taken 
     *
     * @return void
     */
    public function testRegisterEmailAlreadyTaken()
    {
        $this->browse(function($browser)
        {
            $browser->visit('/register')
            ->type('name', 'Me')
            ->type('email','foo@bar.com')
            ->type('password', 'secret')
            ->type('password_confirmation', 'secret')
            ->press('Register')
            ->assertSee('The email has already been taken.');            
        });                        
    }

    /**
     * A dusk register new user
     * @return void
     */
    public function testRegisterNewUser()
    {   
        $faker = \Faker\Factory::create();

        $user = User::create([
                'name' => $faker->name,
                'password' => 'secret',                
                'email' => $faker->email
        ]);

        $this->browse(function($browser) use($user)
        {
            $browser->visit('/register')
            ->type('name', $user->name)
            ->type('email',$user->email)
            ->type('password', $user->password)
            ->type('password_confirmation', $user->password)
            ->press('Register')
            ->assertPathIs('/home');
        });
    }
}
