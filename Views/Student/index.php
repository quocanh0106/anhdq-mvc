<h1>Students</h1>
<div class="row col-md-12 centered">
    <table class="table table-striped custab">
        <thead>
        <a href="/mvc/student/create/" class="btn btn-primary btn-xs pull-right"><b>+</b> Add new student</a>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th class="text-center">Action</th>
        </tr>
        </thead>
        <?php

        foreach ($students as $student)
        {
            echo '<tr>';
            echo "<td>" . $student->id . "</td>";
            echo "<td>" . $student->name . "</td>";
            echo "<td>" . $student->age . "</td>";
            echo "<td class='text-center'>
                    <a class='btn btn-info btn-xs' href='/mvc/student/edit/" . $student->id . "' ><span class='glyphicon glyphicon-edit'></span> Edit</a>
                    <a href='/mvc/student/delete/" . $student->id . "' class='btn btn-danger btn-xs'  onclick=\"return confirm('Are you sure you want to delete this student')\"><span class='glyphicon glyphicon-remove'></span> Del</a>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>