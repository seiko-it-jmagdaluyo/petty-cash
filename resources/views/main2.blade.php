<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include("partials-complete._head")
        @include("partials-complete._stylesheets")
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            @include("partials-complete._header")
			@include("partials-complete._topnav")
			@include("partials-complete._leftnav")
			@include("partials-complete._content-header")
			
				<!-- Content Wrapper. Contains page content -->
				<div class="content-wrapper">
					@yield("content")
				</div>
				<!-- /.content-wrapper -->

			@include("partials-complete._footer")	
			@include("partials-complete._right-navbar")	
			@include("partials-complete._javascripts")	
        </div>
            
        
    </body>
</html>
