<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/projects', function () {
    return DB::table('projects')->get();
});

Route::post('/projects', function (Request $request) {
    $id = DB::table('projects')->insertGetId([
        'name' => $request->name,
        'description' => $request->description,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'status' => $request->status,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return $id;
});

Route::get('/tasks/{task}/comments', function ($task) {
    return DB::table('comments')
        ->where('task_id', $task)
        ->get();
});

Route::post('/tasks/{task}/comments', function (Request $request, $task) {
    $id = DB::table('comments')->insertGetId([
        'task_id' => $task,
        'comment_text' => $request->comment_text,
        'author' => $request->author,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return $id;
});

Route::delete('/comments/{id}', function ($id) {
    DB::table('comments')
        ->where('id', $id)
        ->delete();

    return 'Comment deleted';
});
