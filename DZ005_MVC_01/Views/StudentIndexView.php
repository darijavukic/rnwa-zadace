<h1>Students</h1>

<div style="overflow-x:auto;">
    <table class="table">
        <tr>
            <th>#</th>
            <th>Ime</th>
            <th>Fakultet</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($data['students'] as $row): ?>
            <tr>
                <td><?php echo $row->id ?></td>
                <td><?php echo $row->name ?></td>
                <td><?php echo $row->faculty_name ?></td>
                <td><a href="students_edit?student_id=<?php echo $row->id ?>" class="btn btn-primary btn-xs"> Edit</a>
                </td>
                <td>
                    <form action="students_delete" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="student_id" value="<?= $row->student_id ?>">
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</div>


