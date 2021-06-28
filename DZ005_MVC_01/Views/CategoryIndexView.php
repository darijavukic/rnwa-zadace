<h1>Categories</h1>

<?php
/** @var $data */
//print_r($data);
?>

<div style="overflow-x:auto;">
    <table class="table">
        <tr>
            <th>#</th>
            <th>Ime</th>
            <th>Info</th>
            <th>Tip</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($data['categories'] as $row): ?>
            <tr>
                <td><?php echo $row->category_id ?></td>
                <td><?php echo $row->category_name ?></td>
                <td><?php echo $row->category_info ?></td>
                <td><?php echo $row->category_type ?></td>
                <td><a href="categories_edit?category_id=<?php echo $row->category_id ?>" class="btn btn-primary btn-xs"> Edit</a>
                </td>
                <td>
                    <form action="categories_delete" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="category_id" value="<?= $row->category_id ?>">
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</div>


