<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Review;
use App\Models\Specialist;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    //
    public function index(){
        $reviews = Review::all();
        return view('review.index', ['reviews'=>$reviews]);
    }
    public function addReview() {
        $patients = Patient::all();
        $specialists = Specialist::all();
        return view('review.create', compact('patients', 'specialists'));
    }
    public function saveReview(Request $request){

        $incomingFields=$request->validate([
            'location'=>'required|string|max:255',
            'patient_id'=>'required|integer|exists:patients,id',
            'specialist_id'=>'required|integer|exists:specialists,id',
        ]);
     

        Review::create($incomingFields);

        return redirect('/reviews');

    }
    public function showEditReview($id){
        $review = Review::find($id);
        $patients = Patient::all();
        $specialists = Specialist::all();
        return view('review.edit',['review'=>$review, 'patients'=>$patients, 'specialists'=>$specialists]);
    }
    public function saveEditReview($id, Request $request){

        $incomingFields=$request->validate([
            'location'=>'required|string|max:255',
            'patient_id'=>'required|integer|exists:patients,id',
            'specialist_id'=>'required|integer|exists:specialists,id',
        ]);


        // $incomingFields['name']=strip_tags($incomingFields['name']);

        $review=Review::find($id);

        $review->update($incomingFields);
        return redirect('/reviews');
    }
    
    public function deleteReview($id){
        $review = Review::find($id);
        $review->delete();
        return redirect('/reviews');
    }
}
