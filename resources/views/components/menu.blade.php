<div class="border-2 boder-gray-800 bg-white rounded-xl  p-4 w-1/6">
    <ul class="divide-y">
        <li class="px-3 py-2 rounded hover:text-gray-800 font-medium text-gray-500"><a href="{{ route("general-settings") }}"
                class="{{ request()->is('*general-settings') 
                 ? 'text-rose-500' 
                 : 'bg-white text-gray-500 hover:bg-gray-50' }}"><i class="fa-solid fa-gear mr-2"></i>General Sttings</a></li>
        <li class="px-3 py-2 rounded hover:text-gray-800 font-medium text-gray-500"><a href="#"
                class="focus:text-rose-500"><i class="fa-solid fa-envelope mr-2"></i>Emil Settings</a></li>
        <li class="px-3 py-2 rounded hover:text-gray-800 font-medium text-gray-500"><i class="fa-solid fa-shield-halved mr-2"></i><a href="#"
                class="focus:text-rose-500">Re-captcha Settings</a></li>
        <li class="px-3 py-2 rounded hover:text-gray-800 font-medium text-gray-500"><i class="fa-solid fa-bullhorn mr-2"></i><a href="#"
                class="focus:text-rose-500">Announcement</a></li>
    </ul>
</div>