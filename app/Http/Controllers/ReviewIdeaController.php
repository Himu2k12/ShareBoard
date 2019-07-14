<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Idea;

class ReviewIdeaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role');
    }
    public function viewIdeas(){
        $ideas=Idea::orderBy('id', 'desc')->get();

        return view('admin.idea.manage-idea', ['ideas'=>$ideas]);
    }
    public function unpublishedIdeaInfo($id) {
        $ideaById = Idea::find($id);
        $ideaById->publication_status = 0;
        $ideaById->save();
        return redirect('/review-idea')->with('message', 'idea info unpublished successfully');
    }
    public function publishedIdeaInfo($id) {
        $ideaById = Idea::find($id);
        $ideaById->publication_status = 1;
        $ideaById->save();
        return redirect('/review-idea')->with('message', 'idea info published successfully');
    }

    public function deleteIdeaInfo($id) {
        $ideaById = Idea::find($id);
        $ideaById->delete();

        return redirect('/review-idea')->with('message', 'idea info delete successfully');
    }
    public function editIdea($id){
        $editIdeas=Idea::find($id);
        return view('admin.idea.edit-idea',['editIdeas'=>$editIdeas]);
    }
    public function updateIdea(Request $request){
        $updateIdeas=Idea::find($request->idea_id);
        $updateIdeas->idea_title=$request->idea_title;
        $updateIdeas->idea_description=$request->idea_description;
        $updateIdeas->closer_date=$request->closer_date;
        $updateIdeas->publication_status=$request->publication_status;
        $updateIdeas->save();
        return redirect('/review-idea')->with('message', 'idea info updated successfully');
    }

}
