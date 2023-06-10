<?php
session_start();
$arrayStudents = [];
$arrayAux = [];
if (isset($_SESSION['StudentData'])) {
  $arrayStudents = $_SESSION['StudentData'];

}
if (isset($_POST['delete'])) {
  session_destroy();
  header("Location: index.php");
}
class student
{
  public $name_student;
  public $personID_student;
  public $mathGrade_student;
  public $physicsGrade_student;
  public $progGrade_student;
  public $approMath;
  public $approPhysics;
  public $approProg;

  public function __construct($name, $personID, $mathGrade, $physicsGrade, $progGrade)
  {
    $this->name_student = $name;
    $this->personID_student = $personID;
    $this->mathGrade_student = $mathGrade;
    $this->physicsGrade_student = $physicsGrade;
    $this->progGrade_student = $progGrade;
  }
  public function getStudentName()
  {
    return $this->name_student;
  }
  public function getStudentID()
  {
    return $this->personID_student;
  }
  public function getStudentMathGrade()
  {
    return $this->mathGrade_student;
  }
  public function getStudentPhysicsGrade()
  {
    return $this->physicsGrade_student;
  }
  public function getStudentProgGrade()
  {
    return $this->progGrade_student;
  }
  public function getApproMath()
  {
    return $this->approMath;
  }

  public function getApproPhysics()
  {
    return $this->approPhysics;
  }

  public function getApproProg()
  {
    return $this->approProg;
  }
  public function setApproMath()
  {
    $this->approMath = 1;
  }
  public function setApproPhysics()
  {
    $this->approPhysics = 1;
  }
  public function setApproProg()
  {
    $this->approProg = 1;
  }
}



if ((isset($_POST['name']) && isset($_POST['personID']) && isset($_POST['mathGrade'])) && (isset($_POST['physicsGrade']) && isset($_POST['progGrade']))) {
  if ((!empty($_POST['name']) && !empty($_POST['personID']) && !empty($_POST['mathGrade'])) && (!empty($_POST['physicsGrade']) && !empty($_POST['progGrade']))) {
    $name = $_POST['name'];
    $personID = $_POST['personID'];
    $mathGrade = $_POST['mathGrade'];
    $physicsGrade = $_POST['physicsGrade'];
    $progGrade = $_POST['progGrade'];

    $arrayAux = new student($name, $personID, $mathGrade, $physicsGrade, $progGrade);
    array_push($arrayStudents, $arrayAux);
    $_SESSION['StudentData'] = $arrayStudents;
  } else {
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!--Metadata-->
  <meta name="author" content="Daniel Prieto" />
  <meta name="description" content="Ejercicio 2 de Programación web" />
  <meta name="keywords" content="" />
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!--Title-->
  <title>Ejercicio 2 | Daniel Prieto</title>
  <!--Boostrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />

  <style>
    /* Works for Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    /* Works for Firefox */
    input[type="number"] {
      -moz-appearance: textfield;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>Registro de Estudiantes</h1>
    <div>
      <h4>Ingrese los datos del estudiante:</h4>
      <form action="index.php" method="post">
        <div class="form-group">
          <div class="row">
            <div class="col">
              <label for="nameid">Nombre:</label>
              <input type="text" id="nameid" class="form-control" placeholder="nombre" name="name"
                pattern="[A-Za-z]{1,30}" />
            </div>
            <div class="col">
              <label for="personIDid">Cedula:</label>
              <input type="number" id="personIDid" class="form-control" placeholder="Cedula" name="personID"
                min="1000000" />
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col">
              <label for="mathGradeid">Nota de Matemáticas:</label>
              <input type="number" id="mathGradeid" class="form-control" name="mathGrade" min="0" max="20"
                placeholder="Ejemplo: 20" />
            </div>
            <div class="col">
              <label for="physicsGradeid">Nota de Física:</label>
              <input type="number" id="physicsGradeid" class="form-control" name="physicsGrade" min="0" max="20"
                placeholder="Ejemplo: 16" />
            </div>
            <div class="col">
              <label for="progGradeid">Nota de Programación:</label>
              <input type="number" id="progGradeid" class="form-control" name="progGrade" min="0" max="20"
                placeholder="Ejemplo: 2" />
            </div>
          </div>
        </div>

        <button type="submit" class="btn btn-primary" name="register">
          Registrar
        </button>
        <button type="submit" class="btn btn-danger" name="delete">
          Eliminar registros
        </button>

      </form>
    </div>
    <div class="tabla">
      <h4>Lista de empleados: </h4>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Cedula</th>
            <th scope="col">Nombre</th>
            <th scope="col">Nota de Matematicas</th>
            <th scope="col">Nota de Física</th>
            <th scope="col">Nota de Programación</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($arrayStudents as $student) {
            echo "<tr>";
            echo "<td>", $student->getStudentID(), "</td>";
            echo "<td>", $student->getStudentName(), "</td>";
            echo "<td>", $student->getStudentMathGrade(), "</td>";
            echo "<td>", $student->getStudentPhysicsGrade(), "</td>";
            echo "<td>", $student->getStudentProgGrade(), "</td>";
            echo "</tr>";

          }

          ?>
        </tbody>
      </table>
    </div>

    <div>
      <h4>
        Datos determinados:
      </h4>
      <div class="tabla">
        <table class="table">
          <thead>
            <tr>
              <th scope="col"></th>
              <th scope="col">Nota Promedio</th>
              <th scope="col">Estudiantes Aprobados</th>
              <th scope="col">Estudiantes Aplazados</th>
              <th scope="col">Nota Máxima</th>
            </tr>
          </thead>
          <tbody>

            <?php
            $SummMathGrade = 0;
            $AmountApproMath = 0;
            $AmountFailedMath = 0;
            $maxGradeMath = 0;

            $SummPhysicsGrade = 0;
            $AmountApproPhysics = 0;
            $AmountFailedPhysics = 0;
            $maxGradePhysics = 0;

            $SummProgGrade = 0;
            $AmountApproProg = 0;
            $AmountFailedProg = 0;
            $maxGradeProg = 0;

            foreach ($arrayStudents as $student) {
              $SummMathGrade += $student->getStudentMathGrade();
              $SummPhysicsGrade += $student->getStudentPhysicsGrade();
              $SummProgGrade += $student->getStudentProgGrade();

              if ($student->getStudentMathGrade() > 9) {
                $AmountApproMath += 1;
                $student->setApproMath();

              } else {
                $AmountFailedMath += 1;
              }

              if ($student->getStudentPhysicsGrade() > 9) {
                $AmountApproPhysics += 1;
                $student->setApproPhysics();

              } else {
                $AmountFailedPhysics += 1;
              }

              if ($student->getStudentProgGrade() > 9) {
                $AmountApproProg += 1;
                $student->setApproProg();

              } else {
                $AmountFailedProg += 1;
              }

              if ($student->getStudentMathGrade() > $maxGradeMath) {
                $maxGradeMath = $student->getStudentMathGrade();
              }

              if ($student->getStudentPhysicsGrade() > $maxGradePhysics) {
                $maxGradePhysics = $student->getStudentPhysicsGrade();
              }

              if ($student->getStudentProgGrade() > $maxGradeProg) {
                $maxGradeProg = $student->getStudentProgGrade();
              }

            }
            ?>

            <tr>
              <th scope="row">Matemáticas</th>
              <?php
              //math
              echo "<td>";
              try {
                echo $averageMath = $SummMathGrade / sizeof($arrayStudents);
              } catch (DivisionByZeroError) {
                echo "0";
              }
              echo "</td>";

              echo "<td>";
              echo $AmountApproMath;
              echo "</td>";

              echo "<td>";
              echo $AmountFailedMath;
              echo "</td>";

              echo "<td>";
              echo $maxGradeMath;
              echo "</td>";
              ?>
            </tr>

            <tr>
              <th scope="row">Física</th>
              <?php
              //physics
              echo "<td>";
              try {
                echo $averagePhysics = $SummPhysicsGrade / sizeof($arrayStudents);
              } catch (DivisionByZeroError) {
                echo "0";
              }
              echo "</td>";

              echo "<td>";
              echo $AmountApproPhysics;
              echo "</td>";

              echo "<td>";
              echo $AmountFailedPhysics;
              echo "</td>";

              echo "<td>";
              echo $maxGradePhysics;
              echo "</td>";
              ?>
            </tr>

            <tr>
              <th scope="row">Programación</th>
              <?php
              //prog
              echo "<td>";
              try {
                echo $averageProg = $SummProgGrade / sizeof($arrayStudents);
              } catch (DivisionByZeroError) {
                echo "0";
              }
              echo "</td>";

              echo "<td>";
              echo $AmountApproProg;
              echo "</td>";

              echo "<td>";
              echo $AmountFailedProg;
              echo "</td>";

              echo "<td>";
              echo $maxGradeProg;
              echo "</td>";
              ?>
            </tr>

          </tbody>
        </table>
      </div>
      <div class="tabla">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Estudiantes que aprovaron todo Promedio</th>
              <th scope="col">Estudiantes que solo aprobaron una(1) materia</th>
              <th scope="col">Estudiantes que solo aprobaron dos(2) materias</th>
            </tr>
          </thead>
          <tbody>

            <?php
            $AmountAll = 0;
            $AmountOne = 0;
            $AmountTwo = 0;

            foreach ($arrayStudents as $student) {
              if (($student->getApproMath() + $student->getApproPhysics() + $student->getApproProg()) == 3) {
                $AmountAll += 1;
              }
              if (($student->getApproMath() + $student->getApproPhysics() + $student->getApproProg()) == 1) {
                $AmountOne += 1;
              }
              if (($student->getApproMath() + $student->getApproPhysics() + $student->getApproProg()) == 2) {
                $AmountTwo += 1;
              }
            }
            ?>
            <tr>
              <?php
              echo "<td>";
              echo $AmountAll;
              echo "</td>";

              echo "<td>";
              echo $AmountOne;
              echo "</td>";

              echo "<td>";
              echo $AmountTwo;
              echo "</td>";
              ?>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!--Boostrap-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
</body>

</html>