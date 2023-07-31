@props(['href','title','active'=>false,])

@php
    $class="block text-left px-3 text-sm leading-5 hover:bg-blue-500 focus:bg-blue-500 w-full";
    if($active) $class .= "text-white bg-blue-500";
@endphp
<a href="{{$href}}"
    {{$attributes(['class'=>$class])}}
>{{ ucwords($title) }}</a>
