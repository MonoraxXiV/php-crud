<form style="text-align: center; width: 50%; margin: auto; bottom: 0;" method='post'>
    <h4>Update Student ID: <?php echo $studentId ?></h4>
    <div class='form-row'>
        <div class='form-group col-md-6'>
            <label for='ClassName'>Student Name:</label>
            <input type='text' name='StudentName' id='StudentName' class='form-control' value='<?php echo $connection->profileStudent($studentId)['student_name'] ?>'>
        </div>
        <div class='form-group col-md-6'>
            <label for='ClassLocation'>Student Email:</label>
            <input type='text' name='StudentEmail' id='StudentEmail' class='form-control' value='<?php echo $connection->profileStudent($studentId)['student_email'] ?>'>
        </div>
        <div class='form-group col-md-6'>
            <div class='CN'>
                <select name='class' >";
                    <?php foreach ( $classes as $class ):?>
                    <option value = <?php echo $class['class_id'] ?>>  <?php echo$class['class_name']?> </option>
                    <?php endforeach; ?> </select>
            </div>
        </div>
    </div>
    </div>
    <button type='submit' name='confirmStudentUpdate' class='btn btn-primary'>Confirm</button>
</form>