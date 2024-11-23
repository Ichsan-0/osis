<!DOCTYPE html>
<html>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <link rel="shortcut icon" href="./assets/img/smp.png" />
    <link
      rel="apple-touch-icon"
      sizes="76x76"
      href="./assets/img/apple-icon.png"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/gh/creativetimofficial/tailwind-starter-kit/compiled-tailwind.min.css"
    />
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.tailwind.min.css" rel="stylesheet">

    <title>Admin Osis</title>
  </head>
  <body class="text-blueGray-700 antialiased">
    <noscript>You need to enable JavaScript to run this app.</noscript>
    <div id="root">
      @include('main.sidebar')
      <div class="relative md:ml-64 bg-blueGray-50">
        @include('main.header')
        <!-- Header -->
        <div class="relative bg-blue-600 {{ $showInfobox ? 'md:pt-32' : 'md:pt-30' }} pb-32 pt-12">
          @if ($showInfobox)
              @include('main.infobox')
          @endif
        </div>
        <div class="px-4 md:px-10 mx-auto w-full -m-24">
          @yield('content')
          @include('main.footer')
        </div>
      </div>
    </div>
    @include('main.script')
  </body>
</html>
