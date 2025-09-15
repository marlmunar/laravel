{{-- @extends('layout')
@section('main') --}}
<x-layout title="Home Page">
    <h1 class="page-title">Home Page Test</h1>

    @auth
        <div class="flex items-center gap-2 py-2">
            <p class="text-sm">You are now logged in</p>
            <form action="/logout" method="POST">
                @csrf
                <button class="bg-gray-700 text-white p-1 px-2 rounded">Log Out</button>
            </form>
        </div>

        <div class="flex gap-4">
            <section class="form-container w-[30%]">
                <h2 class="form-header">Create a Post</h2>
                <form action="/create-post" method="POST" class="flex flex-col gap-2">
                    @csrf
                    <div class="flex flex-col gap-1 *:border-gray-200 *:bg-gray-100 *:p-1 *:border *:rounded *:text-sm">
                        <input type="text" name="title" placeholder="Your Post Title" />
                        <textarea name="body" placeholder="Your Post Content"></textarea>
                    </div>
                    <button class="form-btn">Save Post</button>
                </form>
            </section>
            <section class="w-full bg-gray-200 rounded p-2">
                <h2 class="text-3xl font-semibold mb-4">Your Posts</h2>
                @foreach ($posts as $post)
                    <div class="p-2 bg-gray-100 rounded mb-2 w-full space-y-2">
                        <h3 class="text-xl">{{ $post->title }} by {{ $post->author->name }}</h3>
                        <p class="px-1">{{ $post->body }}</p>
                        <div class="flex gap-1">
                            <button class="form-btn min-w-24"><a href="/edit-post/{{ $post->id }}">Edit</a></button>
                            <form action="/delete-post/{{ $post->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="form-btn min-w-24">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </section>
        </div>
    @else
        <div class="flex gap-2 w-[60%]">
            <section class="form-container w-full">
                <h2 class="form-header">Register as a User
                </h2>
                <form action="/register" method="POST" class="flex flex-col gap-2">
                    @csrf
                    <div class="flex flex-col gap-1 *:border-gray-200 *:bg-gray-100 *:p-1 *:border *:rounded *:text-sm">
                        <input type="text" name="name" placeholder="Name">
                        <input type="email" name="email" placeholder="Email">
                        <input type="password" name="password" placeholder="Password">
                    </div>
                    <button class="form-btn">Register</button>
                </form>
            </section>
            <section class="form-container w-full">
                <h2 class="form-header ">Log In with an Account</h2>
                <form action="/login" method="POST" class="flex flex-col gap-2">
                    @csrf
                    <div class="flex flex-col gap-1 *:border-gray-200 *:bg-gray-100 *:p-1 *:border *:rounded *:text-sm">
                        <input type="email" name="userEmail" placeholder="Email">
                        <input type="password" name="userPassword" placeholder="Password">
                    </div>
                    <button class="form-btn">Log in</button>
                </form>
            </section>
        </div>
    @endauth
</x-layout>
{{-- @endsection --}}
