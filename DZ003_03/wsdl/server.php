<?php
  if(!extension_loaded("soap")){
    dl("php_soap.dll");
  }
  $server = new SoapServer("students.wsdl");
  function returnStudent($id) {
    include('../db.php');
    $output = '';
    $query = "SELECT students.Name AS student_name, courses.Name AS course_name FROM students INNER JOIN students_courses ON students.StudentId = students_courses.Students_StudentId INNER JOIN courses ON courses.CourseId = students_courses.Courses_CourseId WHERE students.StudentId = $id";
    $result = mysqli_query($conn, $query);
    echo $result;
    if (mysqli_num_rows($result) > 0)
    {
      while ($row = mysqli_fetch_assoc($result)) {
        $output .= '
        <tr>
          <td>'.$row['student_name'].'</td>
          <td>'.$row['course_name'].'</td>
        </tr>
        ';
      }
      return $output;
    } else {
      return "empty";
    }
  }

  
  $server->addFunction('returnStudent');
  $server->handle();
?>