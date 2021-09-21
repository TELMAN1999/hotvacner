<?php $__env->startSection('titles'); ?> Փոփոխել <?php $__env->stopSection(); ?>
<?php $__env->startSection('shablon'); ?>
<form method="post" action="">
    <?php echo csrf_field(); ?>
    <input pattern=".+" required type="text" name="Article_title" id="Article_title" placeholder="Հոդվածի վերնագիր"><br>
    <textarea min="3" required type="text" name="Article" id="Article" placeholder="Հոդված"></textarea><br>
    <input pattern=".+" required type="text" name="Author" id="Author" placeholder="Հեղինակ"><br>
    <input type="number" min="1901" max="2021" step="1" value="2021" name="Year" id="Year" placeholder="Գրման թվականը"><br>
    <button type="submit"> Փոփոխել </button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('html', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hotvac\laravel\resources\views/edit.blade.php ENDPATH**/ ?>