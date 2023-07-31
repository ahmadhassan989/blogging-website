<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-xl mx-auto mt-10 bg-gray-100 p-6 border border-gray-200">
            <h1 class="text-center text-xl font-bold">Login!</h1>
            <form action="/login" method="post">
                @csrf

                <div class="mb-6">
                    <label for="email" class="block uppercase font-bold text-xs text-gray-700 mb-2">email</label>
                    <input type="email" class="border border-gray-400 w-full p-2" name="email" value="{{old('username')}}" id="">
                    @error('email')
                    <p class="text-xs text-red-500 py-1" >{{$message}}</p>
                @enderror
                </div>
                <div class="mb-6">
                    <label for="password" class="block uppercase font-bold text-xs text-gray-700 mb-2">password</label>
                    <input type="password" class="border border-gray-400 w-full p-2" name="password" value="{{old('password')}}" id="">
                    @error('password')
                    <p class="text-xs text-red-500 py-1" >{{$message}}</p>
                @enderror
                </div>
                <div class="mb-6">
                    <button type="submit" class="bg-blue-400 p-2 rounded text-white px-4 hover:bg-blue-600">
                        Login
                    </button>
                </div>
            </form>
        </main>
    </section>
</x-layout>
