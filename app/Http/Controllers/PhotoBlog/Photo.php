<?php
namespace App\Http\Controllers\PhotoBlog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PhotoBlog\{Photos,Groups};

class Photo extends Controller {
    function __construct() {}

    function all() {
    	$photos = Photos::latest()->get();
    	$groups = Groups::get();

    	return view("photo.another",[
    		'photos' => $photos,
    		'groups' => $groups
    	]);
    }
    function add() {
    	return view("photo.add");
    }
    function save(Request $req ) {
    	$rule = [
    		'image' => 'required|mimes:jpg,jpeg,png|max:4048'
    	];
    	$message = [
    		'image.required' => "Please Choose an Image",
    		'image.mimes' => "Please Choose a Valid Image",
    		'image.size' => "Image Size must be less then 4 MB"
    	];
    	if( $req->validate( $rule, $message) ) {
    		$image = $req->image;
    		if( $image ) {
    			$ext = $image->getClientOriginalExtension();
    			$filename = uniqid("photoblog").".".$ext;
    			$flag = $image->move( config("upload.photo") ,$filename);
    			if( $flag ) {
		    		$newphoto = new Photos;
		    		$newphoto->name = $filename;
		    		$newphoto->save();
    				return redirect()->route("photo.all");
    			}
    		}
    	}
    	return redirect()->back();
    }
    function delete( $id ) {
    	$photo = Photos::find( $id );

    	if( $photo ){
    		$filename = $photo->name;
    		$flag = $photo->delete();
    		if( $flag ) {
    			@unlink( config('upload.photo').$filename );
    		}

    	}
    	return back()->with("message", "Image Deleted Successfully");
    }

    function groups() {}
    function addGroup() {
    	return view("photo.group.add");
    }
    function saveGroup( Request $req ) {
    	$rule = [
    		"name" => "required|unique:groups"
    	];
    	$message = [
    		'name.required' => "Enter Group Name",
    		'name.unique' => "This Name Already Present, Enter Different Name"
    	];
    	if( $req->validate( $rule, $message)) {
	    	$newgroup = new Groups();
	    	$newgroup->name = $req->name;
    		if( $newgroup->save() ){
    			return redirect()->route("photo.all");
    		}
    	}
		return back();
    }
    function deleteGroup( $id ) {
        dd( $id );
    }

}
