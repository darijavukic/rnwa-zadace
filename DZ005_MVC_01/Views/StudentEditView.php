<h1>Edit student</h1>

<?php
/** @var $data */
//print_r($data);
?>

<div class="container">
    <form action="students_update" method="post">
        <input type="hidden" name="sid" value="<?= $data['student']->id ?>">
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
            <div class="col-25">
                <label for="aid">Fakultet</label>
            </div>
            <div class="col-75">
                <select id="fid" name="fid">
                    <option value="-1" selected disabled>Odaberite fakultet</option>
                    <?php foreach ($data['faculties'] as $faculty): ?>
                    <option value="<?=$faculty->id?>" <?= $faculty->id == $data['student']->fid ? 'selected' : '' ?>><?=$faculty->name?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <br><br>
        <div class="row">
            <label for="name">Ime</label>
            <input type="text" class="form-control" name="name" value="<?= $data['student']->name ?>">
        </div>
        <div class="row">
            <br><br>
            <input type="submit" value="Submit">
        </div>
    </form>
</div>
