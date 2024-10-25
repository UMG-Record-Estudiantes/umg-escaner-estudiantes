<?php
use PHPUnit\Framework\TestCase;

class CourseValidationTest extends TestCase
{
    public function setUp(): void
    {
        // Simulamos el entorno de POST
        $_POST = [];
    }

    public function testCourseShortNameAlreadyExists()
    {
        // Configuramos el valor de $_POST para que simule la entrada
        $_POST['cshort'] = 'CS101';

        // Simulamos la salida de la consulta con el valor esperado de 'count' mayor a 0
        $count = 1;

        // Iniciamos el buffering para capturar la salida
        ob_start();
        
        // Incluimos el archivo de lógica (supongamos que se llama `CourseValidation.php`)
        include 'CourseValidation.php';

        // Capturamos la salida y limpiamos el buffer
        $output = ob_get_clean();

        // Validamos el mensaje esperado en la salida
        $this->assertStringContainsString(
            "<span style='color:red'> Course Short Name Already Exist .</span>",
            $output
        );
    }

    public function testCourseFullNameAlreadyExists()
    {
        // Simulamos la entrada de un nombre completo del curso duplicado
        $_POST['cfull'] = 'Computer Science';

        // Simulamos la salida de la consulta con el valor esperado de 'count' mayor a 0
        $count = 1;

        // Iniciamos el buffering para capturar la salida
        ob_start();
        
        // Incluimos el archivo de lógica (supongamos que se llama `CourseValidation.php`)
        include 'CourseValidation.php';

        // Capturamos la salida y limpiamos el buffer
        $output = ob_get_clean();

        // Validamos el mensaje esperado en la salida
        $this->assertStringContainsString(
            "<span style='color:red'> Course Full Name Already Exist .</span>",
            $output
        );
    }

    protected function tearDown(): void
    {
        // Limpiamos el entorno POST después de cada prueba
        $_POST = [];
    }
}
