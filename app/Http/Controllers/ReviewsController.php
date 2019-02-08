<?php


namespace ReactorCMS\Http\Controllers;

use Illuminate\Support\Facades\App;
use ReactorCMS\Http\Controllers\ReactorController;
use Illuminate\Http\Request;
use ReactorCMS\Entities\Reviews;

class ReviewsController extends ReactorController
{




    public function __construct()
    {
        // constructor body
    }
    public function index()
    {


        $nodes = Reviews::orderBy('id','DESC')->paginate(20);

        return $this->compileView('reviews.index', compact('nodes'), 'Reviews');
    }

   public function view($id){

       $review = Reviews::orderBy('id',$id)->first();

       return $this->compileView('reviews.edit', compact('review'), 'Review');
   }

    public function publish($id){

        $review = Reviews::where('id',$id)->first();

        if($review->approved == 0){

            Reviews::where('id',$id)->update(['approved' => 1]);
        }else{

            Reviews::where('id',$id)->update(['approved' => 0]);
        }

        return redirect()->back();
    }

    public function destroy($id){

        Reviews::where('id',$id)->delete();

        return redirect()->route('reactor.reviews');
    }


}