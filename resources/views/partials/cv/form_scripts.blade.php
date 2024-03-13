<script type="text/javascript">
	$(document).ready(function () {

		$('#university-select').select2({
			placeholder: 'Изберете университет...',
			minimumInputLenght: 2,
		});

		$('#technology-select').select2({
			placeholder: 'Изберете технология...',
			minimumInputLenght: 2,
		});

		$('.datepicker-input').daterangepicker({
			singleDatePicker: true,	
			locale: {
		      format: 'DD/MM/YYYY',
		    }
		});
	});

	$('#university-button').click(function() {
		$('#modal-university').modal('show');
	});

	$('#submit-university').click(function() {
		var name = $('#university_name').val();
		var grade = $('#university_grade').val();
		addUniversity(name, grade);
	});

	function addUniversity(name, grade) {
		$.ajax({
            type: "POST",
            url: "{{ route('university.store') }}",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                name: name,
                grade: grade,
            },
            dataType: "json",
            success: function(success) {
            	alert('Университета беше добавен успешно !')
            	var universities = success;
            	$('#university_name').val(null);
				$('#university_grade').val(null);
                $('#modal-university').modal('hide');
                $('#university-select').empty();
                $('#university-select').append('<option></option>');

                for (let i = 0; i < universities.length; i++) {
            		let option = '<option value="' + universities[i]['id'] + '">' + universities[i]['name'] + '</option>';
            		$('#university-select').append(option);
                }
            },
            error: function(fail) {
               	alert('Университета не успя да се добави, моля пробвайте пак !');
            }
        });
	}

	$('#technology-button').click(function() {
		$('#modal-technology').modal('show');
	});

	$('#submit-technology').click(function() {
		var name = $('#technology_name').val();
		addTechnology(name);
	});

	function addTechnology(name) {
		$.ajax({
            type: "POST",
            url: "{{ route('technology.store') }}",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                name: name,
            },
            dataType: "json",
            success: function(success) {
            	alert('Технологията беше добавен успешно !')
            	var technologies = success;
            	$('#technology_name').val(null);
                $('#modal-technology').modal('hide');
                $('#technology-select').empty();
                $('#technology-select').append('<option></option>');

                for (let i = 0; i < technologies.length; i++) {
            		let option = '<option value="' + technologies[i]['id'] + '">' + technologies[i]['name'] + '</option>';
            		$('#technology-select').append(option);
                }
            },
            error: function(fail) {
               	alert('Технологията не успя да се добави, моля пробвайте пак !');
            }
        });
	}
</script>