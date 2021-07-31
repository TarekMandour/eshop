<footer>
	<div class="tt-footer-default tt-color-scheme-02">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-9">
					<div class="tt-newsletter-layout-01">
						<div class="tt-newsletter">
							<div class="tt-mobile-collapse">
								<h4 class="tt-collapse-title">
									BE IN TOUCH WITH US:
								</h4>
								<div class="tt-collapse-content">
									<form class="form-inline form-default" method="post" action="<?php echo e(sc_route('subscribe')); ?>" novalidate="novalidate">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group">
											<input type="email" name="subscribe_email" class="form-control" placeholder="<?php echo e(trans('front.subscribe.subscribe_email')); ?>" required>
											<button type="submit" class="btn"><?php echo e(trans('front.subscribe.title')); ?></button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-auto">
					<ul class="tt-social-icon">
                        <?php if(sc_store('facebook') != null): ?>
                        <li>
                            <a class="icon-g-64" target="_blank" href="<?php echo e(sc_store('facebook')); ?>"></a>
                        </li>
                        <?php endif; ?>
                        <?php if(sc_store('twitter') != null): ?>
                        <li>
                            <a class="icon-h-58" target="_blank" href="<?php echo e(sc_store('twitter')); ?>"></a>
                        </li>
                        <?php endif; ?>
                        <?php if(sc_store('youtube') != null): ?>
                        <li>
                            <a class="icon-g-76" target="_blank" href="<?php echo e(sc_store('youtube')); ?>"></a>
                        </li>
                        <?php endif; ?>
                        <?php if(sc_store('instagram') != null): ?>
                        <li>
                            <a class="icon-g-67" target="_blank" href="<?php echo e(sc_store('instagram')); ?>"></a>
                        </li>
                        <?php endif; ?>
                        <?php if(sc_store('snapchat') != null): ?>
                        <li>
                            <a class="mdi mdi-snapchat" target="_blank" href="<?php echo e(sc_store('snapchat')); ?>"></a>
                        </li>
                        <?php endif; ?>
                        <?php if(sc_store('linkedin') != null): ?>
                        <li>
                            <a class="icon-g-68" target="_blank" href="<?php echo e(sc_store('linkedin')); ?>"></a>
                        </li>
                        <?php endif; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="tt-footer-col tt-color-scheme-01">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-2 col-xl-3">
					<div class="tt-mobile-collapse">
						<h4 class="tt-collapse-title">
							Information
						</h4>
						<div class="tt-collapse-content">
							<ul class="tt-list">
                                <?php if(!empty($sc_layoutsUrl['footer'])): ?>
                                <?php $__currentLoopData = $sc_layoutsUrl['footer']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a <?php echo e(($url->target =='_blank')?'target=_blank':''); ?>

                                        href="<?php echo e(sc_url_render($url->url)); ?>"><?php echo e(sc_language_render($url->name)); ?></a>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-2 col-xl-3">
					<div class="tt-mobile-collapse">
						<h4 class="tt-collapse-title">
							MY ACCOUNT
						</h4>
						<div class="tt-collapse-content">
							<ul class="tt-list">
                                <?php if(!\Illuminate\Support\Facades\Auth::check()): ?>
                                    <li><a href="<?php echo e(route('login')); ?>"><i class="icon-f-76"></i><?php echo e(trans('account.login')); ?></a></li>
                                    <li><a href="<?php echo e(route('register')); ?>"><i class="icon-f-94"></i><?php echo e(trans('account.register')); ?></a></li>
                                <?php endif; ?>
								<li><a href="<?php echo e(sc_route('customer.index')); ?>"> <i class="icon-f-94"></i> <?php echo e(trans('front.my_profile')); ?></a></li>
                                <li><a href="<?php echo e(sc_route('wishlist')); ?>"> <i class="icon-n-072"></i> <?php echo e(trans('front.wishlist')); ?></a></li>
                                <li><a href="<?php echo e(sc_route('compare')); ?>"> <i class="icon-n-08"></i> <?php echo e(trans('front.compare')); ?></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-4 col-xl-3">
					<div class="tt-mobile-collapse">
						<h4 class="tt-collapse-title">
							ABOUT
						</h4>
						<div class="tt-collapse-content">
							<p>
								<?php echo e($description??sc_store('description')); ?>

							</p>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-4 col-xl-3">
					<div class="tt-newsletter">
						<div class="tt-mobile-collapse">
							<h4 class="tt-collapse-title">
								CONTACTS
							</h4>
							<div class="tt-collapse-content">
								<address>
									<p><span>Address:</span> <?php echo e(sc_store('address')); ?></p>
                                    <p><span>Phone:</span> <?php echo e(sc_store('phone')); ?></p>
									<p><span>E-mail:</span> <a href="mailto:<?php echo e(sc_store('email')); ?>"><?php echo e(sc_store('email')); ?></a></p>
                                    <?php if(sc_store('time_active') != null): ?>
                                    <p><span>Hours:</span> <?php echo e(sc_store('time_active')); ?></p>
                                    <p><span>domain:</span> <?php echo e(sc_store('domain ')); ?></p>
                                    <?php endif; ?>
								</address>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="tt-footer-custom">
		<div class="container">
			<div class="tt-row">
				<div class="tt-col-left">
					<div class="tt-col-item tt-logo-col">
						<!-- logo -->
						<a class="tt-logo tt-logo-alignment" href="<?php echo e(sc_route('home')); ?>">
							<img  src="<?php echo e(sc_file(sc_store('logodk'))); ?>" alt="<?php echo e($title??sc_store('title')); ?>">
						</a>
						<!-- /logo -->
					</div>
					<div class="tt-col-item">
						<!-- copyright -->
						<div class="tt-box-copyright">
                            <a href="https:arabiacode.com/">Arabiacode.com</a> © <?php echo e(date('Y')); ?> copyright
						</div>
						<!-- /copyright -->
					</div>
				</div>
				<div class="tt-col-right">
					<div class="tt-col-item">
						<!-- payment-list -->
						<ul class="tt-payment-list">
							<li><a href="page404.html"><span class="icon-Stripe"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span>
			                </span></a></li>
							<li><a href="page404.html"> <span class="icon-paypal-2">
			                <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span>
			                </span></a></li>
							<li><a href="page404.html"><span class="icon-visa">
			                <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span>
			                </span></a></li>
							<li><a href="page404.html"><span class="icon-mastercard">
			                <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span>
			                </span></a></li>
							<li><a href="page404.html"><span class="icon-discover">
			                <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span><span class="path14"></span><span class="path15"></span><span class="path16"></span>
			                </span></a></li>
							<li><a href="page404.html"><span class="icon-american-express">
			                <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span>
			                </span></a></li>
						</ul>
						<!-- /payment-list -->
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
<a href="#" class="tt-back-to-top">BACK TO TOP</a>
<?php /**PATH C:\xampp7\htdocs\eshop\resources\views/templates/eshop/block_footer.blade.php ENDPATH**/ ?>