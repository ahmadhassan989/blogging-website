@props(['comment'])
<div class="border border-gray-200 bg-gray-100 flex p-6 rounded-xl space-x-6 mb-3">
    <div class="flex-shrink-0">
        <img src="https://i.pravatar.cc./60?u={{$comment->user_id}}" alt="" height="60" width="60"
            class="rounded-2xl">
    </div>
    <div>
        <header class="mb-4">
            <h3 class="font-bold"> {{$comment->user->name}}</h3>
            <p class="text-xs">
                Posted
                <time class="text-xs">{{$comment->created_at->diffForHumans()}}</time>
            </p>
        </header>
        <p class="text-xs">
            {{$comment->body}}
        </p>
    </div>
</div>