<!DOCTYPE HTML>
<!--
	Traveler by freehtml5.co
	Twitter: http://twitter.com/fh5co
	URL: http://freehtml5.co
-->
<html>

@include('client.shared.header')

<body>
	<div class="gtco-loader"></div>

	<div id="page">
		@include('client.shared.menu')
		@include('client.shared.header-banner')
		@yield('content')

		{{-- @include('client.shared.six-component') --}}
		{{-- @include('client.shared.how-to-register') --}}
		{{-- @include('client.shared.thank') --}}
		{{-- @include('client.shared.count-container') --}}
		@include('client.shared.subscribe')
		@include('client.shared.footer-info')
		@include('client.shared.back-top')
		@include('client.shared.script')
	</div>
</body>

</html>