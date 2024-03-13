@extends('layouts.admin')

@section('content')
<div class="col-12">
	<div class="card card-grey-light col-8" style="margin: auto;">
		<div class="card-header col-12">
			<div class="row col-12">
				<h4 class="col-5">Спавка 2</h4>
				<div class="col-3">
					<input id="period-from" class="form-control col-12 datepicker-input" type="text" name="period_from">
				</div>
				<div class="col-3">
					<input id="period-to" class="form-control col-12 datepicker-input" type="text" name="period_to">
				</div>
				<div class="col-1">
					<button id="fetch-user-cvs" type="button" class="btn btn-primary float-right">Филтрирай</button>
				</div>
			</div>
		</div>
		<div class="card-body col-12">
			<div id="table-div" class="table-responsive" style="display: none;">
				<table class="table table-condensed table-bordered text-center">
					<thead>
						<tr>
							<th>Брой кандидати</th>
							<th>Дата на раждане</th>
							<th>Технологии</th>
						</tr>
					</thead>
					<tbody id="cv-table">
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
	$(document).ready(function () {

		$('.datepicker-input').daterangepicker({
			singleDatePicker: true,
			locale: {
		      format: 'DD/MM/YYYY',
		    }
		});
	});

	$('#fetch-user-cvs').click(function() {
		var periodFrom = $('#period-from').val(); 
		var periodTo = $('#period-to').val();
		fetchUserCVs(2, periodFrom, periodTo);
	});

	function fetchUserCVs(referenceNumber, periodFrom, periodTo) {
		$.ajax({
            type: "GET",
            url: "{{ route('reference.fetch_cvs') }}",
            data: {
            	referenceNumber: referenceNumber,
                periodFrom: periodFrom,
                periodTo: periodTo,
            },
            dataType: "json",
            success: function(success) {
            	console.log(success);
            	var cvs = success;
            	$('#table-div').show();
            	$('#cv-table').empty();

                for (let cv in cvs) {

                	var birtDate = cvs[cv]['date_of_birth'];
                	birtDate = birtDate.split('-');
                	birtDate = birtDate[2]+ '/' +birtDate[1]+ '/' +birtDate[0];
                	
                	var nameOfTechologies = '';
                	for (let i = 0; i < cvs[cv]['techologies'].length; i++) {
                		nameOfTechologies = nameOfTechologies.concat(cvs[cv]['techologies'][i]);
                		if (i + 1 != cvs[cv]['techologies'].length) {
                			nameOfTechologies = nameOfTechologies.concat(', ');
                		}
                	}

                	let tableRow = '<tr class="text-center"> <td>'+ cvs[cv]['number'] +'</td> <td>'+ birtDate +'</td> <td>'+ nameOfTechologies +'</td> </tr>';
                	$('#cv-table').append(tableRow);
                }
            },
            error: function(fail) {
               	alert('Възникна грешка !');
            }
        });
	}

</script>
@endsection