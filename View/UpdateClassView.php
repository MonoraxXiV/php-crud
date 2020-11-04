<form style="text-align: center; width: 50%; margin: auto; bottom: 0;" method='post'>
    <h4>Update Class ID: <?php echo $classId ?></h4>
    <div class='form-row'>
        <div class='form-group col-md-6'>
            <label for='ClassName'>Class Name:</label>
            <input type='text' name='ClassName' id='ClassName' class='form-control' value='<?php echo $className['class_name'] ?>'>
        </div>
        <div class='form - group col - md - 6'>
            <label for='ClassLocation'>Class Location:</label>
            <input type='text' name='ClassLocation' id='ClassLocation' class='form-control' value='<?php echo $className['class_location'] ?>'>
        </div>
    </div>
    <button type='submit' name='confirmClassUpdate' class='btn btn-primary'>Confirm</button>
</form>
