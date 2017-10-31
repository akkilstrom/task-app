{{--  https://laravel-news.com/laravel-markdown-emails  --}}
@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{--  Change name in the app config file  --}}
{{ config('app.name') }}
@endcomponent

{{--  To customize these components you'll have to publish these ->
php artisan vendor:publish --tag=laravel-mail 

--}}
