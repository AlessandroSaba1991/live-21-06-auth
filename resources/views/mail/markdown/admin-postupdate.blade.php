@component('mail::message')
# Introduction

Ciao Admin, il post {{$postTitle}} è stato modificato

@component('mail::button', ['url' => $postUrl])
Review Post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
