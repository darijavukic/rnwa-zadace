<h1>Add new post</h1>

<?php
/** @var $data */
//print_r($data);
?>

<div class="container" style="display: flex; align-items: center; justify-content: center">
    <form action="posts" method="post">
        <div>
            <div class="col-25">
                <label for="aid">Autor</label>
            </div>
            <div class="col-75">
                <select id="aid" name="aid">
                    <option value="-1" selected disabled>Odaberite autora</option>
                    <?php foreach ($data['authors'] as $author): ?>
                    <option value="<?=$author->aid?>"><?=$author->fullname?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-25">
                <label for="pcontent">Sadržaj</label>
            </div>
            <div class="col-75">
                <textarea id="pcontent" name="pcontent" placeholder="Write something.." style="height:200px"></textarea>
            </div>
        </div>
        <br><br>
        <div class="row">
            <br><br>
            <input type="submit" value="Submit">
        </div>
    </form>
</div>