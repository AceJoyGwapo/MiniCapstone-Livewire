<div>
    <div wire:ignore.self class="modal fade" id="updateBand" tabindex="-1" aria-labelledby="updateBandLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-info text-center">
              <h1 class="modal-title fs-5" id="updateBandLabel">Edit Band Profile</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="">
                    @csrf
                    <div class="container mx-auto">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="" style="color:dimgray">Image:</label>
                                    <input type="file" wire:model="image" class="form-control">
                                    {{-- <img src="{{asset('storage')}}/{{$this->image}}" class="img-fluid mt-2 mb-2" alt="..."> --}}
                                    {{-- @if ($image)
                                    Photo Preview:
                                    <img src="{{ $image->temporaryUrl() }}" style="width:100px; height:100px">
                                    @endif --}}

                                @error('image') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" style="color:dimgray">Band Name:</label>
                                    <input type="text" class="form-control" wire:model="bandName" value="{{$this->bandName}}">
                                    @error('name') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" style="color:dimgray">Location</label>
                                    <input type="text" class="form-control" wire:model="location">
                                    @error('location') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" style="color:dimgray">Rate</label>
                                    <input type="number" class="form-control" wire:model="rate">
                                    @error('rate') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="">
                                    <label for="" style="color:dimgray">Genre</label>
                                    <select class="form-select" wire:model="genre">
                                        <option selected>Select Genre</option>
                                        <option value="Pop">Pop</option>
                                        <option value="Rock">Rock</option>
                                        <option value="Reggae">Reggae</option>
                                        <option value="Acoustic">Acoustic</option>
                                    </select>
                                    @error('genre') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Profile</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
    </div>
</div>
