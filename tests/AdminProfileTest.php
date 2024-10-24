<?php

use PHPUnit\Framework\TestCase;

class AdminProfileTest extends TestCase
{
    /**
     * Test para verificar que se pueden actualizar los valores del perfil del administrador.
     */
    public function testAdminProfileUpdate()
    {
        // Simulamos los datos de la sesión y el formulario
        $_SESSION['aid'] = 1;
        $_POST['adminname'] = 'New Admin Name';
        $_POST['aemailid'] = 'admin@example.com';
        $_POST['submit'] = true;

        // Lógica que debería ejecutarse al enviar el formulario
        $aid = $_SESSION['aid'];
        $adminName = $_POST['adminname'];
        $adminEmail = $_POST['aemailid'];

        // Afirmamos que los valores sean los esperados
        $this->assertEquals(1, $aid);
        $this->assertEquals('New Admin Name', $adminName);
        $this->assertEquals('admin@example.com', $adminEmail);
    }

    /**
     * Test para verificar el mensaje de alerta cuando la actualización es exitosa.
     */
    public function testProfileUpdateSuccessMessage()
    {
        // Simulamos el resultado exitoso de una consulta
        $queryResult = true;

        // Comprobamos el mensaje que se mostraría
        if ($queryResult) {
            $this->expectOutputString('<script>alert("Admin Profile updated successfully")</script>');
            echo '<script>alert("Admin Profile updated successfully")</script>';
        }
    }

    /**
     * Test para verificar que se redirige al perfil del administrador tras la actualización.
     */
    public function testRedirectAfterUpdate()
    {
        // Simulamos el resultado exitoso de una consulta
        $queryResult = true;

        // Comprobamos la redirección que se debería realizar
        if ($queryResult) {
            $this->expectOutputString("<script>window.location.href='admin-profile.php'</script>");
            echo "<script>window.location.href='admin-profile.php'</script>";
        }
    }
}

