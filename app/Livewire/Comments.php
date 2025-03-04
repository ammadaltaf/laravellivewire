<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Comment;
class Comments extends Component
{
    public $newComment;
    public $comments;
    public function render()
    {
        return view('livewire.comments');
    }
    
    public function addComment(){
        $this->validate(['newComment'=>'required|max:255']);
        $created = Comment::create([
            'body'=> $this->newComment,
            'user_id'=> 1,
            'image'=> 123,
        ]);
        $this->comments->prepend($created);
        $this->newComment ='';
        session()->flash('message','Comment added successfully');
    }

    public function mount(){
        $initialComments = Comment::latest()->get();
        $this->comments = $initialComments;
    }
    // this is the hook method
    public function updated($field){
        $this->validateOnly($field,['newComment'=>'required|max:255']);
    }

    public function remove($commentId){
        $comment = Comment::findOrFail($commentId);
        $comment->delete();
        $this->comments = $this->comments->except($commentId);
        session()->flash('message','Comment Deleted successfully');
    }
}
