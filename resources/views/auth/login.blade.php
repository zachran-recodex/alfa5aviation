<x-layout.auth>
    <section class="bg-white dark:bg-dark-2 flex flex-wrap min-h-[100vh]">
        <div class="lg:w-1/2 lg:block hidden">
            <div class="flex items-center flex-col h-full justify-center">
                <img class="h-screen w-full" src="{{ asset('/images/discover-bg.jpg') }}" alt="image">
            </div>
        </div>
        <div class="lg:w-1/2 py-8 px-6 flex flex-col justify-center">
            <div class="lg:max-w-[464px] mx-auto w-full">
                <div>
                    <a href="{{ route('home') }}" class="mb-2.5 max-w-[290px]">
                        <img src="{{ asset('/images/logo-sagala-second.png') }}" alt="image">
                    </a>
                    <h4 class="mb-3">Login to your Account</h4>
                    <p class="mb-8 text-secondary-light text-lg">Welcome back! please enter your detail</p>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="icon-field mb-4 relative">
                        <span class="absolute start-4 top-1/2 -translate-y-1/2 pointer-events-none flex text-xl">
                            <iconify-icon icon="mage:email"></iconify-icon>
                        </span>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="Email" class="form-control h-[56px] ps-11 border-neutral-300 bg-neutral-50 dark:bg-dark-2 rounded-xl">
                    </div>
                    <div class="relative mb-5">
                        <div class="icon-field">
                            <span class="absolute start-4 top-1/2 -translate-y-1/2 pointer-events-none flex text-xl">
                                <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                            </span>
                            <input type="password" id="password" name="password" value="{{ old('password') }}" placeholder="Password" class="form-control h-[56px] ps-11 border-neutral-300 bg-neutral-50 dark:bg-dark-2 rounded-xl">
                        </div>
                        <span class="toggle-password ri-eye-line cursor-pointer absolute end-0 top-1/2 -translate-y-1/2 me-4 text-secondary-light" data-toggle="#your-password"></span>
                    </div>
                    <div class="mt-7">
                        <div class="flex justify-between gap-2">
                            <div class="flex items-center">
                                <input type="checkbox" id="remember_me" name="remember" value="" class="form-check-input border border-neutral-300">
                                <label class="ps-2" for="remember_me">Remember me </label>
                            </div>
                            @if(Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-primary-600 font-medium hover:underline">
                                    Forgot Password?
                                </a>
                            @endif
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary justify-center text-sm btn-sm px-3 py-4 w-full rounded-xl mt-8">Login</button>

                </form>
            </div>
        </div>
    </section>
</x-layout.auth>
