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
                    <h4 class="mb-3">Forgot Password</h4>
                    <p class="mb-8 text-secondary-light text-lg">Enter the email address associated with your account and we will send you a link to reset your password.</p>
                </div>
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="icon-field mb-6 relative">
                    <span class="absolute start-4 top-1/2 -translate-y-1/2 pointer-events-none flex text-xl">
                        <iconify-icon icon="mage:email"></iconify-icon>
                    </span>
                        <input type="email" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus class="form-control h-[56px] ps-11 border-neutral-300 bg-neutral-50 dark:bg-neutral-600 rounded-xl">
                    </div>
                    <button type="button" data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="btn btn-primary justify-center text-sm btn-sm px-3 py-4 w-full rounded-xl"> Continue</button>

                    <div class="text-center">
                        <a href="{{ route('login') }}" class="text-primary-600 font-bold mt-6 hover:underline">Back to Login</a>
                    </div>

                </form>
            </div>
        </div>
    </section>
</x-layout.auth>
