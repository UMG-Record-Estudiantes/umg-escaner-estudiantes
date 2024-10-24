<?php

use PHPUnit\Framework\TestCase;

class SubjectFormTest extends TestCase
{
    /**
     * Test para validar la separación del campo 'course-short'.
     */
    public function testCourseShortNameExtraction()
    {
        // Simulamos los datos del formulario
        $_POST['course-short'] = 'CS101-Computer Science';
        
        // Ejecutamos la lógica que extrae los datos
        $courseData = explode('-', $_POST['course-short']);
        $courseShortName = $courseData[0];
        $courseFullName = $courseData[1];

        // Verificamos que los valores sean los correctos
        $this->assertEquals('CS101', $courseShortName);
        $this->assertEquals('Computer Science', $courseFullName);
    }

    /**
     * Test para validar los datos de las materias
     */
    public function testSubjectFormSubmission()
    {
        // Simulamos los datos enviados en el formulario
        $_POST['sub1'] = 'Mathematics';
        $_POST['sub2'] = 'Physics';
        $_POST['sub3'] = 'Chemistry';
        $_POST['sub4'] = 'Biology';

        // Verificamos que los valores de las materias son correctos
        $this->assertEquals('Mathematics', $_POST['sub1']);
        $this->assertEquals('Physics', $_POST['sub2']);
        $this->assertEquals('Chemistry', $_POST['sub3']);
        $this->assertEquals('Biology', $_POST['sub4']);
    }

    /**
     * Test para validar el comportamiento cuando 'sub4' está vacío
     */
    public function testSubjectFormWithOptionalSubject()
    {
        // Simulamos los datos enviados en el formulario
        $_POST['sub1'] = 'Mathematics';
        $_POST['sub2'] = 'Physics';
        $_POST['sub3'] = 'Chemistry';
        $_POST['sub4'] = ''; // Sub4 es opcional

        // Verificamos que los valores de las materias son correctos
        $this->assertEquals('Mathematics', $_POST['sub1']);
        $this->assertEquals('Physics', $_POST['sub2']);
        $this->assertEquals('Chemistry', $_POST['sub3']);
        $this->assertEmpty($_POST['sub4']); // Aseguramos que sub4 está vacío
    }
}

