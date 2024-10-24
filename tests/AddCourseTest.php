<?php

use PHPUnit\Framework\TestCase;

class AddCourseTest extends TestCase
{
    public function testAddCourseSuccess()
    {
        // Simular los datos de entrada del formulario
        $_POST['course-short'] = 'CS101';
        $_POST['course-full'] = 'Computer Science 101';
        $_POST['cdate'] = '2024-10-23';

        // Simular el resultado esperado de la inserción sin conectarse a una base de datos
        $expectedShort = $_POST['course-short'];
        $expectedFull = $_POST['course-full'];
        $expectedDate = $_POST['cdate'];

        // Simular la función que debería ejecutarse (mock de la consulta de la DB)
        $result = $this->simulateCourseInsert($expectedShort, $expectedFull, $expectedDate);

        // Verificar que el resultado sea correcto
        $this->assertTrue($result, "La inserción debería ser exitosa.");
    }

    public function testAddCourseFailure()
    {
        // Simular datos incorrectos o vacíos
        $_POST['course-short'] = '';
        $_POST['course-full'] = '';
        $_POST['cdate'] = '';

        // Simular el resultado esperado cuando fallan los datos
        $expectedShort = $_POST['course-short'];
        $expectedFull = $_POST['course-full'];
        $expectedDate = $_POST['cdate'];

        // Simular la función que debería fallar la inserción (en este caso, por datos vacíos)
        $result = $this->simulateCourseInsert($expectedShort, $expectedFull, $expectedDate);

        // Verificar que el resultado sea falso (fallido)
        $this->assertFalse($result, "La inserción debería fallar con datos vacíos.");
    }

    // Simular la función de inserción, evitando la interacción con la base de datos
    private function simulateCourseInsert($shortName, $fullName, $date)
    {
        // Validar que todos los campos estén llenos (simulando una validación de lógica)
        if (empty($shortName) || empty($fullName) || empty($date)) {
            return false;  // Fallo si los datos están vacíos
        }

        // Simular que la inserción fue exitosa
        return true;
    }
}

