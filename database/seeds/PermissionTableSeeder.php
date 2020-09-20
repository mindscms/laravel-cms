<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('permissions')->truncate();


        // MAIN
        $manageMain = Permission::create(['name' => 'main', 'display_name' => 'Main', 'description' => 'Administrator Dashboard', 'route' => 'index', 'module' => 'index', 'as' => 'index', 'icon' => 'fa fa-home', 'parent' => '0', 'parent_original' => '0', 'sidebar_link' => '1', 'appear' => '1', 'ordering' => '1',]);
        $manageMain->parent_show = $manageMain->id; $manageMain->save();

        // POSTS
        $managePosts = Permission::create([ 'name' => 'manage_posts', 'display_name' => 'Posts', 'route' => 'posts', 'module' => 'posts', 'as' => 'posts.index', 'icon' => 'fas fa-newspaper', 'parent' => '0', 'parent_original' => '0', 'appear' => '1', 'ordering' => '5', ]);
        $managePosts->parent_show = $managePosts->id; $managePosts->save();
        $showPosts = Permission::create([ 'name' => 'show_posts', 'display_name' => 'Posts', 'route' => 'posts', 'module' => 'posts', 'as' => 'posts.index', 'icon' => 'fas fa-newspaper', 'parent' => $managePosts->id, 'parent_show' => $managePosts->id, 'parent_original' => $managePosts->id, 'appear' => '1', 'ordering' => '0', ]);
        $createPosts = Permission::create([ 'name' => 'create_posts', 'display_name' => 'Create Post', 'route' => 'posts/create', 'module' => 'posts', 'as' => 'posts.create', 'icon' => null, 'parent' => $managePosts->id, 'parent_show' => $managePosts->id, 'parent_original' => $managePosts->id, 'appear' => '0', 'ordering' => '0',]);
        $displayPost = Permission::create([ 'name' => 'display_posts', 'display_name' => 'Show Post', 'route' => 'posts/{posts}', 'module' => 'posts', 'as' => 'posts.show', 'icon' => null, 'parent' => $managePosts->id, 'parent_show' => $managePosts->id, 'parent_original' => $managePosts->id, 'appear' => '0', 'ordering' => '0', ]);
        $updatePosts = Permission::create([ 'name' => 'update_posts', 'display_name' => 'Update Post', 'route' => 'posts/{posts}/edit', 'module' => 'posts', 'as' => 'posts.edit', 'icon' => null, 'parent' => $managePosts->id, 'parent_show' => $managePosts->id, 'parent_original' => $managePosts->id, 'appear' => '0', 'ordering' => '0', ]);
        $destroyPosts = Permission::create([ 'name' => 'delete_posts', 'display_name' => 'Delete Post', 'route' => 'posts/{posts}', 'module' => 'posts', 'as' => 'posts.delete', 'icon' => null, 'parent' => $managePosts->id, 'parent_show' => $managePosts->id, 'parent_original' => $managePosts->id, 'appear' => '0', 'ordering' => '0', ]);

        // POSTS COMMENTS
        $manageComments = Permission::create([ 'name' => 'manage_post_comments', 'display_name' => 'Comments', 'route' => 'post_comments', 'module' => 'post_comments', 'as' => 'post_comments.index', 'icon' => 'fas fa-comments-alt', 'parent' => $managePosts->id, 'parent_original' => '0', 'appear' => '0', 'ordering' => '10', ]);
        $manageComments->parent_show = $manageComments->id; $manageComments->save();
        $showComments = Permission::create([ 'name' => 'show_post_comments', 'display_name' => 'Comments', 'route' => 'post_comments', 'module' => 'post_comments', 'as' => 'post_comments.index', 'icon' => 'fas fa-comments-alt', 'parent' => $managePosts->id, 'parent_show' => $managePosts->id, 'parent_original' => $manageComments->id, 'appear' => '1', 'ordering' => '0', ]);
        $createComments = Permission::create([ 'name' => 'create_post_comments', 'display_name' => 'Create Comment', 'route' => 'post_comments/create', 'module' => 'post_comments', 'as' => 'post_comments.create', 'icon' => null, 'parent' => $managePosts->id, 'parent_show' => $managePosts->id, 'parent_original' => $manageComments->id, 'appear' => '0', 'ordering' => '0',]);
        $updateComments = Permission::create([ 'name' => 'update_post_comments', 'display_name' => 'Update Comment', 'route' => 'post_comments/{post_comments}/edit', 'module' => 'post_comments', 'as' => 'post_comments.edit', 'icon' => null, 'parent' => $managePosts->id, 'parent_show' => $managePosts->id, 'parent_original' => $manageComments->id, 'appear' => '0', 'ordering' => '0', ]);
        $destroyComments = Permission::create([ 'name' => 'delete_post_comments', 'display_name' => 'Delete Comment', 'route' => 'post_comments/{post_comments}', 'module' => 'post_comments', 'as' => 'post_comments.delete', 'icon' => null, 'parent' => $managePosts->id, 'parent_show' => $managePosts->id, 'parent_original' => $manageComments->id, 'appear' => '0', 'ordering' => '0', ]);

        // POSTS CATEGORIES
        $managePostCategories = Permission::create([ 'name' => 'manage_post_categories', 'display_name' => 'categories', 'route' => 'post_categories', 'module' => 'post_categories', 'as' => 'post_categories.index', 'icon' => 'fas fa-file-archive', 'parent' => $managePosts->id, 'parent_original' => '0', 'appear' => '0', 'ordering' => '15', ]);
        $managePostCategories->parent_show = $managePostCategories->id; $managePostCategories->save();
        $showPostCategories = Permission::create([ 'name' => 'show_post_categories', 'display_name' => 'Categories', 'route' => 'post_categories', 'module' => 'post_categories', 'as' => 'post_categories.index', 'icon' => 'fas fa-file-archive', 'parent' => $managePosts->id, 'parent_show' => $managePosts->id, 'parent_original' => $managePostCategories->id, 'appear' => '1', 'ordering' => '0', ]);
        $createPostCategories = Permission::create([ 'name' => 'create_post_categories', 'display_name' => 'Create category', 'route' => 'post_categories/create', 'module' => 'post_categories', 'as' => 'post_categories.create', 'icon' => null, 'parent' => $managePosts->id, 'parent_show' => $managePosts->id, 'parent_original' => $managePostCategories->id, 'appear' => '0', 'ordering' => '0',]);
        $updatePostCategories = Permission::create([ 'name' => 'update_post_categories', 'display_name' => 'Update category', 'route' => 'post_categories/{post_categories}/edit', 'module' => 'post_categories', 'as' => 'post_categories.edit', 'icon' => null, 'parent' => $managePosts->id, 'parent_show' => $managePosts->id, 'parent_original' => $managePostCategories->id, 'appear' => '0', 'ordering' => '0', ]);
        $destroyPostCategories = Permission::create([ 'name' => 'delete_post_categories', 'display_name' => 'Delete category', 'route' => 'post_categories/{post_categories}', 'module' => 'post_categories', 'as' => 'post_categories.delete', 'icon' => null, 'parent' => $managePosts->id, 'parent_show' => $managePosts->id, 'parent_original' => $managePostCategories->id, 'appear' => '0', 'ordering' => '0', ]);

        // PAGES
        $managePages = Permission::create([ 'name' => 'manage_pages', 'display_name' => 'Pages', 'route' => 'pages', 'module' => 'pages', 'as' => 'pages.index', 'icon' => 'fas fa-file', 'parent' => '0', 'parent_original' => '0', 'appear' => '1', 'ordering' => '20', ]);
        $managePages->parent_show = $managePages->id; $managePages->save();
        $showPages = Permission::create([ 'name' => 'show_pages', 'display_name' => 'Pages', 'route' => 'pages', 'module' => 'pages', 'as' => 'pages.index', 'icon' => 'fas fa-file', 'parent' => $managePages->id, 'parent_show' => $managePages->id, 'parent_original' => $managePages->id, 'appear' => '1', 'ordering' => '0', ]);
        $createPages = Permission::create([ 'name' => 'create_pages', 'display_name' => 'Create Page', 'route' => 'pages/create', 'module' => 'pages', 'as' => 'pages.create', 'icon' => null, 'parent' => $managePages->id, 'parent_show' => $managePages->id, 'parent_original' => $managePages->id, 'appear' => '0', 'ordering' => '0',]);
        $displayPages = Permission::create([ 'name' => 'display_pages', 'display_name' => 'Show Page', 'route' => 'pages/{pages}', 'module' => 'pages', 'as' => 'pages.show', 'icon' => null, 'parent' => $managePages->id, 'parent_show' => $managePages->id, 'parent_original' => $managePages->id, 'appear' => '0', 'ordering' => '0', ]);
        $updatePages = Permission::create([ 'name' => 'update_pages', 'display_name' => 'Update Page', 'route' => 'pages/{pages}/edit', 'module' => 'pages', 'as' => 'pages.edit', 'icon' => null, 'parent' => $managePages->id, 'parent_show' => $managePages->id, 'parent_original' => $managePages->id, 'appear' => '0', 'ordering' => '0', ]);
        $destroyPages = Permission::create([ 'name' => 'delete_pages', 'display_name' => 'Delete Page', 'route' => 'pages/{pages}', 'module' => 'pages', 'as' => 'pages.delete', 'icon' => null, 'parent' => $managePages->id, 'parent_show' => $managePages->id, 'parent_original' => $managePages->id, 'appear' => '0', 'ordering' => '0', ]);

        $manageContactUs = Permission::create([ 'name' => 'manage_contact_us', 'display_name' => 'Contact Us', 'route' => 'contact_us', 'module' => 'contact_us', 'as' => 'contact_us.index', 'icon' => 'fas fa-envelope', 'parent' => '0', 'parent_original' => '0', 'appear' => '1', 'ordering' => '20', ]);
        $manageContactUs->parent_show = $manageContactUs->id; $manageContactUs->save();
        $showContactUs = Permission::create([ 'name' => 'show_contact_us', 'display_name' => 'Contact Us', 'route' => 'contact_us', 'module' => 'contact_us', 'as' => 'contact_us.index', 'icon' => 'fas fa-envelope', 'parent' => $manageContactUs->id, 'parent_show' => $manageContactUs->id, 'parent_original' => $manageContactUs->id, 'appear' => '1', 'ordering' => '0', ]);
        $displayContactUs = Permission::create([ 'name' => 'display_contact_us', 'display_name' => 'Display Message', 'route' => 'contact_us/{contact_us}', 'module' => 'contact_us', 'as' => 'contact_us.show', 'icon' => null, 'parent' => $manageContactUs->id, 'parent_show' => $manageContactUs->id, 'parent_original' => $manageContactUs->id, 'appear' => '0', 'ordering' => '0',]);
        $updateContactUs = Permission::create([ 'name' => 'update_contact_us', 'display_name' => 'Update Message', 'route' => 'contact_us/{contact_us}/edit', 'module' => 'contact_us', 'as' => 'contact_us.edit', 'icon' => null, 'parent' => $manageContactUs->id, 'parent_show' => $manageContactUs->id, 'parent_original' => $manageContactUs->id, 'appear' => '0', 'ordering' => '0', ]);
        $destroyContactUs = Permission::create([ 'name' => 'delete_contact_us', 'display_name' => 'Delete Message', 'route' => 'contact_us/{contact_us}', 'module' => 'contact_us', 'as' => 'contact_us.delete', 'icon' => null, 'parent' => $manageContactUs->id, 'parent_show' => $manageContactUs->id, 'parent_original' => $manageContactUs->id, 'appear' => '0', 'ordering' => '0', ]);

        // USERS
        $manageUsers = Permission::create([ 'name' => 'manage_users', 'display_name' => 'Users', 'route' => 'users', 'module' => 'users', 'as' => 'users.index', 'icon' => 'fas fa-user', 'parent' => '0', 'parent_original' => '0', 'appear' => '1', 'ordering' => '20', ]);
        $manageUsers->parent_show = $manageUsers->id; $manageUsers->save();
        $showUsers = Permission::create([ 'name' => 'show_users', 'display_name' => 'Users', 'route' => 'users', 'module' => 'users', 'as' => 'users.index', 'icon' => 'fas fa-user', 'parent' => $manageUsers->id, 'parent_show' => $manageUsers->id, 'parent_original' => $manageUsers->id, 'appear' => '1', 'ordering' => '0', ]);
        $createUsers = Permission::create([ 'name' => 'create_users', 'display_name' => 'Create User', 'route' => 'users/create', 'module' => 'users', 'as' => 'users.create', 'icon' => null, 'parent' => $manageUsers->id, 'parent_show' => $manageUsers->id, 'parent_original' => $manageUsers->id, 'appear' => '0', 'ordering' => '0',]);
        $displayUsers = Permission::create([ 'name' => 'display_users', 'display_name' => 'Show User', 'route' => 'users/{users}', 'module' => 'users', 'as' => 'users.show', 'icon' => null, 'parent' => $manageUsers->id, 'parent_show' => $manageUsers->id, 'parent_original' => $manageUsers->id, 'appear' => '0', 'ordering' => '0',]);
        $updateUsers = Permission::create([ 'name' => 'update_users', 'display_name' => 'Update User', 'route' => 'users/{users}/edit', 'module' => 'users', 'as' => 'users.edit', 'icon' => null, 'parent' => $manageUsers->id, 'parent_show' => $manageUsers->id, 'parent_original' => $manageUsers->id, 'appear' => '0', 'ordering' => '0', ]);
        $destroyUsers = Permission::create([ 'name' => 'delete_users', 'display_name' => 'Delete User', 'route' => 'users/{users}', 'module' => 'users', 'as' => 'users.delete', 'icon' => null, 'parent' => $manageUsers->id, 'parent_show' => $manageUsers->id, 'parent_original' => $manageUsers->id, 'appear' => '0', 'ordering' => '0', ]);


        // EDITORS
        // SUPERVISORS
        $manageSupervisors = Permission::create([ 'name' => 'manage_supervisors', 'display_name' => 'Supervisors', 'route' => 'supervisor', 'module' => 'supervisor', 'as' => 'supervisor.index', 'icon' => 'fas fa-user-shield', 'parent' => '0', 'parent_original' => '0', 'appear' => '0', 'ordering' => '700', 'sidebar_link' => '0']);
        $manageSupervisors->parent_show = $manageSupervisors->id; $manageSupervisors->save();
        $showSupervisors = Permission::create([ 'name' => 'show_supervisors', 'display_name' => 'Supervisors', 'route' => 'supervisor', 'module' => 'supervisor', 'as' => 'supervisor.index', 'icon' => 'fas fa-user-shield', 'parent' => $manageSupervisors->id, 'parent_show' => $manageSupervisors->id, 'parent_original' => $manageSupervisors->id, 'appear' => '1', 'ordering' => '0', 'sidebar_link' => '0']);
        $createSupervisors = Permission::create([ 'name' => 'create_supervisors', 'display_name' => 'Create Supervisor', 'route' => 'supervisor/create', 'module' => 'supervisor', 'as' => 'supervisor.create', 'icon' => null, 'parent' => $manageSupervisors->id, 'parent_show' => $manageSupervisors->id, 'parent_original' => $manageSupervisors->id, 'appear' => '0', 'ordering' => '0', 'sidebar_link' => '0']);
        $displaySupervisors = Permission::create([ 'name' => 'display_supervisors', 'display_name' => 'Show Supervisor', 'route' => 'supervisor/{supervisor}', 'module' => 'supervisor', 'as' => 'supervisor.show', 'icon' => null, 'parent' => $manageSupervisors->id, 'parent_show' => $manageSupervisors->id, 'parent_original' => $manageSupervisors->id, 'appear' => '0', 'ordering' => '0', 'sidebar_link' => '0']);
        $updateSupervisors = Permission::create([ 'name' => 'update_supervisors', 'display_name' => 'Update Supervisor', 'route' => 'supervisor/{supervisor}/edit', 'module' => 'supervisor', 'as' => 'supervisor.edit', 'icon' => null, 'parent' => $manageSupervisors->id, 'parent_show' => $manageSupervisors->id, 'parent_original' => $manageSupervisors->id, 'appear' => '0', 'ordering' => '0', 'sidebar_link' => '0']);
        $destroySupervisors = Permission::create([ 'name' => 'delete_supervisors', 'display_name' => 'Delete Supervisor', 'route' => 'supervisor/{supervisor}', 'module' => 'supervisor', 'as' => 'supervisor.delete', 'icon' => null, 'parent' => $manageSupervisors->id, 'parent_show' => $manageSupervisors->id, 'parent_original' => $manageSupervisors->id, 'appear' => '0', 'ordering' => '0', 'sidebar_link' => '0']);

        // SETTINGS
        $manageSettings = Permission::create([ 'name' => 'manage_settings', 'display_name' => 'Settings', 'route' => 'settings', 'module' => 'settings', 'as' => 'settings.index', 'icon' => 'fas fa-cog', 'parent' => '0', 'parent_original' => '0', 'appear' => '0', 'ordering' => '600', 'sidebar_link' => '0']);
        $manageSettings->parent_show = $manageSettings->id; $manageSettings->save();
        $showSettings = Permission::create([ 'name' => 'show_settings', 'display_name' => 'Settings', 'route' => 'settings', 'module' => 'settings', 'as' => 'settings.index', 'icon' => 'fas fa-cog', 'parent' => $manageSettings->id, 'parent_show' => $manageSettings->id, 'parent_original' => $manageSettings->id, 'appear' => '1', 'ordering' => '0', 'sidebar_link' => '0']);
        $createSettings = Permission::create([ 'name' => 'create_settings', 'display_name' => 'Create Settings', 'route' => 'settings/create', 'module' => 'settings', 'as' => 'settings.create', 'icon' => null, 'parent' => $manageSettings->id, 'parent_show' => $manageSettings->id, 'parent_original' => $manageSettings->id, 'appear' => '0', 'ordering' => '0', 'sidebar_link' => '0']);
        $displaySettings = Permission::create([ 'name' => 'display_settings', 'display_name' => 'Show Settings', 'route' => 'settings/{settings}', 'module' => 'settings', 'as' => 'settings.show', 'icon' => null, 'parent' => $manageSettings->id, 'parent_show' => $manageSettings->id, 'parent_original' => $manageSettings->id, 'appear' => '0', 'ordering' => '0', 'sidebar_link' => '0']);
        $updateSettings = Permission::create([ 'name' => 'update_settings', 'display_name' => 'Update Settings', 'route' => 'settings/{settings}/edit', 'module' => 'settings', 'as' => 'settings.edit', 'icon' => null, 'parent' => $manageSettings->id, 'parent_show' => $manageSettings->id, 'parent_original' => $manageSettings->id, 'appear' => '0', 'ordering' => '0', 'sidebar_link' => '0']);
        $destroySettings = Permission::create([ 'name' => 'delete_settings', 'display_name' => 'Delete Settings', 'route' => 'settings/{settings}', 'module' => 'settings', 'as' => 'settings.delete', 'icon' => null, 'parent' => $manageSettings->id, 'parent_show' => $manageSettings->id, 'parent_original' => $manageSettings->id, 'appear' => '0', 'ordering' => '0', 'sidebar_link' => '0']);



    }
}
