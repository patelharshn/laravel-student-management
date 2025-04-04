@include('common.header')

<div class="container">

    <!-- Modal Start -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Delete Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{url('studentDelete')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        Are you sure? Delete student record.
                        <input type="hidden" id="delstudid" name="delid" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal End -->

    <div class="mt-4">
        <a href="{{ url('/') }}">
            <button class="btn btn-primary mb-4"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go
                back</button>
        </a>

        <div class="card">
            <h1 class="text-center">Student Data</h1>
        </div>
        <div class="table mt-4">
            <table id="example" class="table table-responsive table-bordered border-dark" style="width:100%" border="1">
                <thead class="table-dark">
                    <tr>
                        <th>Sr.</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>City</th>
                        <th>Email</th>
                        <th>Phone No</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0;?>
                    @foreach ($students as $stud)
                    <?php    $i++;?>
                    <tr>
                        <td class="id" style="display: none;">{{$stud->id}}</td>
                        <td><?php    echo $i;?></td>
                        <td>{{$stud->firstname}}</td>
                        <td>{{$stud->lastname}}</td>
                        <td>{{$stud->city}}</td>
                        <td>{{$stud->email}}</td>
                        <td>{{$stud->phone}}</td>
                        <td>
                            <a href="{{ url('studentEdit/' . $stud->id) }}"><button
                                    class="btn btn-success">Edit</button></a>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                class="btn btn-danger btnDel">
                                Delete
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('.btnDel').click(function(e) {
        var $row = $(this).closest("tr");
        var $text = $row.find(".id").text();
        $('#delstudid').val($text);

        myModal.show();
    });
});
</script>

@include('common.footer')