# Blog with Livewire, TailwindCSS, AlpineJS, Jetstream and Filament

## Features

- [X] Login
- [X] Register
- [X] Forgot Password
- [X] Reset Password
- [X] Dashboard
- [X] Profile
- [X] Settings
- [X] Logout
- [ ] Posts
- [ ] Categories
- [ ] Comments
- [ ] Likes

# Project setup

```bash
composer install
npm install
php artisan migrate
php artisan db:seed
composer run dev
```

## Commands executed

```bash
# Create a model with migration, controller and factory

php artisan make:model Post -m -c -f

php artisan make:model Category -m -f

php artisan make:migration create_category_post_table

php artisan migrate --seed

php artisan db:seed

# Check data in database

php artisan tinker

App\Models\Post::count();

# -i is for invocable controller
php artisan make:controller HomeController -i

php artisan make:component Posts/PostCard --view

# For storage:
php artisan storage:link

php artisan make:livewire PostList

php artisan make:filament-resource Category

php artisan make:filament-resource Post --soft-deletes

php artisan make:component Badge --view

php artisan make:migration create_post_like_table

php artisan livewire:make LikeButton

php artisan make:view posts/show
```
