<?php $__env->startSection('content'); ?>
<section class="banner-area relative" id="home">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="2000">
    <ol class="carousel-indicators">
    <?php $__currentLoopData = $banner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banne): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo e($loop->index); ?>" class="<?php echo e($loop->first ? 'active':''); ?>"></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ol>
    <div class="carousel-inner">
    <?php $__currentLoopData = $banner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banne): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="carousel-item <?php echo e($loop->first ? 'active':''); ?>">
        <?php $__currentLoopData = $banne->files()->where('zone','Image_baner')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <img class="d-block w-100" src="<?php echo e($file->path); ?>" alt="First slide">
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    </div>
</section>
    <!-- End banner Area -->

    <!-- Start category Area -->
    <section class="category-area section-gap section-gap" id="catagory">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-40">
                    <div class="title text-center">
                        <h1 class="mb-10">Featured Products</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php $__currentLoopData = $featured; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fea): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 col-md-6 single-product">
                    <div class="content">
                        <a title="View detail product" href="<?php echo e(route('product.detail', [$fea->slug])); ?>"><div class="content-myoverlay"></div></a>
                        <?php $__currentLoopData = $fea->files()->where('zone','Hình ảnh')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $files): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <img class="content-image img-fluid d-block mx-auto" src="<?php echo e($files->path); ?>" alt="">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="price">
                        <h5><a title="View detail product" class="name-products" href="<?php echo e(route('product.detail',$fea->slug)); ?>" ><?php echo e($fea->name); ?></a></h5>
                        <?php if($fea->price_discount == '0'): ?>
                            <h3>$ <?php echo e(number_format($fea->price)); ?></h3>
                        <?php else: ?>
                            <del style="color:black;">$ <?php echo e(number_format($fea->price)); ?></del>
                            <h3>$ <?php echo e(number_format($fea->price_discount)); ?></h3>
                        <?php endif; ?>
                    </div>
                </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
    <!-- End category Area -->

    <!-- Start men-product Area -->
    <section class="men-product-area section-gap relative" id="men">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-40">
                    <div class="title text-center">
                        <h1 class="text-white mb-10">New realeased Products for Men</h1>
</div>
                </div>
            </div>
            <div class="row">
                <?php $__currentLoopData = $men; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($m->status == '1'): ?>
                <div class="col-lg-3 col-md-6 single-product">
                    <div class="content">
                        <a title="View detail product" href="<?php echo e(route('product.detail', [$m->slug])); ?>"><div class="content-overlay"></div></a>
                        <?php $__currentLoopData = $m->files()->where('zone','Hình Ảnh')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filemen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <img class="content-image img-fluid d-block mx-auto xx" src="<?php echo e($filemen->path); ?>" alt="">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="price">
                        <h5 class="text-white"><a title="View detail product" style="color: white" href="<?php echo e(route('product.detail',$m->slug)); ?>"><?php echo e($m->name); ?></a></h5>
                        <?php if($m->price_discount == '0'): ?>
                        <h3 class="text-white">$ <?php echo e(number_format($m->price)); ?></h3>
                        <?php else: ?>
                            <del class="text-white">$ <?php echo e(number_format($m->price)); ?></del>
                            <h3 class="text-white">$ <?php echo e(number_format($m->price_discount)); ?></h3>
                            <?php endif; ?>
                    </div>
                </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
    <!-- End men-product Area -->

    <!-- Start women-product Area -->
    <section class="women-product-area section-gap" id="women">
        <div class="container">
            <div class="countdown-content pb-40">
                <div class="title text-center">
                    <h1 class="mb-10">New realeased Products for Women</h1>
                </div>
            </div>
            <div class="row">
                <?php $__currentLoopData = $women; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $w): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($w->status == '1'): ?>
                <div class="col-lg-3 col-md-6 single-product">
                    <div class="content">
                        <a title="View detail" class="name-products" href="<?php echo e(route('product.detail',$w->slug)); ?>"><div class="content-overlay"></div></a>
                        <?php $__currentLoopData = $w->files()->where('zone','Hình Ảnh')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filewomen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <img class="content-image img-fluid d-block mx-auto" src="<?php echo e($filewomen->path); ?>" alt="">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="price">
                        <h5><a title="View detail" class="name-products" href="<?php echo e(route('product.detail',$w->slug)); ?>"><?php echo e($w->name); ?></a></h5>
                        <?php if($w->price_discount == '0'): ?>
                        <h3>$ <?php echo e(number_format($w->price)); ?></h3>
                            <?php else: ?>
                            <del style="color:black;">$ <?php echo e(number_format($w->price)); ?></del>
                            <h3>$ <?php echo e(number_format($w->price_discount)); ?></h3>
                            <?php endif; ?>
                    </div>
                </div>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
    <!-- End women-product Area -->

    <!-- Start Count Down Area -->
    <!-- End Count Down Area -->

    <!-- Start related-product Area -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>