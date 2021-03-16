<?php

//so we know how to make factory models. But what about other logic that can be added to a move_uploaded_file


//lets create a new model for Assignments that can be completed or not compeleted
php artisan make:model Assignment -mc 


//add your data to your migration file
Schema::create('assignments', function (Blueprint $table) {
  $table->id();
  // $table->timestamp('completed_at')->nullable();
  //instead of a boolean we can use a timestamp to see when assignment was completed
  $table->boolean('completed')->default(false);
  $table->text('body');
  $table->timestamps();
  $table->timestamp('due_date')->nullable();
});


//!!ADDING NEW DATA TO TABLE USING PHP TINKER

php artisan tinker

//you can play around with php here as well
2+2

//what data do we need? We only need body, the rest of the column are auto populated and completed has a default value

//run:
$assignment = new App\Models\Assignment //make sure you use the correct Namespace

//set body:
$assignment->body = 'Finish This Tut Video';

//save change:
$assignment->save();

//fetching data:

//fetch all data:
App\Models\Assignment::all();

//fetch data where completed is false
App\Models\Assignment::where('completed', false)->get();


//HOW DO WE SET AN ASSIGNMENT TO TRUE
//We can set it in the model (business logic can go in model)

//add complete method to model
class Assignment extends Model
{
    public function complete() {

      $this->completed = true; //can just use this instead of defining where Assignment is
      $this->save();

    }
}

//now in tinker you can fetch the data you want and run the completed method you want on it
//!!restart tinker
$assignment = App\Models\Assignment::first(); //set assignment variable to the first item

$assignment->complete();