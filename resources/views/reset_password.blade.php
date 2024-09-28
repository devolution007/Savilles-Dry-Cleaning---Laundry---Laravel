@extends('layouts.master')

@section('title')
<style>
    .error-message {
        color: red;
    }
    .reset-section{
        background: #061d4994;
    }
</style>
@section('body')
    <section class="reset-section">
        <div class="py-8 md:py-12 lg:py-16">
            <div class="container">
                <div class="flex flex-wrap -mx-4">


                    <div class="flex-initial w-full lg:w-6/12 xl:w-5/12 px-4" style="padding-top: 20px; margin: auto;">
                        <div class="bg-shade rounded-xl px-6 py-4 md:px-12 md:py-6 lg:px-10 lg:py-8">

                            <form action="{{ route('reset-password') }}" method="POST" id="passwordForm">
                                @csrf
                                <div class="space-y-4">
                                    <div class="grid grid-cols-12 md:grid-cols-12 gap-x-6 gap-y-4">
                                        <div class="contact-field">
                                            <label>Password*</label>
                                            <input type="hidden" name="email" @if(isset($user->email)) value="{{$user->email}}" @endif>
                                            <input type="hidden" name="token" @if(isset($user->token)) value="{{$user->token}}" @endif>
                                            <input type="password" name="password" id="password" required>
                                        </div>
                                        <div class="contact-field">
                                            <label>Confirm Password*</label>
                                            <input type="password" name="c_password" id="c_password" required>
                                        </div>
                                    </div>
                                    <div class="contact-field text-center pt-4">
                                        <button type="submit" class="btn btn-secondary">Reset Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var passwordField = document.getElementById('password');
        var confirmPasswordField = document.getElementById('c_password');
        var errorMessage = document.getElementById('error-message');
        var form = document.getElementById('passwordForm');

        passwordField.addEventListener('input', validatePassword);
        confirmPasswordField.addEventListener('input', validatePassword);

        form.addEventListener('submit', function (event) {
            if (!validatePassword()) {
                event.preventDefault();
            }
        });

        function validatePassword() {
            var password = passwordField.value;
            var confirmPassword = confirmPasswordField.value;

            if (password !== confirmPassword) {
                confirmPasswordField.setCustomValidity("Passwords do not match");
                errorMessage.textContent = "Passwords do not match";
                errorMessage.style.display = "block";
                return false;
            } else {
                confirmPasswordField.setCustomValidity("");
                errorMessage.textContent = "";
                errorMessage.style.display = "none";
                return true;
            }
        }
    });
</script>
    {{-- @include('inc.cta') --}}
@endsection
