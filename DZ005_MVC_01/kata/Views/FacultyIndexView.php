<h1>Posts</h1>

<div style="overflow-x:auto;">
    <table class="table">
        <tr>
            <th>#</th>
            <th>Naziv</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($data['faculties'] as $row): ?>
            <tr>
                <td><?php echo $row->id ?></td>
                <td><?php echo $row->name ?></td>
                <td><a href="faculties_edit?faculty_id=<?php echo $row->id ?>" class="btn btn-primary btn-xs"> Edit</a>
                </td>
                <td>
                    <form action="faculties_delete" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="faculty_id" value="<?= $row->id ?>">
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</div>


