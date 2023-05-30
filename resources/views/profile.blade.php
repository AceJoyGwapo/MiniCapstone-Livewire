@extends('layouts.app')

@section('content')
    <div class="mt-5">
        @if ($message = Session::get('status'))
            <div class="alert alert-success alert-dismissible fade show mt-2 col-md-8 mx-auto" role="alert">
                <strong>{{ $message }}</strong>
            </div>
        @endif

    </div>

    <div>
        <div class="container">

            <div class="card mb-3 p-1">
                @foreach ($errors->all() as $error)
                    <p class="text-danger">{{ $error }}</p>
                @endforeach
                <div class="row m-2">
                    <div class="col-md-3">
                        <img src="{{ '/user_img/' . Auth::user()->profile_image }}" alt="..."
                            style="border-radius: 50%; height: 200px; width: 200px; margin-left: 20px;">
                        <div class="m-2">
                            <ul class="nav nav-tabs px-5" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="profile-tab" data-bs-toggle="tab" href="#profile"
                                        role="tab" aria-controls="profile" aria-selected="true">Profile Settings</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="account-tab" data-bs-toggle="tab" href="#account" role="tab"
                                        aria-controls="account" aria-selected="false">Account</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="subscription-tab" data-bs-toggle="tab" href="#subscription"
                                        role="tab" aria-controls="subscription" aria-selected="false">Subscription</a>
                                </li>
                            </ul>
                        </div>
                        <div class="d-flex mb-2">
                            <button class="btn btn-danger mx-auto">Delete Account</button>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <div class="tab-content py-0 px-0">
                                <div class="tab-pane fade show active" id="profile" role="tabpanel"
                                    aria-labelledby="profile-tab">
                                    <h5 class="card-title">Profile Settings</h5>
                                    <form class="m-5" action="{{ route('change_profile', ['id' => Auth::user()->id]) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        @csrf

                                        <hr>
                                        <div class="form-group mb-3 col-md-7">
                                            <label for="" style="color:dimgray;"></label>
                                            <input type="file" name="profile_image" class="">
                                        </div>
                                        <div class="col-md-10">
                                            <label class="form-label">Name</label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ Auth::user()->name }}">
                                        </div>
                                        <div class="col-md-10">
                                            <label class="form-label">Email</label>
                                            <input type="text" class="form-control" name="email"
                                                value="{{ Auth::user()->email }}">
                                        </div>
                                        <div class="col-md-10">
                                            <label class="form-label">Location</label>
                                            <select name="location" id="" class="form-control">
                                                <option selected>{{ Auth::user()->location }}</option>
                                                <option value="Tubigon">Tubigon</option>
                                                <option value="Clarin">Clarin</option>
                                                <option value="Tagbilaran">Tagbilaran</option>
                                                <option value="Calape">Calape</option>
                                            </select>
                                        </div>
                                        <div class="col-md-10">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control" name="description">{{ Auth::user()->description }}</textarea>
                                        </div>
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>

                                </div>
                                <div class="tab-pane fade" id="account" role="tabpanel" aria-labelledby="account-tab">
                                    <h5 class="card-title">Account Settings</h5>
                                    @foreach ($errors->all() as $error)
                                        <p class="text-danger">{{ $error }}</p>
                                    @endforeach
                                    <form method="POST" action="{{ url('/change-password') }}">
                                        @csrf
                                        <hr>
                                        <div class="col-md-10">
                                            <input id="password" type="password" class="form-control"
                                                name="current_password" autocomplete="current-password"
                                                placeholder="Current Password">
                                        </div> <br>
                                        <div class="col-md-10">
                                            <input id="new_password" type="password" class="form-control"
                                                name="new_password" autocomplete="current-password"
                                                placeholder="New Password">
                                        </div> <br>
                                        <div class="col-md-10">
                                            <input id="new_confirm_password" type="password" class="form-control"
                                                name="new_confirm_password" autocomplete="current-password"
                                                placeholder="Confirm New Password">
                                        </div><br>

                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>

                                </div>
                                <div class="tab-pane fade " id="subscription" role="tabpanel"
                                    aria-labelledby="subscription-tab">
                                    <h5 class="card-title">No Subscriptions</h5>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
