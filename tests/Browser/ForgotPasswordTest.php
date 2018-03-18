<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ForgotPasswordTest extends DuskTestCase
{
    /**
     * A Dusk test to check forgot password page exist
     *
     */
    public function testForgotPassword()
    {
        $this->browse(function($browser)
        {
            $browser->visit('/password/reset')
            ->assertSee('Reset Password');            
        });
    }

    /**
     * A Dusk test to check response of invalid / not exist email 
     *
     */
    public function testForgotPasswordWithInvalidEmail()
    {
        $this->browse(function($browser)
        {
            $browser->visit('/password/reset')
                    ->type('email', 'test@test.com')
                    ->press('Send Password Reset Link')
                    ->assertSee("We can't find a user with that e-mail address.");
        });
    }

    /**
     * A Dusk test to check response of valid email
     *
     */
    public function testForgotPasswordWithValidEmail(){
        $this->browse(function($browser){
            $browser->visit('/password/reset')
            ->type('email', 'foo@bar.com')
            ->press('Send Password Reset Link')
            ->assertSee('We have e-mailed your password reset link!');
        });
    }
}
