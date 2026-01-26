<div class="border-2 boder-gray-800 bg-white rounded-xl  p-4  w-full lg:w-1/4">
    <ul class="divide-y">
        <li class="px-3 py-2 rounded hover:text-gray-800 font-medium text-gray-500"><a
                href="{{ route('general-settings') }}"
                style="<?= request()->is('*general-settings') ? 'color: ' . $textColor . ';' : '' ?>"><i
                    class="fa-solid fa-gear mr-2"></i>General Sttings</a></li>

        <li class="px-3 py-2 rounded hover:text-gray-800 font-medium text-gray-500"><a
                href="{{ route('email-settings') }}"
                style="<?= request()->is('*email-settings') ? 'color: ' . $textColor . ';' : '' ?>"><i
                    class="fa-solid fa-envelope mr-2"></i>Emil Settings</a></li>

        <li class="px-3 py-2 rounded hover:text-gray-800 font-medium text-gray-500"><a
                href="{{ route('re-captcha-settings') }}"
                style="<?= request()->is('*re-captcha-settings') ? 'color: ' . $textColor . ';' : '' ?>"><i
                    class="fa-solid fa-shield-halved mr-2"></i>Re-captcha Settings</a></li>

        <li class="px-3 py-2 rounded hover:text-gray-800 font-medium text-gray-500"><a
                href="{{ route('announcement-settings') }}"
                style="<?= request()->is('*announcement-settings') ? 'color: ' . $textColor . ';' : '' ?>"><i
                    class="fa-solid fa-shield-halved mr-2"></i>Announcement</a></li>
    </ul>
</div>
