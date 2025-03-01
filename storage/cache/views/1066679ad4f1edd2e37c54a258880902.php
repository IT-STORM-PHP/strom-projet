<html>
<head>
    <title>Bienvenue</title>
</head>
<body>
    <h1>Bonjour, <?php echo e($username); ?>!</h1>
    <p>Ton email est : <?php echo e($email); ?></p>
    <h2>Liste des fruits :</h2>
    <ul>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fruit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($fruit); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    <?php if($number>12): ?>
        <p>
            <?php echo e($number); ?>

        </p>
    <?php else: ?>
        <p>
            Different
        </p>
    <?php endif; ?>
        <?php echo csrf_field(); ?>
    <!-- Lien vers la route nommée 'index.info' -->
    <a href="<?php echo e(route('user.index')); ?>">Aller à la page d'index</a>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</body>
</html>
<?php /**PATH /mnt/wwn-0x5000c5008073af77-part1/STORM_FRAMEWORK/usage/tests/storm/Views/index.blade.php ENDPATH**/ ?>