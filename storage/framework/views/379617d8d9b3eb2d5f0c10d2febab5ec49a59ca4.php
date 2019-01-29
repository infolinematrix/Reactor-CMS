<?php echo field_wrapper_open($options, $name, $errors); ?>


<div class="form-group">
    <?php echo field_label($showLabel, $options, $name, $errors); ?>

    <?php echo field_errors($errors, $name); ?>

    <?php echo Form::input($type, $name, $options['value'], $options['attr']); ?>

    <?php echo field_help_block($name, $options); ?>

</div>


<?php echo field_wrapper_close($options); ?>