@extends('layouts.master')
@section('title', 'Signup')
@section('body')
<div class="modal">
    <div class="modal-content">
        <div class="flex flex-col">
            <div class="flex justify-end items-center px-6 mt-3  sm:px-3 sm:">
                <span class="close-button"><i class="fa-regular fa-circle-xmark  fa-2x"></i></span>
            </div>
            <form class="w-full bg-white rounded px-8 pb-9 mb-4" id="signup" method="POST" action="">
                @csrf
                <div class="text-center">
                    <img class="inline-block h-full text-black" src="{{asset('public/front/images/logo-big.svg')}}" alt="Saville">
                </div>
                <div class="mb-4">
                    <input type="text" name="name" id="name" placeholder="Please Enter Your Name" class="form-control bg-light font-mon">
                </div>
                <div class="mb-4">
                    <input type="text" name="email" id="email" placeholder="Please Enter Your Email" class="form-control bg-light font-mon">
                </div>
                <div class="mb-4">
                    <input type="Password" name="password" placeholder="Password" class="font-mon form-control bg-transparent bg-gray-100" id="password">
                </div>
                
                <div class="flex items-center justify-between">
                    <button type="submit" id="signup-submit" class="w-full btn btn-secondary hover:scale-1000 details-button">Signup</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Main modal -->


<div class="flex justify-center items-center py-10 px-0  sm:px-20 overflow-hidden">
    <div class="flex flex-col m-6 gap-6  sm:m-20">
        <div class="text-center ">
            <img class=" inline-block h-full text-black" src="{{asset('public/front/images/logo-big.svg')}}" alt="Saville">
        </div>
        <h1 class="font-semibold text-3xl  md:text-3xl   sm:fs-10  text-primary font-serif text-center">
            Signup To Continue
        </h1>
        <div class="w-36 text-center bg-secondary text-white font-bold font-mon p-3 rounded-lg  "><a class="hover:cursor-pointer  flex  justify-center items-center gap-2 rounded-2xl trigger">
                <i class="fa-solid fa-envelope fs-5 "></i>
                <button type="button" class="hover:bg-transparent fs-10 sm:fs-20 p-0 capitalize" id="show-login">Continue with Email</button>
            </a></div>
        <div class="  text-sm font-medium text-gray-500 dark:text-gray-400">
            <p class="text-center w-100 font-mon">Already have a Saville's account?</p>
            <p class="text-center mt-2"><a class="ml-1 text-center font-bold hover:underline dark:text-blue-500 font-mon" href="{{route('login')}}">Login</a></p>
        </div>
    </div>
</div>




@endsection