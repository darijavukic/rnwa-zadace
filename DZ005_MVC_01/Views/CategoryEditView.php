
<h1>Edit category</h1>

<div class="container">
    <form action="categores_update" method="post">
        <input type="hidden" name="gid" value="<?= $data['category']->category_id ?>">
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
            <label for="grpname">Naziv</label>
            <input type="text" class="form-control" name="category_name" value="<?= $data['category']->category_name ?>">
        </div>
        <br><br>
        <div class="row">
            <div class="col-25">
                <label for="grpinfo">Info</label>
            </div>
            <div class="col-75">
                <textarea id="category_info" name="category_info" placeholder="Informacije o kategoriji.." style="height:200px"><?= $data['category']->cateogry_info ?></textarea>
            </div>
        </div>
        <br><br>
        <div class="row">
            <label for="category_type">Tip</label>
            <input type="text" class="form-control" name="category_type" id="category_type" value="<?= $data['categorz']->category_type ?>">
        </div>
        <br><br>

        <div class="row">
            <br><br>
            <input type="submit" value="Submit">
        </div>
    </form>
</div>