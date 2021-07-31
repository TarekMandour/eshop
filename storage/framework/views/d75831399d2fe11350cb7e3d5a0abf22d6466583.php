<header>
	<div class="tt-color-scheme-01">
		<div class="container">
			<div class="tt-header-row tt-top-row">
				<div class="tt-col-left">
					<div class="tt-box-info">
						<ul>
							<li><i class="mdi mdi-whatsapp"></i> <?php echo e(sc_store('phone')); ?> </li>
							<li><i class="mdi mdi-email-outline"></i> <?php echo e(sc_store('email')); ?> </li>
						</ul>
					</div>
				</div>
				<div class="tt-col-right ml-auto">
					<ul class="tt-social-icon">
                        
                        <?php if(sc_store('facebook') != null): ?>
                            <li>
                                <a class="icon-g-64" target="_blank" href="<?php echo e(sc_store('facebook')); ?>"></a>
                            </li>
                            <?php endif; ?>
                            <?php if(sc_store('twitter') != null): ?>
                            <li>
                                <li><a class="icon-h-58" target="_blank" href="<?php echo e(sc_store('twitter')); ?>"></a></li>
                            </li>
                            <?php endif; ?>
                            <?php if(sc_store('youtube') != null): ?>
                            <li>
                                <li><a class="icon-g-76" target="_blank" href="<?php echo e(sc_store('youtube')); ?>"></a></li>
                            </li>
                            <?php endif; ?>
                            <?php if(sc_store('instagram') != null): ?>
                            <li>
                                <li><a class="icon-g-67" target="_blank" href="<?php echo e(sc_store('instagram')); ?>"></a></li>
                            </li>
                            <?php endif; ?>
                            <?php if(sc_store('snapchat') != null): ?>
                            <li>
                                <li><a class="mdi mdi-snapchat" target="_blank" href="<?php echo e(sc_store('snapchat')); ?>"></a></li>
                            </li>
                            <?php endif; ?>
                            <?php if(sc_store('linkedin') != null): ?>
                            <li>
                                <li><a class="icon-g-68" target="_blank" href="<?php echo e(sc_store('linkedin')); ?>"></a></li>
                            </li>
                        <?php endif; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- tt-mobile menu -->
	<nav class="panel-menu mobile-main-menu">
		<ul>
            <li><a href="<?php echo e(sc_route('home')); ?>"><?php echo e(trans('front.home')); ?></a></li>
            <?php if(!empty($sc_layoutsUrl['menu'])): ?>
                <?php $__currentLoopData = $sc_layoutsUrl['menu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($url->lang == app()->getLocale()): ?>
                    <?php if($url->parent_id == 0): ?>
                    <li>
                        <a <?php echo e(($url->target =='_blank')?'target=_blank':''); ?>

                            href="<?php echo e(sc_url_render($url->url)); ?>"><?php echo e(sc_language_render($url->name)); ?></a>
                            <?php if($url->submenu > 0): ?>
                                <ul>
                                    <?php $__currentLoopData = $sc_layoutsUrl['menu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $url_level2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($url_level2->lang == app()->getLocale()): ?>
                                            <?php if($url_level2->parent_id == $url->id): ?>
                                            <li><a href="<?php echo e(sc_url_render($url_level2->url)); ?>" <?php echo e(($url_level2->target =='_blank')?'target=_blank':''); ?>><?php echo e(sc_language_render($url_level2->name)); ?></a></li>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            <?php endif; ?>
                    </li>
                    <?php endif; ?>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
		</ul>
		<div class="mm-navbtn-names">
			<div class="mm-closebtn"><?php echo e(trans('admin.close')); ?></div>
			<div class="mm-backbtn">Back</div>
		</div>
	</nav>
	<?php 
	$categoriesTop = $modelCategory->start()->getCategoryTop()->getData(); 
	?>
	<?php if($categoriesTop->count()): ?>
	<nav class="panel-menu mobile-caterorie-menu">
		<ul>
			<?php $__currentLoopData = $categoriesTop; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<li>
				<a href="<?php echo e($category->getUrl()); ?>">
					<i class="mdi mdi-plus"></i>
					<span><?php echo e($category->title); ?></span>
				</a>
			</li>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</ul>
		<div class="mm-navbtn-names">
			<div class="mm-closebtn">Close</div>
			<div class="mm-backbtn">Back</div>
		</div>
	</nav>
	<?php endif; ?>
	<!-- tt-mobile-header -->
	<div class="tt-mobile-header">
		<div class="container-fluid">
			<div class="header-tel-info">
				<i class="icon-f-93"></i> <?php echo e(sc_store('phone')); ?>

			</div>
		</div>
		<div class="container-fluid tt-top-line">
			<div class="tt-header-row">
				<div class="tt-mobile-parent-menu">
					<div class="tt-menu-toggle stylization-02">
						<i class="icon-03"></i>
					</div>
				</div>
				<div class="tt-mobile-parent-menu-categories tt-parent-box">
					<button class="tt-categories-toggle">
						<i class="icon-categories"></i>
					</button>
				</div>
				<!-- search -->
				<div class="tt-mobile-parent-search tt-parent-box"></div>
				<!-- /search -->
				<!-- cart -->
				<div class="tt-mobile-parent-cart tt-parent-box"></div>
				<!-- /cart -->
				<!-- account -->
				<div class="tt-mobile-parent-account tt-parent-box"></div>
				<!-- /account -->
				<!-- currency -->
				<div class="tt-mobile-parent-multi tt-parent-box"></div>
				<!-- /currency -->
			</div>
		</div>
		<div class="container-fluid tt-top-line">
			<div class="row">
				<div class="tt-logo-container">
					<!-- mobile logo -->
					<a class="tt-logo tt-logo-alignment" href="<?php echo e(sc_route('home')); ?>"><img src="<?php echo e(sc_file(sc_store('logodk'))); ?>" alt="<?php echo e($title??sc_store('title')); ?>"></a>
					<!-- /mobile logo -->
				</div>
			</div>
		</div>
	</div>
	<!-- tt-desktop-header -->
	<div class="tt-desktop-header headerunderline">
		<div class="container">
			<div class="tt-header-holder">
				<div class="tt-col-obj tt-obj-logo">
					<!-- logo -->
                    <a class="tt-logo tt-logo-alignment" href="<?php echo e(sc_route('home')); ?>"><img src="<?php echo e(sc_file(sc_store('logodk'))); ?>" alt="<?php echo e($title??sc_store('title')); ?>"></a>
					<!-- /logo -->
				</div>
				<div class="tt-col-obj tt-obj-search-type2">
					<div class="tt-search-type2">
			 			<!-- tt-search -->
						<form action="<?php echo e(sc_route('search')); ?>" method="get" role="search">
							<i class="icon-f-85"></i>
							<input class="tt-search-input" type="search" name="keyword" placeholder="<?php echo e(trans('front.search_form.keyword')); ?>" aria-label="<?php echo e(trans('front.search_form.keyword')); ?>" autocomplete="off">
							<button type="submit" class="tt-btn-search"><?php echo e(trans('front.search_form.keyword')); ?></button>
							<div class="search-results" style="display: none;"></div>
						</form>
						<!-- /tt-search -->
					</div>
                </div>

				<div class="tt-col-obj obj-move-right">
					<div class="header-tel-info">
						<i class="icon-f-93"></i> <?php echo e(sc_store('long_phone')); ?>

					</div>
				</div>
			</div>
		</div>
		<div class="navMenu">
			<div class="container small-header">
				<div class="tt-header-holder">
					<?php 
						$categoriesTop = $modelCategory->start()->getCategoryTop()->getData(); 
					?>
					<?php if($categoriesTop->count()): ?>
					<div class="tt-col-obj tt-obj-menu-categories tt-desctop-parent-menu-categories">
						<div class="tt-menu-categories">
							<button class="tt-dropdown-toggle">
								CATEGORIES
							</button>
							<div class="tt-dropdown-menu">
								<nav>
									<ul>
										<?php $__currentLoopData = $categoriesTop; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<li>
											<a href="<?php echo e($category->getUrl()); ?>">
												<i class="mdi mdi-plus"></i>
												<span><?php echo e($category->title); ?></span>
											</a>
										</li>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</ul>
								</nav>
							</div>
						</div>
					</div>
					<?php endif; ?>
					<div class="tt-col-obj tt-obj-menu">
						<!-- tt-menu -->
						<div class="tt-desctop-parent-menu tt-parent-box">
							<div class="tt-desctop-menu">
								<nav>
									<ul>
										<li class="dropdown selected"><a href="<?php echo e(sc_route('home')); ?>"><?php echo e(trans('front.home')); ?></a></li>
										<?php if(!empty($sc_layoutsUrl['menu'])): ?>
											<?php $__currentLoopData = $sc_layoutsUrl['menu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<?php if($url->lang == app()->getLocale()): ?>
												<?php if($url->parent_id == 0): ?>
												<li class="dropdown tt-megamenu-col-01">
													<a <?php echo e(($url->target =='_blank')?'target=_blank':''); ?>

														href="<?php echo e(sc_url_render($url->url)); ?>"><?php echo e(sc_language_render($url->name)); ?></a>
														<?php if($url->submenu > 0): ?>
														<div class="dropdown-menu">
															<div class="row tt-col-list">
																<div class="col">
																	<ul class="tt-megamenu-submenu">
																		<?php $__currentLoopData = $sc_layoutsUrl['menu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $url_level2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																			<?php if($url_level2->lang == app()->getLocale()): ?>
																				<?php if($url_level2->parent_id == $url->id): ?>
																				<li><a href="<?php echo e(sc_url_render($url_level2->url)); ?>" <?php echo e(($url_level2->target =='_blank')?'target=_blank':''); ?>><?php echo e(sc_language_render($url_level2->name)); ?></a></li>
																				<?php endif; ?>
																			<?php endif; ?>
																		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																	</ul>
																</div>
															</div>
														</div>
														<?php endif; ?>
												</li>
												<?php endif; ?>
											<?php endif; ?>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<?php endif; ?>
	
									</ul>
								</nav>
							</div>
						</div>
						<!-- /tt-menu -->
					</div>
					<div class="tt-col-obj tt-obj-options obj-move-right">
						<!-- tt-search -->
						<div class="tt-desctop-parent-search tt-parent-box tt-obj-desktop-hidden">
							<div class="tt-search tt-dropdown-obj">
								<button class="tt-dropdown-toggle" data-tooltip="Search" data-tposition="bottom">
									<i class="icon-f-85"></i>
								</button>
								<div class="tt-dropdown-menu">
									<div class="container">
										<form action="<?php echo e(sc_route('search')); ?>" method="get" role="search">
											<div class="tt-col">
												<input type="text" class="tt-search-input" name="keyword" placeholder="<?php echo e(trans('front.search_form.keyword')); ?>">
												<button class="tt-btn-search" type="submit"></button>
											</div>
											<div class="tt-col">
												<button class="tt-btn-close icon-g-80"></button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
						<!-- /tt-search -->
						<!-- tt-cart -->
						<div class="tt-desctop-parent-cart tt-parent-box">
							<div class="tt-cart tt-dropdown-obj" data-tooltip="Cart" data-tposition="top">
								<button class="tt-dropdown-toggle">
									<i class="icon-f-39"></i>
									<span class="tt-badge-cart"><?php echo e(Cart::instance('default')->count()); ?></span>
								</button>
								<div class="tt-dropdown-menu">
									<div class="tt-mobile-add">
										<h6 class="tt-title">SHOPPING CART</h6>
										<button class="tt-close"><?php echo e(trans('admin.close')); ?></button>
									</div>
									<div class="tt-dropdown-inner">
										<div class="tt-cart-layout">
											<!-- layout emty cart -->
											<!-- <a href="empty-cart.html" class="tt-cart-empty">
												<i class="icon-f-39"></i>
												<p>No Products in the Cart</p>
											</a> -->
											<div class="tt-cart-content">
												<div class="tt-cart-list appcart">
	
	
												</div>
												<div class="tt-cart-total-row">
													<div class="tt-cart-total-title"><?php echo e(trans('cart.total_item')); ?>:</div>
													<div class="tt-cart-total-price sub_total_price"></div>
												</div>
												<div class="tt-cart-btn">
													<div class="tt-item">
														<a href="<?php echo e(sc_route('cart')); ?>" class="btn"><?php echo e(trans('front.cart_title')); ?></a>
													</div>
													<div class="tt-item">
														<a href="<?php echo e(sc_route('home')); ?>" class="btn-link-02 tt-hidden-mobile"><?php echo e(trans('cart.back_to_shop')); ?></a>
														<a href="<?php echo e(sc_route('home')); ?>" class="btn btn-border tt-hidden-desctope"><?php echo e(trans('cart.back_to_shop')); ?></a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- /tt-cart -->
						<!-- tt-account -->
						<div class="tt-desctop-parent-account tt-parent-box">
							<div class="tt-account tt-dropdown-obj">
								<button class="tt-dropdown-toggle"  data-tooltip="My Account" data-tposition="top"><i class="icon-f-94"></i></button>
								<div class="tt-dropdown-menu">
									<div class="tt-mobile-add">
										<button class="tt-close"><?php echo e(trans('admin.close')); ?></button>
									</div>
									<div class="tt-dropdown-inner">
										<ul>
											<?php if(!\Illuminate\Support\Facades\Auth::check()): ?>
												<li><a href="<?php echo e(route('login')); ?>"><i class="icon-f-76"></i><?php echo e(trans('account.login')); ?></a></li>
												<li><a href="<?php echo e(route('register')); ?>"><i class="icon-f-94"></i><?php echo e(trans('account.register')); ?></a></li>
											<?php endif; ?>
											<?php if(\Illuminate\Support\Facades\Auth::check()): ?>
												<li><a href="<?php echo e(sc_route('customer.index')); ?>"><i class="icon-f-94"></i><?php echo e(trans('front.my_profile')); ?></a></li>
												<li><a href="<?php echo e(sc_route('wishlist')); ?>"><i class="icon-n-072"></i><?php echo e(trans('front.wishlist')); ?></a></li>
												<li><a href="<?php echo e(sc_route('compare')); ?>"><i class="icon-n-08"></i><?php echo e(trans('front.compare')); ?></a></li>
												<li><a href="<?php echo e(route('logout')); ?>"><i class="icon-f-77"></i><?php echo e(trans('account.signup')); ?></a></li>
											<?php endif; ?>									    
										</ul>
									</div>
								</div>
							</div>
						</div>
						<!-- /tt-account -->
						<!-- tt-langue and tt-currency -->
						<div class="tt-desctop-parent-multi tt-parent-box">
							<div class="tt-multi-obj tt-dropdown-obj">
								<button class="tt-dropdown-toggle" data-tooltip="Settings" data-tposition="top"><i class="icon-f-79"></i></button>
								<div class="tt-dropdown-menu">
									<div class="tt-mobile-add">
										<button class="tt-close">Close</button>
									</div>
									<div class="tt-dropdown-inner">
										<?php if(count($sc_languages)>1): ?>
											<ul>
											<li class="active"><a href="#"><?php echo e($sc_languages[app()->getLocale()]['name']); ?></a></li>
												<?php $__currentLoopData = $sc_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<li <?php if($language['code'] ==  session('locale')): ?> style="display: none;" <?php endif; ?>>
														<a href="<?php echo e(sc_route('locale', ['code' => $key, 'layout_rtl' => $language['rtl']])); ?>"><?php echo e($language['name']); ?></a>
													</li>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</ul>
										<?php endif; ?>
										<?php if(count($sc_currencies)>1): ?>
											<ul>
												<li class="rd-nav-item">
													<li class="active"><a href="#"><i class="icon-h-59"></i> <?php echo e(sc_currency_info()['name']); ?></a></li>
													<?php $__currentLoopData = $sc_currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<li <?php if($currency->code ==  sc_currency_info()['code']): ?> style="display: none;" <?php endif; ?>>
															<a href="<?php echo e(sc_route('currency', ['code' => $currency->code])); ?>"><i class="icon-h-60"></i> <?php echo e($currency->name); ?></a>
														</li>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</li>
											</ul>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
						<!-- /tt-langue and tt-currency -->
					</div>
				</div>
			</div>
		</div>
		
	</div>
	<!-- /tt-desktop-header -->
	<!-- stuck nav -->
	<div class="tt-stuck-nav">
		<div class="container">
			<div class="tt-header-row ">
				<div class="tt-stuck-desctop-menu-categories"></div>
				<div class="tt-stuck-parent-menu"></div>
				<div class="tt-stuck-mobile-menu-categories"></div>
				<div class="tt-stuck-parent-search tt-parent-box"></div>
				<div class="tt-stuck-parent-cart tt-parent-box"></div>
				<div class="tt-stuck-parent-account tt-parent-box"></div>
				<div class="tt-stuck-parent-multi tt-parent-box"></div>
			</div>
		</div>
	</div>
</header><?php /**PATH C:\xampp7\htdocs\eshop\resources\views/templates/eshop/block_header.blade.php ENDPATH**/ ?>