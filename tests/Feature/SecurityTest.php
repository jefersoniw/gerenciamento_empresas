<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SecurityTest extends TestCase
{
    /** @test */
    public function only_logged_in_users_can_see_empresas()
    {
        $response = $this->get('/empresas')
            ->assertRedirect('/login');
    }
}
