<?php

namespace Tests\Unit;

use App\Models\Empresa;
use PHPUnit\Framework\TestCase;

class EmpresaTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function check_if_empresa_colunms_is_correct()
    {
        $empresa = new Empresa();
        $expected = [
            'emp_nom_empresa',
            'emp_dti_atividade',
            'emp_dtf_atividade',
            'emp_especial'
        ];

        $arrayC = array_diff($expected, $empresa->getFillable());

        //dd($arrayC);

        $this->assertEquals(0, count($arrayC));
    }
}
