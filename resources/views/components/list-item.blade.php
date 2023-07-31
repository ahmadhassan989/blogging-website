@props(['post'])
<li>
    <div class="bg-gray-100 cursor-pointer flex hover:bg-gray-150 justify-between p-3 rounded-md mb-3">
        <p>{{Str::limit($post->title,35)}}</p>
        <div><a href="/admin/posts/{{$post->id}}/edit" class="hover:text-blue-500 text-blue-400 text-sm">Edit</a>
            <a href="" class="hover:text-red-500 text-red-400 text-sm">Delete</a>
        </div>
    </div>
</li>
