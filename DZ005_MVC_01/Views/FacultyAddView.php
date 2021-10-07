<h1>Add new faculty</h1>

<?php
/** @var $data */
//print_r($data);
?>

<div class="container">
    <form action="faculties" method="post">
        <div class="row">
            <label for="faculty_name">Naziv</label>
            <input type="text" class="form-control" name="faculty_name">
        </div>
        <br><br>
        <div class="row">
            <br><br>
            <input type="submit" value="Submit">
        </div>
    </form>
</div>
