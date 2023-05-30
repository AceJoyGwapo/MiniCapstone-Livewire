<?php

namespace App\Http\Livewire;

use App\Models\Band;
use App\Models\Genre;
use Livewire\Component;
use App\Models\Feedback;
use Faker\Provider\Image;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class Home extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;
    public $byLocation = 'all';
    public $srtBy = "asc";
    public $byRate;
    public $bandId;
    public $byGenre = [];
    public $bandName, $location, $rate, $description, $image, $genre;

    public function loadProfiles(){

        $query = Band::when($this->byGenre, function($q){
            $q->whereIn('genre', $this->byGenre);
        })->orderBy('rate', $this->srtBy)
            ->search($this->search);

        if($this->byRate){
            $query->where('rate', '>=', $this->byRate);
        }

        if($this->byLocation != 'all'){
            $query->where('location', $this->byLocation);
        }
        $bands = $query->paginate(3);
        return compact('bands');
    }

    public function resetFilters(){
        $this->reset('search', 'byGenre', 'byRate', 'srtBy', 'byLocation');
    }
    public function addProfile(){

        $this->validate([
            'bandName' => ['string', 'required'],
            'description' => ['string', 'required'],
            'location' => ['string', 'required'],
            'genre' => ['required'],
            'rate' => ['string', 'required'],
            'image' => ['image', 'required'], // 1MB Max
        ]);

        Band::create([
            'bandName' => $this->bandName,
            'description' => $this->description,
            'location' => $this->location,
            'genre' => $this->genre,
            'rate' => $this->rate,
            'image' => $this->image->store('band-images', 'public')
        ]);

            return redirect('/')->with('message', 'Created Successfully');

    }

    public function editProfile(int $band_id){
        $band = Band::find($band_id);
        if($band){
            $this->band_id = $band->id;
            $this->bandName = $band->bandName;
            $this->description = $band->description;
            $this->location = $band->location;
            $this->genre = $band->genre;
            $this->rate = $band->rate;


        }else{
            return redirect()->to('/');
        }

    }

    public function updateProfile(){
        $this->validate([
            'bandName' => ['string', 'required'],
            'description' => ['string', 'required'],
            'location' => ['string', 'required'],
            'genre' => ['required'],
            'rate' => ['string', 'required'],
            'image' => ['nullable'],

        ]);
        try{
        $band = Band::find($this->id);

        Band::where('id',$this->band_id)->update([
            'bandName' => $this->bandName,
            'description' => $this->description,
            'location' => $this->location,
            'genre' => $this->genre,
            'rate' => $this->rate,
        ]);

        if($this->image != null){
            Band::where('id',$this->band_id)->update(['image' => $this->image->store('band-images', 'public')]);
        }
        }catch(\Exception $e){
            return redirect('/')->with('message', 'Updated Successfully');
        }
        return redirect('/')->with('message', 'Updated Successfully');
    }

    public function deleteProfile(int $band_id)
    {
        $this->band_id = $band_id;
    }

    public function destroyProfile()
    {
        Band::find($this->band_id)->delete();
        return redirect('/')->with('message', 'Deleted Successfully');

    }

    public function getFeedbacks($bandId)
    {
        return Feedback::where('band_id', $bandId)->get();
    }

    public function render(){
        $feeds = Feedback::get();
        return view('livewire.home', $this->loadProfiles(), compact('feeds'));
    }
}
