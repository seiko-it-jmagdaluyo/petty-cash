<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
		@include("partials._head")
		@yield("stylesheets")
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            @include("partials._header")
			@include("partials._topnav")
			@include("partials._leftnav")
			{{--  @include("partials._content-header")  --}}
			
				<!-- Content Wrapper. Contains page content -->
				<div class="content-wrapper" id="divcontent">
					@yield("content")
				</div>
				<!-- /.content-wrapper -->

			@include("partials._footer")	
			{{--  @include("partials._right-navbar")	  --}}
			@yield("javascripts")
        </div>
    </body>
</html>
