<section class="secury">
	<div class="secury__container">
		<ul class="secury__list">
			<?php foreach ($arPesult['footer-items'] as $item) : ?>
				<li class="secury__item"><?php echo htmlspecialchars($item['name']) ?></li>
			<?php endforeach; ?>
		</ul>
	</div>
	<footer class="footer footer_bg">
		<div class="footer__container">
			<div class="footer__content">
				<div class="footer__logo footer__logo_1">
					<p class="footer__title"><?php echo htmlspecialchars($arPesult['logo']) ?></p>
					<p class="footer__text"><?php echo htmlspecialchars($arPesult['logo-text']) ?></p>
				</div>
				<div class="footer__items">
					<div class="footer__item item-footer">
						<h3 class="item-footer__title item-footer__title_nav"><?php echo htmlspecialchars($arPesult['menu-title']) ?></h3>
						<ul class="item-footer__lists">
							<?php foreach ($arPesult['menu'] as $item) : ?>
								<li class="item-footer__item"><a href="<?php echo htmlspecialchars($item['href']) ?>" class="item-footer__link item-footer__link_nav"><?php echo htmlspecialchars($item['item']) ?></a>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
					<div class="footer__item item-footer item-footer_2">
						<h3 class="item-footer__title"><?php echo htmlspecialchars($arPesult['contact-title']) ?></h3>
						<ul class="item-footer__lists">
							<?php foreach ($arPesult['contacts'] as $item) : ?>
								<li class="item-footer__item"><a href="#" class="item-footer__link"><?php echo htmlspecialchars($item['item']) ?></a></li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
				<button class="footer__btn footer__btn_3"><?php echo htmlspecialchars($arPesult['btnTitle']) ?></button>
			</div>
		</div>
	</footer>
</section>