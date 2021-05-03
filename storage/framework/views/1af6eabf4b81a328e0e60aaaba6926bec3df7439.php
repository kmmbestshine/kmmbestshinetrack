<!DOCTYPE html>
<html lang="en">
<head>        
    <!-- META SECTION -->
    <title><?php echo $__env->yieldContent('title'); ?> - St Jame's Academy</title>       
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <link rel="icon" href="<?php echo e(url('users/img/st-james.jpg')); ?>" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" id="theme" href="<?php echo e(url('users/css/theme-default.css')); ?>"/>
    <link rel="stylesheet" type="text/css" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">
    <!-- EOF CSS INCLUDE -->                                    
</head>
