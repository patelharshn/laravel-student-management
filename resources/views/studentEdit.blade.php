@include('common.header')

<div class="container">
    <div class="mt-5">
        <a href="{{ route('studentList') }}">
            <button class="btn btn-primary mb-4"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go
                back</button>
        </a>
        <div class="card p-2">
            <div class="card-head text-center mb-4">
                <h1 class="fw-bold">Edit Student</h1>
            </div>
            <div class="m-2">
                <form action="{{ url('studentUpdate') }}" method="post">
                    @csrf
                    <div class="row mb-4">
                        <div class="col">
                            <input type="hidden" name="stud_id" readonly value="{{$data->id}}">
                            <div data-mdb-input-init class="form-outline">
                                <input type="text" id="form6Example1" name="firstname" class="form-control"
                                    value="{{$data->firstname}}" />
                                <label class="form-label" for="form6Example1">First name</label>
                            </div>
                        </div>
                        <div class="col">
                            <div data-mdb-input-init class="form-outline">
                                <input type="text" id="form6Example2" name="lastname" class="form-control"
                                    value="{{$data->lastname}}" />
                                <label class="form-label" for="form6Example2">Last name</label>
                            </div>
                        </div>
                    </div>

                    <!-- Text input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="text" id="form6Example4" name="city" class="form-control"
                            value="{{$data->city}}" />
                        <label class="form-label" for="form6Example4">City</label>
                    </div>

                    <!-- Email input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="text" id="form6Example5" name="email" class="form-control"
                            value="{{$data->email}}" />
                        <label class="form-label" for="form6Example5">Email</label>
                    </div>

                    <!-- Number input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="number" id="form6Example6" name="phone" class="form-control"
                            value="{{$data->phone}}" />
                        <label class="form-label" for="form6Example6">Phone</label>
                    </div>

                    <!-- Submit button -->
                    <div class="text-center">
                        <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">Update
                            Student</button>
                    </div>
                </form>
                @if ($errors->any())
                <div class="card">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $err)
                            <li>{{$err}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@include('common.footer')