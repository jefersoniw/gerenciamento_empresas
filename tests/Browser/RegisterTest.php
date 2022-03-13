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

    public function testIfInputsExists()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->assertSee('Cadastrar Usuário');
        });
    }

    public function testIfLoginIsActive()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('email', 'jeferson@email.com')
                ->type('password', '12345678')
                ->press('Entrar')
                ->assertPathIs('/empresas');
        });
    }

    public function testRegisterUser()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->type('name', 'teste')
                ->type('email', 'teste@email.com')
                ->type('password', '12345678')
                ->type('password_confirmation', '12345678')
                ->press('Cadastrar')
                ->assertPathIs('/empresas');
        });
    }
}
