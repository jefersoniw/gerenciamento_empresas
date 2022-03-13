<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    /** @test */
    public function check_if_inputs_exists()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->assertSee('Cadastrar Usuário');
        });
    }

    /** @test */
    public function check_if_register_user_is_correct()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->type('name', 'teste')
                ->type('email', 'teste@email.com')
                ->type('password', '12345678')
                ->type('password_confirmation', '12345678')
                ->press('Cadastrar')
                ->assertPathIs('/empresas')
                ->assertSee('Gerenciamento de Empresas');
        });
    }

    /** @test */
    public function check_if_login_is_active()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('email', 'teste@email.com')
                ->type('password', '12345678')
                ->press('Entrar')
                ->assertPathIs('/empresas');
        });
    }
}
