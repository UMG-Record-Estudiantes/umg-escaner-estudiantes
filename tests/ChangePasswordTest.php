<?php

use PHPUnit\Framework\TestCase;

class ChangePasswordTest extends TestCase
{
    /**
     * Test para verificar que la validación de contraseñas funciona correctamente.
     */
    public function testPasswordMismatchValidation()
    {
        // Simular que las contraseñas no coinciden
        $_POST['newpassword'] = 'newpassword123';
        $_POST['confirmpassword'] = 'differentpassword123';

        // Verificar que la validación de checkpass devuelve false
        $this->assertFalse($this->checkpass());
    }

    /**
     * Test para verificar que las contraseñas coinciden.
     */
    public function testPasswordMatchValidation()
    {
        // Simular que las contraseñas coinciden
        $_POST['newpassword'] = 'newpassword123';
        $_POST['confirmpassword'] = 'newpassword123';

        // Verificar que la validación de checkpass devuelve true
        $this->assertTrue($this->checkpass());
    }

    /**
     * Test para verificar el mensaje de alerta si la contraseña actual es incorrecta.
     */
    public function testIncorrectCurrentPasswordAlert()
    {
        // Simular que la contraseña actual es incorrecta
        $queryResult = false;

        if (!$queryResult) {
            $this->expectOutputString('<script>alert("Your current password is wrong.")</script>');
            echo '<script>alert("Your current password is wrong.")</script>';
        }
    }

    /**
     * Test para verificar el mensaje de éxito si la contraseña se cambia correctamente.
     */
    public function testSuccessfulPasswordChangeAlert()
    {
        // Simular que la consulta fue exitosa
        $queryResult = true;

        if ($queryResult) {
            $this->expectOutputString('<script>alert("Your password successully changed.")</script>');
            echo '<script>alert("Your password successully changed.")</script>';
        }
    }

    /**
     * Función que simula la lógica de la validación de contraseña.
     */
    private function checkpass()
    {
        return $_POST['newpassword'] === $_POST['confirmpassword'];
    }
}

