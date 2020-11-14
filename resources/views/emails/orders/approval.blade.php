@component('mail::message')
# Introduction

This is test from {{auth()->user()->name}}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
