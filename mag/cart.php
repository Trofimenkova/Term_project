﻿<?php include("header.php"); ?>

	<nav id="menu">
		<div class="container">
			<div class="trigger"></div>
			<ul>
				<li><a href="index.php">Главная</a></li>
				<li><a href="products.php?page=1">Каталог</a></li>
				<li><a href="about.php">О магазине</a></li>
				<li><a href="dostavka.php">Оплата и доставка</a></li>
				<li><a href="contacts.php">Контакты</a></li>
			</ul>
		</div>
		<!-- / container -->
	</nav>
	<!-- / navigation -->

	<div id="breadcrumbs">
		<div class="container">
			<ul>
				<li><a href="#">Главная</a></li>
				<li>Корзина</li>
			</ul>
		</div>
		<!-- / container -->
	</div>
	<!-- / body -->

	<div id="body">
		<div class="container">
			<div id="content" class="full">
				<div class="cart-table">
					<table>
						<tr>
							<th class="items">Items</th>
							<th class="price">Price</th>
							<th class="qnt">Quantity</th>
							<th class="total">Total</th>
							<th class="delete"></th>
						</tr>
						<tr>
							<td class="items">
								<div class="image">
									<img src="images/6.jpg" alt="">
								</div>
								<h3><a href="#">Lorem ipsum dolor</a></h3>
								<p>Dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi.</p>
							</td>
							<td class="price">$1 350.00</td>
							<td class="qnt"><select><option>1</option><option>1</option></select></td>
							<td class="total">$1 350.00</td>
							<td class="delete"><a href="#" class="ico-del"></a></td>
						</tr>
						<tr>
							<td class="items">
								<div class="image">
									<img src="images/61.jpg" alt="">
								</div>
								<h3><a href="#">illum qui dolorem eum fugiat</a></h3>
								<p>Quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum.</p>
							</td>
							<td class="price">$2 100.00</td>
							<td class="qnt"><select><option>1</option><option>1</option></select></td>
							<td class="total">$2 100.00</td>
							<td class="delete"><a href="#" class="ico-del"></a></td>
						</tr>
						<tr>
							<td class="items">
								<div class="image">
									<img src="images/62.jpg" alt="">
								</div>
								<h3><a href="#">accusantium doloremque laudantium</a></h3>
								<p>Quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum.</p>
							</td>
							<td class="price">$1 050.00</td>
							<td class="qnt"><select><option>1</option><option>1</option></select></td>
							<td class="total">$1 050.00</td>
							<td class="delete"><a href="#" class="ico-del"></a></td>
						</tr>
					</table>
				</div>

				<div class="total-count">
					<h4>Subtotal: $4 500.00</h4>
					<p>+shippment: $30.00</p>
					<h3>Total to pay: <strong>$4 530.00</strong></h3>
					<a href="#" class="btn-grey">Finalize and pay</a>
				</div>
		
			</div>
			<!-- / content -->
		</div>
		<!-- / container -->
	</div>
	<!-- / body -->

	<footer id="footer">
		<div class="container">
			<div class="cols">
				<div class="col">
					<h3>Frequently Asked Questions</h3>
					<ul>
						<li><a href="#">Fusce eget dolor adipiscing </a></li>
						<li><a href="#">Posuere nisl eu venenatis gravida</a></li>
						<li><a href="#">Morbi dictum ligula mattis</a></li>
						<li><a href="#">Etiam diam vel dolor luctus dapibus</a></li>
						<li><a href="#">Vestibulum ultrices magna </a></li>
					</ul>
				</div>
				<div class="col media">
					<h3>Social media</h3>
					<ul class="social">
						<li><a href="#"><span class="ico ico-fb"></span>Facebook</a></li>
						<li><a href="#"><span class="ico ico-tw"></span>Twitter</a></li>
						<li><a href="#"><span class="ico ico-gp"></span>Google+</a></li>
						<li><a href="#"><span class="ico ico-pi"></span>Pinterest</a></li>
					</ul>
				</div>
				<div class="col contact">
					<h3>Contact us</h3>
					<p>Diana’s Jewelry INC.<br>54233 Avenue Street<br>New York</p>
					<p><span class="ico ico-em"></span><a href="#">contact@dianasjewelry.com</a></p>
					<p><span class="ico ico-ph"></span>(590) 423 446 924</p>
				</div>
				<div class="col newsletter">
					<h3>Join our newsletter</h3>
					<p>Sed ut perspiciatis unde omnis iste natus sit voluptatem accusantium doloremque laudantium.</p>
					<form action="#">
						<input type="text" placeholder="Your email address...">
						<button type="submit"></button>
					</form>
				</div>
			</div>
			<p class="copy">Copyright 2013 Jewelry. All rights reserved.</p>
		</div>
		<!-- / container -->
	</footer>
	<!-- / footer -->


	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script>window.jQuery || document.write("<script src='js/jquery-1.11.1.min.js'>\x3C/script>")</script>
	<script src="js/plugins.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
