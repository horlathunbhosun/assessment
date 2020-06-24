<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmailValidationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function testExample()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);  // public function testExample()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }
    // }


    public function testRequiredFieldsForValidation()
    {

        $this->json('POST', 'api/validate', ['email' => 'horlathunbhosun@gmail.com'])
        ->assertStatus(200)
        ->assertJsonStructure([
            "email",
            "did_you_mean",
            "user",
            "domain",
            "format_valid",
            "mx_found",
            "smtp_check",
            "catch_all",
            "role",
            "disposable",
            "free",
            "score",
        ]);
    }
}
