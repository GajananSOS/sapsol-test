@extends('layouts.app')
@section('content')
<div class="container flex justify-center item-center">
    @if (Session::has('user'))
        <div class="max-w-md py-4 px-8 bg-white shadow-lg rounded-lg my-20">
            <div class="flex justify-center md:justify-end -mt-16">
              {{-- <img class="w-20 h-20 object-cover rounded-full border-2 border-indigo-500" src="https://images.unsplash.com/photo-1499714608240-22fc6ad53fb2?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80"> --}}
            </div>
            <div>
              <h2 class="text-gray-800 text-3xl font-semibold">Welcome {{ Session::get('user')->name }} !</h2>
              <p class="mt-2 text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae dolores deserunt ea doloremque natus error, rerum quas odio quaerat nam ex commodi hic, suscipit in a veritatis pariatur minus consequuntur!</p>
            </div>
            <div class="flex justify-end mt-4">
              <a href="#" class="text-xl text-indigo-500">Registered On {{ \Carbon\Carbon::create(Session::get('user')->created_at)->format('d-M-Y, h:i a') }}</a>
            </div>
          </div>
    @endif
</div>
@endsection
