<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Card;

class CardsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }
   
    public function testCardList(){

    	$this->get("/cards/index")->assertSee("All cards");
    }

    public function testPageStatus(){
    	$this->get('/cards/index')->assertStatus(200);
    }
}
