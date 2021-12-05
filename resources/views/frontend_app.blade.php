<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="csrf-token" value="{{ csrf_token() }}"/>
   <title>Frontend Vue Example</title>

   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
   
    @include('frontend.includes.style')
    
</head>

<body data-new-gr-c-s-check-loaded="14.1040.0" data-gr-ext-installed="" class="loaded">
   <div class="page-wrapper">
      @include('frontend.includes.header')
      <div id="app" class="d-flex flex-column flex-root">
      </div>
      @include('frontend.includes.footer')
   </div>


    
   @include('frontend.includes.script')
   <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
</body>
</html>