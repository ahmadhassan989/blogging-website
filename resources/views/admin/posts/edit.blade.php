<x-layout>
    <x-setting heading="Update Post: {{$post->title}}">
        <form action="/admin/posts/{{$post->id}}/update" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <x-form.input name="title" :value="old('title',$post->title)"/>
            <x-form.input name="thumbnail" type="file" :value="$post->thumbnail"/>
            <x-form.textarea name="body">{{old('body',$post->body)}} </x-form.textarea>

            <x-submit-button>Publish</x-submit-button>
        </form>
    </x-setting>
</x-layout>
