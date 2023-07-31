@props(['heading'])
<section class="px-6 py-8 max-w-2xl mx-auto">
    <h1 class="border-b-2 font-bold mb-6 pb-3 text-lg">{{$heading}}</h1>
        <div class="flex">
            <aside class="flex-shrink-0 w-40">
                <h4 class="font-semibold mb-2">Links</h4>
                <ul>
                    <li>    
                        <a href="/admin/posts" class="{{request()->is('admin/posts') ? 'text-blue-500' : ''}}">All Posts</a>
                    </li>
                    <li>
                        <a href="/admin/posts/create" class="{{request()->is('admin/posts/create') ? 'text-blue-500' : ''}}">Create new post</a>
                    </li>
                </ul>
            </aside>
            <main class="flex-1">
                <x-panel class="">
                    {{$slot}}
                </x-panel>
            </main>
        </div>
</section>
