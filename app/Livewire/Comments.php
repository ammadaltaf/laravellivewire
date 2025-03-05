<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Comment;
use Livewire\WithPagination;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\JpegEncoder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class Comments extends Component
{
    use WithPagination;
    public $newComment , $image;

    protected $listeners = [
        'fileUpload' => 'handleFileUpload',
        'filechoosen'
    ];

    public function handleFileUpload($data){
        // dd($data);
        $this->image = $data;
    }
    public function fileChosen()
    {
        $this->dispatch('filechoosen'); // Emit the event properly
    }

    public function storeImage(){
        if(!$this->image) return null;
        $manager = new ImageManager(new Driver());
        $img = $manager->read($this->image)->encode(new JpegEncoder());
        $name = Str::random().'.jpg';
        Storage::disk('public')->put($name,$img);
        return $name;
    }
    // public $comments;
    public function render()
    {
        return view('livewire.comments',['comments'=>Comment::latest()->paginate(2)]);
    }
    
    public function addComment(){
        $this->validate(['newComment'=>'required|max:255']);
        $image = $this->storeImage();
        $created = Comment::create([
            'body'=> $this->newComment,
            'user_id'=> 1,
            'image'=> $image
        ]);
        // $this->comments->prepend($created);
        $this->newComment ='';
        $this->image ='';
        session()->flash('message','Comment added successfully');
    }

    // public function mount(){
    //     $initialComments = Comment::latest()->get();
    //     $this->comments = $initialComments;
    // }
    // this is the hook method
    public function updated($field){
        $this->validateOnly($field,['newComment'=>'required|max:255']);
    }

    public function remove($commentId){
        $comment = Comment::findOrFail($commentId);
        Storage::disk('public')->delete($comment->image);
        $comment->delete();
        
        // $this->comments = $this->comments->except($commentId);
        session()->flash('message','Comment Deleted successfully');
    }
}
