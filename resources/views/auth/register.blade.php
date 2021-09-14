@extends('layouts.app')
@section('content')
<div class="container h-screen flex justify-center items-center">

    <div class="w-full max-w-sm">
        <form action="{{ route('register') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                  Full Name
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="name" id="name" type="text" value="{{ old('name') }}" placeholder="Full Name">
                @error('name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                Email
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" id="email" value="{{ old('email') }}" type="text" placeholder="Email">
                @error('email')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
          </div>
          <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
              Password
            </label>
            <input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" name="password" id="password" type="password" placeholder="Enter Password">
            @error('password')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
          </div>
          <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password_confirmation">
              Confirm Password
            </label>
            <input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" name="password_confirmation" id="password_confirmation" type="password" placeholder="Confirm Password">
          </div>
          <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
              Sign Up
            </button>
            {{-- <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">
              Forgot Password?
            </a> --}}
          </div>
        </form>
        <p class="text-center text-gray-500 text-xs">
          &copy;2021 All rights reserved.
        </p>
      </div>
</div>

@endsection
