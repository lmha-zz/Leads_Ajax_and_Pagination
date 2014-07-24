<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Leads Ajax Example</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="/assets/js/leads_index_js.js"></script>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="/assets/css/leads_index_css.css">
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-default" role="navigation">
			<form id="limitSearchForm" action="/leads/limit_leads" class="navbar-form" role="form" method="post">
				<div class="form-group">
					<label for="name_input">Name: </label>
					<input id="name_input" class="form-control" type="text" name="name" placeholder="Search leads by a Name">
				</div>
				<div class="form-group col-sm-6 navbar-right">
					<div class="form-group col-sm-6">
						<label for="from_date_input">From: </label>
						<input id="from_date_input" class="form-control" type="date" name="from_date">
					</div>
					<div class="form-group col-sm-6">
						<label for="to_date_input">To: </label>
						<input id="to_date_input" class="form-control" type="date" name="to_date">
					</div>
				</div>
			</form>
		</nav>
		<div class="row">
			<div class="col-sm-12">
				<ul id="pagination" class="pagination pull-right">
					<?php
					echo $pagination;
					?>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th class="col-sm-1 text-center">Leads ID</th>
							<th class="col-sm-2">First Name</th>
							<th class="col-sm-2">Last Name</th>
							<th class="col-sm-2 text-center">Registered Date & Time</th>
							<th class="col-sm-5">Email</th>
						</tr>
					</thead>
					<tbody id="leadsWrapper">
						<?php
						foreach ($leads as $index => $lead) {
							?>
							<tr>
								<td class="text-center"><?= $lead['leads_id'] ?></td>
								<td><?= ucfirst($lead['first_name']) ?></td>
								<td><?= ucfirst($lead['last_name']) ?></td>
								<td class="text-center"><?= $lead['registered_datetime'] ?></td>
								<td><?= $lead['email'] ?></td>
							</tr>
							<?php
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>