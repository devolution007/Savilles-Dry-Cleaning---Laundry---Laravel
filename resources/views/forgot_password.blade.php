@extends('layouts.master')

@section('title', 'Savilles - Dry Cleaning & Laundry')

@section('body')
    <style>
        .review {
            font-family: sans-serif;
        }

        .review .avatar {
            float: left;
            width: 75px;
            padding-right: 20px;
            padding-bottom: 10px;
        }

        .custom-form {
            max-width: 580px;
            margin: auto;
            padding: 50px;
            border-radius: 8px;
            background-color: #f3f7ff !important
        }

        .forgot-section {
            background-color: #061d4994;
        }

        .form-control {
            border-color: rgb(229 231 235 / 0.7);
        }
    </style>
    <section>
        <div class="bg-[length:0%] md:bg-cover bg-no-repeat bg-right-top forgot-section">
            <div class="container">

                <div class="flex flex-col"style="height:600px; justify-content:center;">


                    <div id="">
                        <form class="w-full rounded px-8 pb-9 mb-4 custom-form" method="POST"
                            action="{{ route('submit-forgot-password') }}">
                            @csrf
                            {{-- <div class="text-center">
                                                <img class="inline-block h-full text-black"
                                                    src="{{ asset('public/front/images/logo-big.svg') }}" alt="Saville">
                                            </div> --}}

                            <div class="mb-4">
                                <div class="contact-field">
                                    <label>Email*</label>
                                    <input type="text" name="email" id="email" placeholder="Please Enter Your Email"
                                        class="form-control bg-light font-mon">
                                </div>
                            </div>

                            <div class="mb-4"><span id="optsuccess" style="color:green;"></span></div>
                            <div class="mb-4"><span id="opterror" style="color:red;"></span></div>
                            <div class="flex items-center justify-between">
                                <button type="submit" class="btn btn-secondary hover:scale-1000 details-button"
                                    style="margin: auto;">Forgot Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection
