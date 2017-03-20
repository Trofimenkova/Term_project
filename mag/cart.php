<?php include("header.php"); ?>
<script>
window.onload = function() {
	for (var i = 0; i<localStorage.length; i++) {
	var key = localStorage.key(i);
	var value = JSON.parse(localStorage[key]);
	
	var korzina = document.getElementsByTagName("table")[0];
	var tr = document.createElement("tr");
	korzina.appendChild(tr);
	
	var td1 = document.createElement("td");
	td1.setAttribute("class", "items");
	td1.innerHTML = key;
	tr.appendChild(td1);
	
	var td2 = document.createElement("td");
	td2.setAttribute("class", "price");
	td2.innerHTML = value.price;
	tr.appendChild(td2);
	
	var td3 = document.createElement("td");
	td3.setAttribute("class", "qnt");
	tr.appendChild(td3);
	var input = document.createElement("input");
	input.setAttribute("type", "number");
	input.setAttribute("min", "0");
	input.setAttribute("max", value.total_amount);
	input.setAttribute("step", "1");
	input.setAttribute("value", value.amount);
	//td3.innerHTML = value.amount;
	td3.appendChild(input);
	
	var td4 = document.createElement("td");
	td4.setAttribute("class", "total");
	td4.innerHTML = (value.price * value.amount).toFixed(2);
	tr.appendChild(td4);
	
	var td5 = document.createElement("td");
	td5.setAttribute("class", "delete");
	tr.appendChild(td5);
	var a = document.createElement("a");
	a.setAttribute("class", "ico-del");
	a.setAttribute("href", "#");
	td5.appendChild(a);
	}
	
	var reset = document.createElement("tr");
	reset.setAttribute("colspan", "5");
	korzina.appendChild(reset);
	var button = document.createElement("button");
	button.innerHTML = "Очистить корзину";
	reset.appendChild(button);
	button.onclick = delete_localStorage;
}

function delete_localStorage() {
	localStorage.clear();
	location.reload();
}
</script>

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
							<th class="items">Товар</th>
							<th class="price">Цена, BYN</th>
							<th class="qnt">Количество, шт</th>
							<th class="total">Сумма, BYN</th>
							<th class="delete"></th>
						</tr>
						<!--<tr>
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
						</tr>-->
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
