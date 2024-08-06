<!DOCTYPE HTML>
<meta name="viewport" content="width=device-width, initial-scale=1">
<html lang = "{{ session('locale' ?? 'en') }}">
<head profile="https://weaverschool.com/profile">
    <x-app.scripts-head/>
    <link rel="icon"
          type="image/svg"
          href="{{config('app.favicon')}}">
    <title>{{ $title ?? env('APP_NAME') }}</title>
    <meta charset = "UTF-8" />
    <meta name="description" content="{{ $description ?? env('APP_NAME' ) }}"/>
    <x-app.schema/>
    <x-app.gtm-head/>
</head>
<body>
<x-app.gtm-body/>
<x-app.styles/>
<div id="app">
    <x-alerts.success>
    </x-alerts.success>
    {{ $slot }}
</div>
<x-app.scripts-body/>
</body>
</html>
