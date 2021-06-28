<h1>Add new group</h1>

<?php
/** @var $data */
//print_r($data);
?>

<div class="container">
    <form action="groups" method="post">
        <div class="row">
            <label for="category_name">Naziv</label>
            <input type="text" class="form-control" name="category_name">
        </div>
        <br><br>
        <div class="row">
            <div class="col-25">
                <label for="category_info">Info</label>
            </div>
            <div class="col-75">
                <textarea id="category_info" name="category_info" placeholder="Write something.." style="height:200px"></textarea>
            </div>
        </div>
        <br><br>
        <div class="row">
            <label for="category_type">Tip</label>
            <input type="text" class="form-control" name="category_type" id="category_type">
        </div>
        <br><br>
        <div class="row">
            <br><br>
            <input type="submit" value="Submit">
        </div>
    </form>
</div>