<div class="modal fade" id="modal-technology" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST"
                action="" role="form"
                novalidate>
                {{ csrf_field() }}
                <div class="modal-header">
                	<h4 class="modal-title" style="padding-top:5px;">Добавяне на технология</h4>
                </div>
                <div class="modal-body">
                	<div class="row col-12 m-auto">
						<input id="technology_name" class="form-control" type="text" name="name" placeholder="Име на технологията...">
					</div>
                </div>

                <div class="modal-footer text-right">
                    <button id="submit-technology" type="button" class="btn btn-primary">Запис</button>
                </div>
            </form>
        </div>
    </div>
</div>