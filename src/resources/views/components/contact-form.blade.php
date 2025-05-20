<div class="max-w-xl mt-5 p-5 bg-white rounded-md">
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('contact.store') }}" class="space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium">Naam</label>
            <input type="text" name="name" value="{{ old('name') }}"
                   class="w-full border-gray-300 rounded-lg shadow-sm mt-1 focus:ring focus:ring-indigo-200">
            @error('name')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium">E-mailadres</label>
            <input type="email" name="email" value="{{ old('email') }}"
                   class="w-full border-gray-300 rounded-lg shadow-sm mt-1 focus:ring focus:ring-indigo-200">
            @error('email')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium">Bericht</label>
            <textarea name="message" rows="4"
                      class="w-full border-gray-300 rounded-lg shadow-sm mt-1 focus:ring focus:ring-indigo-200">{{ old('message') }}</textarea>
            @error('message')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        @if(config('contactform.use_turnstile'))
            <div>

                <input type="hidden" name="cf-turnstile-response">
                <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>

                <div class="cf-turnstile" data-sitekey="{{ env('TURNSTILE_SITE_KEY') }}" data-callback="javascriptCallback"></div>

                @error('cf-turnstile-response')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
        @endif

        <button type="submit"
                class="bg-gray-700 text-white px-4 py-2 rounded-lg hover:bg-gray-900 transition">
            Verstuur
        </button>
    </form>
</div>
