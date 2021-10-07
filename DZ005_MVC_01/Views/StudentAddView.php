<h1>Add new student</h1>

<?php
/** @var $data */
//print_r($data);
?>

<div class="container" style="display: flex; align-items: center; justify-content: center">
    <form action="students" method="post">
        <div>
            <div class="col-25">
                <label for="aid">Fakultet</label>
            </div>
            <div class="col-75">
                <select id="fid" name="fid">
                    <option value="-1" selected disabled>Odaberite fakultet</option>
                    <?php foreach ($data['faculties'] as $faculty): ?>
                    <option value="<?=$faculty->id?>"><?=$faculty->name?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-25">
                <label for="name">Ime</label>
            </div>
            <div class="col-75">
                <input type="text" class="form-control" name="name">
            </div>
        </div>
        <br><br>
        <div class="row">
            <br><br>
            <input type="submit" value="Submit">
        </div>
    </form>
</div>
