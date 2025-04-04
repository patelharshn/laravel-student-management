@include('common.header')

<div class="container">
    <h1 class="text-center bg-primary mt-2 p-5 text-white font-monospace fw-bold">Student management system</h1>
    <div class="card">
        <div class="card-body text-center">
            <a href="{{ route('addStudForm') }}"><button type="button" class="btn btn-primary"><i
                        class="fa-solid fa-user-plus"></i>
                    Add Student</button></a>

            <a href="{{ route('studentList') }}"><button type="button" class="btn btn-warning"><i
                        class="fa-solid fa-database"></i>
                    Show Students Data</button></a>
        </div>
    </div>
</div>

@include('common.footer')