<div class="col-12">
	<div class="card card-grey-light col-6" style="margin: auto;">
		<div class="card-header col-12">
			<h4 class="">Създаване на CV</h4>
		</div>
		<div class="card-body col-12">
			<div class="row col-8" style="margin: auto;">
				<div class="row col-12" style="margin-bottom: 20px;">
					<input class="form-control" type="text" name="first_name" placeholder="Име...">
				</div>
				<div class="row col-12" style="margin-bottom: 10px;">
					<input class="form-control" type="text" name="middle_name" placeholder="Презиме...">
				</div>
				<div class="row col-12" style="margin-bottom: 10px;">
					<input class="form-control" type="text" name="last_name" placeholder="Фамилия...">
				</div>
				<div class="row col-12" style="margin-bottom: 10px;">
					<div class="col-6">
						<p>Дата на раждане</p>
					</div>
					<div class="col-6" style="padding-right: 0px;">
						<input class="form-control col-12 datepicker-input" type="text" name="date_of_birth">
					</div>
				</div>
				<div class="row col-12" style="margin-bottom: 10px;">
					<div class="col-11 p-0">
						<select id="university-select" class="form-control select2" name="university_id">
							<option></option>
							@foreach($universities as $university)
								<option value="{{ $university->id }}">{{ $university->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="col-1" style="padding-right: 0px;">
						<button id="university-button" type="button" class="col-12 btn btn-primary p-0 pl-5 pb-1" data-toggle="modal" data-target="#modal-university"><i class="fa fa-pencil fa-lg" aria-hidden="true"></i></button>
					</div>
				</div>
				<div class="row col-12" style="margin-bottom: 10px;">
					<div class="col-11 p-0">
						<select id="technology-select" class="form-control select2" name="technology_ids[]" multiple="multiple">
							<option></option>
							@foreach($technologies as $technology)
								<option value="{{ $technology->id }}">{{ $technology->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="col-1" style="padding-right: 0px;">
						<button id="technology-button" type="button" class="col-12 btn btn-primary p-0 pl-5 pb-1"><i class="fa fa-pencil fa-lg" aria-hidden="true"></i></button>
					</div>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<button type="submit" class="btn btn-primary float-right">Запис на CV</button>
		</div>
	</div>
</div>

<style type="text/css">
	.float-right {
		float: right;
	}
</style>