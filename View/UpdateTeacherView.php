<form style="text-align: center; width: 50%; margin: auto; bottom: 0;" method='post'>
    <div class='form-row'>
        <div class='form-group col-md-6'>
            <label for='TeacherName'>Teacher Name:</label>
            <input type='text' name='TeacherName' id='TeacherName' class='form-control' value=''>
        </div>
        <div class='form-group col-md-6'>
            <label for='ClassLocation'>Teacher Email:</label>
            <input type='text' name='TeacherEmail' id='TeacherEmail' class='form-control' value=''>
        </div>
        <div class='form-group col-md-6'>
            <div class='CN'>
                <select name='TeacherClass'>";
                    <?php foreach ( $classes as $class ):?>
                    <option value = <?php echo $class['class_id'] ?>>  <?php echo$class['class_name']?> </option>
                    <?php endforeach; ?> </select>
            </div>
        </div>
    </div>
    </div>
    <button type='submit' name='confirmTeacherUpdate' class='btn btn-primary'>Confirm</button>
</form>