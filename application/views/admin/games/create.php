<?php
/*
* @LitePanel
* @Developed by QuickDevel
*/
?>
<?php echo $header ?>
				<div class="page-header">
					<h1>Создание игры</h1>
				</div>
				<form class="form-horizontal" action="#" id="createForm" method="POST">
					<h3>Основная информация</h3>
					<div class="form-group">
						<label for="name" class="col-sm-3 control-label">Название:</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="name" name="name" placeholder="Введите название">
						</div>
					</div>
					<div class="form-group">
						<label for="code" class="col-sm-3 control-label">Код:</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="code" name="code" placeholder="Введите код">
						</div>
					</div>
					<div class="form-group">
						<label for="query" class="col-sm-3 control-label">Query-драйвер:</label>
						<div class="col-sm-3">
							<select class="form-control" id="query" name="query">
								<?php foreach($queryDrivers as $item): ?> 
								<option value="<?php echo $item ?>"><?php echo $item ?></option>
								<?php endforeach; ?> 
							</select>
						</div>
					</div>
					<h3>Дополнительная информация</h3>
					<div class="form-group">
						<label for="minslots" class="col-sm-3 control-label">Слоты:</label>
						<div class="col-sm-4">
							<div class="input-group">
								<span class="input-group-addon">от</span>
								<input type="text" class="form-control" id="minslots" name="minslots">
								<span class="input-group-addon">до</span>
								<input type="text" class="form-control" id="maxslots" name="maxslots">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="minport" class="col-sm-3 control-label">Порты:</label>
						<div class="col-sm-4">
							<div class="input-group">
								<span class="input-group-addon">от</span>
								<input type="text" class="form-control" id="minport" name="minport">
								<span class="input-group-addon">до</span>
								<input type="text" class="form-control" id="maxport" name="maxport">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="price" class="col-sm-3 control-label">Стоимость:</label>
						<div class="col-sm-3">
							<div class="input-group">
								<input type="text" class="form-control" id="price" name="price">
								<span class="input-group-addon">руб.</span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="status" class="col-sm-3 control-label">Статус:</label>
						<div class="col-sm-3">
							<select class="form-control" id="status" name="status">
								<option value="0">Выключена</option>
								<option value="1">Включена</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-9">
							<button type="submit" class="btn btn-primary">Создать</button>
						</div>
					</div>
				</form>
				<script>
					$('#createForm').ajaxForm({ 
						url: '/admin/games/create/ajax',
						dataType: 'text',
						success: function(data) {
							console.log(data);
							data = $.parseJSON(data);
							switch(data.status) {
								case 'error':
									showError(data.error);
									$('button[type=submit]').prop('disabled', false);
									break;
								case 'success':
									showSuccess(data.success);
									setTimeout("redirect('/admin/games')", 1500);
									break;
							}
						},
						beforeSubmit: function(arr, $form, options) {
							$('button[type=submit]').prop('disabled', true);
						}
					});
				</script>
<?php echo $footer ?>
