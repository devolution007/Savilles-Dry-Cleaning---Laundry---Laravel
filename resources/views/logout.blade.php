@extends('layouts.master') @section('title', 'Our Services - Savilles') @section('body')



<button id="show-login"
    class="py-1 lg:text-lg lg:px-3 px-2 border rounded-lg text-xxs md:text-xs bg-third border-none outline-none">
    <i class="fa-regular fa-circle-plus trigger-modal" data-id="payment"></i>
</button>




<div class="modal width-30 " id="payment">
    <div class="modal-content  custom_width hidden ">
        <div class="flex py-4 px-10   flex-col gap-4">

            <h1 class="  text-center lg:text-4xl md:text-2xl text-xl font-semibold text-primary pl-2">Logout</h1>


            <p class="text-5xl    text-center">☹️</p>
            <p class="text-center text-2xl ">Are you sure you want</p>
            <p class="text-center text-2xl">to Logout?</p>

            <div class="flex px-4 gap-4 ">
                <button class="   btn  btn-secondary w-1/2    py-2 px-4 rounded-full">
                    No
                </button>
                <button class=" btn  btn-secondary   py-2 px-4 w-1/2  rounded-full">
                    Yes
                </button>
            </div>
        </div>


    </div>




</div>
</div>









</div>



@endsection