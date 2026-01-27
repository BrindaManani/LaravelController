
    <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-xl border border-gray-300">
        <table class="w-full text-sm text-left rtl:text-right text-body">
            <thead class="text-sm text-body bg-gray-100 border-b rounded-base border-default">
                <tr>
                    <th scope="col" class="px-6 py-3 font-medium border-r-1">
                        Features
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Capabilities
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-neutral-primary border-b border-default">
                    <th scope="row" class="bg-gray-100 px-6 py-4 font-medium text-heading whitespace-nowrap">
                        User Detail
                    </th>
                    <td class="px-6 py-4 flex justify-around">
                        <div class="flex items-center mb-4">
                            <input id="user-view" name="permissions[user][view]" type="checkbox" value="user.view"
                                class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                            <label for="user-view" class="select-none ms-2 text-sm font-medium text-heading">View</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="user-create" name="permissions[user][create]" type="checkbox" value="user.create"
                                class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                            <label for="user-create" class="select-none ms-2 text-sm font-medium text-heading">Create</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="user-edit" name="permissions[user][edit]" type="checkbox" value="user.edit"
                                class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                            <label for="user-edit" class="select-none ms-2 text-sm font-medium text-heading">Edit</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="user-delete" name="permissions[user][delete]" type="checkbox" value="user.delete"
                                class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                            <label for="user-delete" class="select-none ms-2 text-sm font-medium text-heading">Delete</label>
                        </div>
                    </td>
                </tr>
                <tr class="bg-neutral-primary border-b border-default">
                    <th scope="row" class="bg-gray-100 px-6 py-4 font-medium text-heading whitespace-nowrap">
                        Department
                    </th>
                    <td class="px-6 py-4 flex justify-around">
                        <div class="flex items-center mb-4">
                            <input id="department-view" name="permissions[department][view]" type="checkbox" value="department.view"
                                class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                            <label for="department-view" class="select-none ms-2 text-sm font-medium text-heading">View</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="department-create" name="permissions[department][create]" type="checkbox" value="department.create"
                                class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                            <label for="department-create" class="select-none ms-2 text-sm font-medium text-heading">Create</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="department-edit" name="permissions[department][edit]" type="checkbox" value="department.edit"
                                class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                            <label for="department-edit" class="select-none ms-2 text-sm font-medium text-heading">Edit</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="department-delete" name="permissions[department][delete]" type="checkbox" value="department.delete"
                                class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                            <label for="department-delete" class="select-none ms-2 text-sm font-medium text-heading">Delete</label>
                        </div>
                    </td>
                </tr>
                <tr class="bg-neutral-primary border-b border-default">
                    <th scope="row" class="bg-gray-100 px-6 py-4 font-medium text-heading whitespace-nowrap">
                        Team
                    </th>
                    <td class="px-6 py-4 flex justify-around">
                        <div class="flex items-center mb-4">
                            <input id="team-view" name="permissions[team][view]" type="checkbox" value="team.view"
                                class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                            <label for="team-view" class="select-none ms-2 text-sm font-medium text-heading">View</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="team-create" name="permissions[team][create]" type="checkbox" value="team.create"
                                class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                            <label for="team-create" class="select-none ms-2 text-sm font-medium text-heading">Create</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="team-edit" name="permissions[team][edit]" type="checkbox" value="team.edit"
                                class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                            <label for="team-edit" class="select-none ms-2 text-sm font-medium text-heading">Edit</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="team-delete" name="permissions[team][delete]" type="checkbox" value="team.delete"
                                class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                            <label for="team-delete" class="select-none ms-2 text-sm font-medium text-heading">Delete</label>
                        </div>
                    </td>
                </tr>
                <tr class="bg-neutral-primary border-b border-default">
                    <th scope="row" class="bg-gray-100 px-6 py-4 font-medium text-heading whitespace-nowrap">
                        Post
                    </th>
                    <td class="px-6 py-4 flex justify-around">
                        <div class="flex items-center mb-4">
                            <input id="post-view" name="permissions[post][view]" type="checkbox" value="post.view"
                                class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                            <label for="post-view" class="select-none ms-2 text-sm font-medium text-heading">View</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="post-create" name="permissions[post][create]" type="checkbox" value="post.create"
                                class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                            <label for="post-create" class="select-none ms-2 text-sm font-medium text-heading">Create</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="post-edit" name="permissions[post][edit]" type="checkbox" value="post.edit"
                                class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                            <label for="post-edit" class="select-none ms-2 text-sm font-medium text-heading">Edit</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="post-delete" name="permissions[post][delete]" type="checkbox" value="post.delete"
                                class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                            <label for="post-delete" class="select-none ms-2 text-sm font-medium text-heading">Delete</label>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

