<div id="sidebar"
    class="fixed top-20 left-0 z-40 h-[calc(100%-4rem)] w-60 bg-white border-r
            transform -translate-x-full lg:translate-x-0
            transition-transform duration-300 ease-in-out overflow-y-auto">
    <div class="flex flex-col mt-0 px-2">
        <ul class="space-y-4 font-semibold text-md">
            <li>
                <a href="{{ route('user-management-system.index') }}" class="block px-2 py-1 text-gray-500 rounded-xl"
                    style="<?= request()->is('') ? 'color: ' . $textColor . ';background-color: rgba(' . $textColorRgb . ', 0.2);' : '' ?>">
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('user-management-system.userList') }}" class="block px-2 py-1 text-gray-500 rounded-xl"
                    style="<?= request()->is('') ? 'color: ' . $textColor . ';background-color: rgba(' . $textColorRgb . ', 0.2);' : '' ?>"">
                    Userlist
                </a>
            </li>
            <li>
                <a href="{{ route('user-management-system.department.deptList') }}"
                    class="block px-2 py-1 text-gray-500 rounded-xl"
                    style="<?= request()->is('*department*') ? 'color: ' . $textColor . ';background-color: rgba(' . $textColorRgb . ', 0.2);' : '' ?>">
                    Department
                </a>
            </li>
            <li>
                <a href="{{ route('user-management-system.team.teamList') }}"
                    class="block px-2 py-1 text-gray-500 rounded-xl"
                    style="<?= request()->is('*team*') ? 'color: ' . $textColor . ';background-color: rgba(' . $textColorRgb . ', 0.2);' : '' ?>">
                    Teams
                </a>
            </li>
            <li>
                <a href="{{ route('user-management-system.post.postList') }}"
                    class="block px-2 py-1 text-gray-500 rounded-xl"
                    style="<?= request()->is('*post*') ? 'color: ' . $textColor . ';background-color: rgba(' . $textColorRgb . ', 0.2);' : '' ?>">
                    Post
                </a>
            </li>
            <li>
                <a href="{{ route('role') }}" class="block px-2 py-1 text-gray-500 rounded-xl"
                    style="<?= request()->is('role*') ? 'color: ' . $textColor . ';background-color: rgba(' . $textColorRgb . ', 0.2);' : '' ?>">
                    Roll
                </a>
            </li>
            <li>
                <a href="{{ route('create-user') }}" class="block px-2 py-1 text-gray-500 rounded-xl"
                    style="<?= request()->is('create-user*') ? 'color: ' . $textColor . ';background-color: rgba(' . $textColorRgb . ', 0.2);' : '' ?>">
                    Permissions
                </a>
            </li>
            <li>
                <a href="{{ route('general-settings') }}" class="block px-2 py-1 text-gray-500 rounded-xl"
                    style="<?= request()->is('settings*') ? 'color: ' . $textColor . ';background-color: rgba(' . $textColorRgb . ', 0.2);' : '' ?>">
                    Settings
                </a>
            </li>
        </ul>
    </div>
</div>
<div id="sidebarOverlay" class="fixed inset-0 top-16 bg-black/40 z-30 hidden lg:hidden"></div>
