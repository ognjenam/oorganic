







	<!-- Footer -->
	<footer class="bg12">
		<div class="container">
			<div  class="wrap-footer flex-w p-t-60 p-b-62">
				<div class="footer-col1">
					<div class="footer_info">
						<div class="footer-col-title">
							<a id='logo_link' href="{{url('/home')}}">
								<img id='logo_footer' src="{{asset('main/images/oorganic_logo.png')}}" alt="LOGO">
							</a>
						</div>




					<p class="txt-s-101 cl6 size-w-10 p-b-16">
						We try our best to answer all enquiries on the day and all out-of-hours messages by the next business day.
					</p>

					<ul>
						<li class="txt-s-101 cl6 flex-t p-b-10">
							<span class="size-w-11">
								<i class="fas fa-envelope"></i>
							</span>

							<span class="size-w-12 p-t-1">
								oorganicfoodshop@gmail.com
							</span>
						</li>

						<li class="txt-s-101 cl6 flex-t p-b-10">
							<span class="size-w-11">
								<i class="fas fa-map-pin"></i>
							</span>

							<span class="size-w-12 p-t-1">
								No 40 Baria Sreet 133/2, NewYork
							</span>
						</li>

						<li class="txt-s-101 cl6 flex-t p-b-10">
							<span class="size-w-11">
								<i class="fas fa-phone"></i>
							</span>

							<span class="size-w-12 p-t-1">
								(455) 973 5267
							</span>
						</li>
					</ul>
				</div>
				</div>






			</div>

			<div class="flex-w flex-sb-m bo-t-1 bocl14 p-tb-14">
				<span class="txt-s-101 cl9 p-tb-10 p-r-29">
					Copyright © {{date('Y')}} <a class='cl9' target='_blank' href="https://www.linkedin.com/in/ognjenam/">Ognjena</a>. All rights reserved.
				</span>


			</div>
		</div>
	</footer>


	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fas fa-arrow-up"></i>
		</span>
	</div>



<!--===============================================================================================-->

	<script src="{{asset('main/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('main/js/effects.js')}}"></script>
<!--===============================================================================================-->
	<!-- <script src="vendor/animsition/js/animsition.min.js"></script> -->
<!--===============================================================================================-->
	<!-- <script src="vendor/bootstrap/js/popper.js"></script> -->
	<!-- <script src="vendor/bootstrap/js/bootstrap.min.js"></script> -->
<!--===============================================================================================-->
	<script src="{{asset('main/vendor/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
	<script src="{{asset('main/vendor/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
	<!-- <script src="vendor/revolution/js/extensions/revolution.extension.video.min.js"></script> -->
	<!-- <script src="vendor/revolution/js/extensions/revolution.extension.carousel.min.js"></script> -->
	<!-- <script src="vendor/revolution/js/extensions/revolution.extension.slideanims.min.js"></script> -->
	<!-- <script src="vendor/revolution/js/extensions/revolution.extension.actions.min.js"></script> -->
	<!-- <script src="vendor/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script> -->
	<!-- <script src="vendor/revolution/js/extensions/revolution.extension.kenburn.min.js"></script> -->
	<!-- <script src="vendor/revolution/js/extensions/revolution.extension.navigation.min.js"></script> -->
	<!-- <script src="vendor/revolution/js/extensions/revolution.extension.migration.min.js"></script> -->
	<!-- <script src="vendor/revolution/js/extensions/revolution.extension.parallax.min.js"></script> -->
	<script src="{{asset('main/js/revo-custom.js')}}"></script>
<!--===============================================================================================-->
	<!-- <script src="vendor/select2/select2.min.js"></script> -->
<!--===============================================================================================-->
	<!-- <script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script> -->
<!--===============================================================================================-->
	<!-- <script src="vendor/slick/slick.min.js"></script>
	 <script src="js/slick-custom.js"></script> -->
<!--===============================================================================================-->
	<!-- <script src="vendor/parallax100/parallax100.js"></script> -->
<!--===============================================================================================-->
	<!-- <script src="vendor/lightbox2/js/lightbox.min.js"></script> -->
<!--===============================================================================================-->
	<!-- <script src="vendor/isotope/isotope.pkgd.min.js"></script>  -->
<!--===============================================================================================-->
	<!-- <script src="vendor/sweetalert/sweetalert.min.js"></script> -->
<!--===============================================================================================-->
	<!-- <script src="vendor/countdowntime/moment.min.js"></script>
	<script src="vendor/countdowntime/moment-timezone.min.js"></script>
	<script src="vendor/countdowntime/moment-timezone-with-data.min.js"></script>
	<script src="vendor/countdowntime/jquery.countdown.min.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script> -->
<!--===============================================================================================-->
	<!-- <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script> -->
<!--===============================================================================================-->

<script type='text/javascript'>
var url_filterProductsByCategory = "{{ route('filterProductsByCategory') }}";
var url_updateUser = "{{ route('updateUser') }}";
var url_searchProduct = " {{route('searchProductByName')}}";
var url_contactForm = "{{route('contactForm')}}";
var url_addToCart = "{{route('addToCart')}}";
var url_removeFromCart = "{{route('removeFromCart')}}";
var url_checkout = "{{route('checkout')}}";
var url_finalCheckout = "{{route('finalCheckout')}}"



</script>
<script src="{{asset('main/js/main.js')}}"></script>

</body>
</html>
