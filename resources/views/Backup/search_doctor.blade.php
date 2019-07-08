@extends('layouts.auth')



@section('content')


<div class="container">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading">Available Doctors</div>
			<div class="panel-body">
            <div class="form-group">
      <input type="text" name="search" id="search" class="form-control" placeholder="Search Doctors by name, speciality, location etc.." />
     </div>
        <div class="table-responsive">
				<table class="table table-striped" id="table">
                <h3 align="center">Total Data : <span id="total_records"></span></h3>
					<thead>
						<tr>
							<th>Doctor Name</th>
							<th>Email</th>
							<th>Work Address</th>
							<th>Speciality</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>


					</tbody>
                </table>
            </div>
			</div>
        </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function(){

            fetch_customer_data();

            function fetch_customer_data(query = '')
            {
            $.ajax({
            url : '{{URL::to('searchDoctor')}}',
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data)
            {
                $('tbody').html(data.table_data);
                $('#total_records').text(data.total_data);
            }
            })
            }

            $('#search').on('keyup', function(){
            var query = $(this).val();
            fetch_customer_data(query);
            });
            });
        </script>

@endsection
