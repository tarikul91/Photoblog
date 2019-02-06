<?php
Route::get('/', function () {
    return redirect()->route("photo.all");
});

Route::name("photo.")->prefix("photoblog")->group( function () {
	Route::get("/", "PhotoBlog\Photo@all")->name("all");
	Route::get("add", "PhotoBlog\Photo@add")->name("add");
	Route::post("save", "PhotoBlog\Photo@save")->name("save");
	Route::get("delete/{id}", "PhotoBlog\Photo@delete")->name("delete");

	Route::name("group.")->prefix("group")->group(function () {
		Route::get("/", "PhotoBlog\Photo@groups")->name("all");
		Route::get("add", "PhotoBlog\Photo@addGroup")->name("add");
		Route::post("save", "PhotoBlog\Photo@saveGroup")->name("save");
		Route::get("delete/{id}", "PhotoBlog\Photo@deleteGroup")->name("delete");
	});
});

Route::name("music.")->prefix("music")->group( function () {
	Route::get("/", "Music\Music@all")->name("all");
});
