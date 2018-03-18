<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use App\User;

class LoginTest extends DuskTestCase
{   

    /**
     * A Dusk test to check login functionlity.
     *
     * @return void
     */
    public function testLogin()
    {       
        $user = User::where('email','test@localhost.com')->first();

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('email', $user->email)
                    ->type('password', 'secret')
                    ->press('Login')
                    ->assertPathIs('/home');
        });
    }
    
    /**
     * A Dusk test to check logout functionality
     *
     * @return void
     */
    public function testLogout()
    {
        $this->browse(function($browser)
        {
            $browser->visit('/home')
                ->click('.dropdown-toggle')
                ->click("@logout")
                ->assertPathIs('/');
        });
    }

    
}
