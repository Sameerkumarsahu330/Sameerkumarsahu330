<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model {
    protected $fillable = ['task', 'completed'];
}
/*
I am using the $fillable to have a control over what i am assigning to the database columns.This will give me better control over the data and protection against unexpected or unwanted data being inserted.
*/
