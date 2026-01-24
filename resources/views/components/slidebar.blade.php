<div class="fixed w-60 left-0 h-full border-2 boder-gray-800 ">
    <div class="flex flex-col mt-4">

        <ul class="space-y-4 px-2">
            <li>
                <a href="{{ route('user-management-system.index') }}"
                    class="block px-2 py-1 text-gray-500" style="<?= request()->is('user-management-system*') ? 'color: ' .$textColor .';': '' ?>">
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('user-management-system.userList') }}"
                    class="block px-2 py-1 text-gray-500" style="<?= request()->is('user-management-system*') ? 'color: ' .$textColor .';': '' ?>">
                    Userlist
                </a>
            </li>
            <li>
                <a href="{{ route('user-management-system.index') }}"
                    class="block px-2 py-1 text-gray-500" style="<?= request()->is('user-management-system*') ? 'color: ' .$textColor .';': '' ?>">
                    Department
                </a>
            </li>
            <li>
                <a href="{{ route('user-management-system.index') }}"
                    class="block px-2 py-1 text-gray-500" style="<?= request()->is('user-management-system*') ? 'color: ' .$textColor .';': '' ?>">
                    Teams
                </a>
            </li>
            <li>
                <a href="{{ route('create-user') }}"
                    class="block px-2 py-1 text-gray-500 rounded" style="<?= request()->is('create-user*') ? 'color: ' .$textColor .';': '' ?>">
                    Roll Permissions
                </a>
            </li>
            <li>
                <a href="{{ route('general-settings') }}"
                    class="block px-2 py-1 text-gray-500 rounded" style="<?= request()->is('settings*') ? 'color: ' .$textColor .';': '' ?>">
                    Settings
                </a>
            </li>
        </ul>
    </div>
</div>
