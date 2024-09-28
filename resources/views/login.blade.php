@extends('layouts.master')

@section('title', 'Log in')

@section('body')


<div class="flex justify-center items-center py-10 px-0  sm:px-20 overflow-hidden new-login">
  <div class="flex flex-col m-6 gap-6  sm:m-20">
    <div class="text-center">
      <img class=" inline-block h-full text-black" src="{{asset('public/front/images/logo-big.svg')}}" alt="Saville">
    </div>
    <h1 class="font-semibold text-3xl  md:text-3xl   sm:fs-10  text-primary font-serif text-center">
      Log In To Continue
    </h1>
    <div class="w-36 text-center bg-secondary text-white font-bold font-mon p-3 rounded-lg email-btn">
       <div class="round-icon-bg">  <i class="fa-solid fa-envelope fs-5 "></i></div>
        <button type="button" class=" hover:bg-transparent fs-10 sm:fs-20 p-0 capitalize trigger-modal-signup" data-id="show-login">&nbsp;&nbsp; Continue with Email</button>
      </a>
    </div>
    <!-- <div class="  text-sm font-medium text-gray-500 dark:text-gray-400">
      <p class="text-center w-100 font-mon">Don't have a Saville's account yet?</p>
      <p class="text-center mt-2"><a class="ml-1 text-center font-bold text-primary
      hover:underline dark:text-blue-500 font-mon" href="{{route('signup_form')}}">Sign Up</a></p>
    </div> -->
  </div>
</div>




@endsection