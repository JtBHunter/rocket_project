<div class="modal fade" id="modal-university" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST"
                action="" role="form"
                novalidate>
                {{ csrf_field() }}
                <div class="modal-header">
                	<h4 class="modal-title" style="padding-top:5px;">Добавяне на университет</h4>
                </div>
                <div class="modal-body">

                	<div class="row col-12 m-auto" style="margin-bottom: 10px !important;">
						<input id="university_name" class="form-control" type="text" name="name" placeholder="Име на университет...">
					</div>

					<div class="row col-12 m-auto" style="margin-bottom: 10px !important;">
						<input id="university_grade" class="form-control" type="text" name="grade" placeholder="Акредедитационна оценка...">
					</div>

                </div>

                <div class="modal-footer text-right">
                    <button id="submit-university" type="button" class="btn btn-primary">Запис</button>
                </div>
            </form>
        </div>
    </div>
</div>