<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class BlogController extends Controller
{
    
    public function get_all(){
        $data = Blog::all();
        return response()->json([
            "message" => "data fetched succesfully",
            "status" => "success",
            "data" => $data
        ],"200");
    }


    public function get_by_id($id){
        $data = Blog::find($id);
if(!($data)){

    return response()->json([
        "message" => "data not found",
        "status" => "false",
        
    ],"400");

}
        return response()->json([
            "message" => "data fetched succesfully",
            "status" => "success",
            "data" => $data
        ],"200");
    }


    public function create(Request $request){
        $incommingData = $request->validate(
            [
                "title"=>"required",
                "content"=>"required",
                "author"=>"required",
                "user_id"=>"required"
                ]
        );
        
        $data = Blog::create($incommingData);

         return response()->json([
            "message" => "Blog inserted succesfully",
            "status" => "success",
            "data" => $data
        ],"200");
    
    }


    public function update(Request $request,$id){
        $data = Blog::find($id);

        $data->title=$request->input('title');
        $data->content=$request->input('content');
        $data->author=$request->input('author');
        $data->save();
        return response()->json([
            "message" => "data updated succesfully",
            "status" => "success",
            "data" => $data
        ],"200");
    }


    public function delete($id){
        $data = Blog::destroy($id);
        return response()->json([
            "message" => "data deleted succesfully",
            "status" => "success",
            "data" => $data
        ],"200");
    }

 
}