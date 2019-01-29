<div class="box-body">
    <?php echo form_start($form); ?>


    <?php echo form_rest($form); ?>

</div>

<div class="box-footer">
    <button type="submit" class="btn btn-action btn-black">
        <i class="fa fa-save"></i><?php echo __('Save'); ?>

    </button>
</div>

<?php echo form_end($form); ?>