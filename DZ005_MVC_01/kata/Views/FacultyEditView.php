<h1>Edit faculty</h1>

<div class="container">
    <form action="faculties_update" method="post">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="fid" value="<?= $data['faculty']->id ?>">
        <div class="row">
            <label for="name">Naziv</label>
            <input type="text" class="form-control" name="name" value="<?= $data['faculty']->name ?>">
        </div>
        <br><br>
        <div class="row">
            <br><br>
            <input type="submit" value="Submit">
        </div>
    </form>
</div>
