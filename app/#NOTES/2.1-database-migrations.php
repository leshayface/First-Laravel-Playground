<?php

//instead of creating db manually it is better to use migrations (version control for db's)
php artisan make:migration create_posts_table //you name the migration according to the action you're performing

//add your db schema to your new migration file in database/migrations
Schema::create('posts', function (Blueprint $table) {
  $table->id();
  $table->string('slug');
  $table->text('body');
  $table->timestamps();
  $table->timestamp('published_at')->nullable(); //schedule post for future date (nullable means it's optional)
});

//run your migration:
php artisan migrate

//you will now see your new table in you mysql gui client

//say for instace you want to add a title column to your posts table
php artisan make:migration add_title_to_posts_table

//run again:
php artisan migrate

//!! run php artisan to get help on commands

//to rollback you migration run:
php artisan migrate:rollback

//you can now delete the title migration as you don't need it and can make changes from you original migration file

//but if you add eg. a title to that file and run php artisan migrate it will say already ran this file
//so you have 2 options
  //1) run (php artisan migrate:rollback) and then rerun it (php artisan migrate)
  //!!BE CAREFULL everytime you run this you lose all the date

  //2) Or if all your tables are empty you can run (php artisan migrate:fresh) that will drop all tables & then rerun everything



//EASY WAY TO CREATEA NEW TABLE WITH MODEL AND CONTROLLER
//Check help on model commands here:
php artisan help make:model

//quick way to do it:
php artisan make:model Project -mc
//bascially says make me a model for a Projects table and I also need a migration and a controller