<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Card;

class CardTest extends TestCase
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

    public function testAddCard()
    {
    	$card = new Card;
    	$newCard = $card->add(['title' => 'Hello']);

    	$this->assertNotNull($newCard->id);

    	$this->assertEquals($newCard->title, 'Hello');

    	$newCard = new Card;

    	$this->assertNull($newCard->id);
    }  
}
