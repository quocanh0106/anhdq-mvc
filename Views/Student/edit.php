<h1>Edit task</h1>
<form method='post' action='#'>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="name" placeholder="Enter a title" name="name" value ="<?php if (isset($student->name)) echo $student->name;?>" required>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" id="age" placeholder="Enter a description" name="age" value ="<?php if (isset($student->age)) echo $student->age;?>" required>
    </div>
    <button onclick="return confirmEdit()" type="submit" class="btn btn-primary">Submit</button>
</form>