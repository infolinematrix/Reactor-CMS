<?php if ($showLabel && $showField): ?>
<<<<<<< HEAD
    <?php if ($options['wrapper'] !== false): ?>
        <div <?= $options['wrapperAttrs'] ?> >
    <?php endif; ?>
<?php endif; ?>

<?php if ($showField): ?>
    <?= Form::radio($name, $options['value'], $options['checked'], $options['attr']) ?>

    <?php include 'help_block.php' ?>
<?php endif; ?>

<?php if ($showLabel && $options['label'] !== false && $options['label_show']): ?>
    <?php if ($options['is_child']): ?>
        <label <?= $options['labelAttrs'] ?>><?= $options['label'] ?></label>
    <?php else: ?>
        <?= Form::label($name, $options['label'], $options['label_attr']) ?>
    <?php endif; ?>
<?php endif; ?>

<?php include 'errors.php' ?>

<?php if ($showLabel && $showField): ?>
    <?php if ($options['wrapper'] !== false): ?>
        </div>
    <?php endif; ?>
<?php endif; ?>
=======
<?php if ($options['wrapper'] !== false): ?>
<div <?= $options['wrapperAttrs'] ?> >
    <?php endif; ?>
    <?php endif; ?>

    <?php if ($showField): ?>
        <?= Form::radio($name, $options['value'], $options['checked'], $options['attr']) ?>

        <?php include 'help_block.php' ?>
    <?php endif; ?>

    <?php if ($showLabel && $options['label'] !== false && $options['label_show']): ?>
        <?php if ($options['is_child']): ?>
            <label <?= $options['labelAttrs'] ?>><?= $options['label'] ?></label>
        <?php else: ?>
            <?= Form::label($name, $options['label'], $options['label_attr']) ?>
        <?php endif; ?>
    <?php endif; ?>

    <?php include 'errors.php' ?>

    <?php if ($showLabel && $showField): ?>
    <?php if ($options['wrapper'] !== false): ?>
</div>
<?php endif; ?>
<?php endif; ?>
>>>>>>> a55e7fb566919476f1352d59a4554173b8a1ae6c
