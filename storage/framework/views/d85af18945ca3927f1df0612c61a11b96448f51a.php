<?php echo field_wrapper_open($options, $name, $errors, 'form-group--slug'); ?>


<div class="form-group-column form-group-column--<?php echo e(array_get($options, 'fullWidth', false) ? 'full' : 'field'); ?> ">
    <?php echo field_label($showLabel, $options, $name, $errors); ?>


    <?php echo Form::text($name, $options['value'], $options['attr']); ?>


    <?php echo field_errors($errors, $name); ?>


</div><?php echo field_help_block($name, $options); ?>


<?php echo field_wrapper_close($options); ?>