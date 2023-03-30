@extends('auth.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">Register</div>
            <div class="card-body">
                <form action="{{ route('store') }}" method="post" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-md-4 col-form-label text-md-end text-start">Email</label>
                        <div class="col-md-6">
                          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="phone" class="col-md-4 col-form-label text-md-end text-start">Phone</label>
                        <div class="col-md-6">
                          <input type="text" maxlength="10" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}">
                            @if ($errors->has('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="experience" class="col-md-4 col-form-label text-md-end text-start">Experience (in Years)</label>
                        <div class="col-md-6">
                          <input type="text" maxlength="2" class="form-control @error('experience') is-invalid @enderror" id="experience" name="experience" value="{{ old('experience') }}">
                            @if ($errors->has('experience'))
                                <span class="text-danger">{{ $errors->first('experience') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="notice_period" class="col-md-4 col-form-label text-md-end text-start">Notice Period (in Days)</label>
                        <div class="col-md-6">
                          <input type="text" maxlength="3" class="form-control @error('notice_period') is-invalid @enderror" id="notice_period" name="notice_period" value="{{ old('notice_period') }}">
                            @if ($errors->has('notice_period'))
                                <span class="text-danger">{{ $errors->first('notice_period') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="skills" class="col-md-4 col-form-label text-md-end text-start">Skills</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('skills') is-invalid @enderror" id="skills" name="skills" value="{{ old('skills') }}">
                            @if ($errors->has('skills'))
                                <span class="text-danger">{{ $errors->first('skills') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="job_location" class="col-md-4 col-form-label text-md-end text-start">Job Location</label>
                        <div class="col-md-6">
                            <select class="form-control @error('job_location') is-invalid @enderror" id="job_location" name="job_location">
                                <option value="">Select</option>
                                @foreach ( $location as $id => $state )
                                    <option value="{{ $id }}"{{ ( old('job_location') == $id ) ? 'selected' : '' }}>{{ $state }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('job_location'))
                                <span class="text-danger">{{ $errors->first('job_location') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="resume" class="col-md-4 col-form-label text-md-end text-start">Resume</label>
                        <div class="col-md-6">
                          <input type="file" class="form-control @error('resume') is-invalid @enderror" id="resume" name="resume" value="{{ old('resume') }}">
                            @if ($errors->has('resume'))
                                <span class="text-danger">{{ $errors->first('resume') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="photo" class="col-md-4 col-form-label text-md-end text-start">Photo</label>
                        <div class="col-md-6">
                          <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo" value="{{ old('photo') }}">
                            @if ($errors->has('photo'))
                                <span class="text-danger">{{ $errors->first('photo') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-md-4 col-form-label text-md-end text-start">Password</label>
                        <div class="col-md-6">
                          <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password_confirmation" class="col-md-4 col-form-label text-md-end text-start">Confirm Password</label>
                        <div class="col-md-6">
                          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Register">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
    
@endsection