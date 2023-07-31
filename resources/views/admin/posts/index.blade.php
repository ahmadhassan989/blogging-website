<x-layout>
    <x-setting heading="Manage Posts">

        <ul>
            <li>
                <div class="bg-gray-100 cursor-pointer flex  justify-between p-3 rounded-md mb-3">
                    <div class="uppercase font-semibold"><p>title</p></div>
                    <div class="uppercase font-semibold"><p>action</p></div>
                </div>
            </li>
            @foreach ($posts as $post)
                <x-list-item :post="$post"/>
            @endforeach

        </ul>
    </x-setting>
</x-layout>
