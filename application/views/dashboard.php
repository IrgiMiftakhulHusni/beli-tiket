<div class="container mt-4">
	<div class="row">
		<!-- Welcome Section -->
		<div class="col-12">
			<div class="alert alert-info" role="alert">
				<h4 class="alert-heading">Welcome to the Dashboard!</h4>
				<p>Hi, <?= $this->session->userdata('user_login')['data']->nama; ?>! Here's an overview of your application. Use the navigation menu to explore different sections.</p>
			</div>
		</div>
	</div>

	<div class="row">
		<!-- Card Section -->
		<div class="col-md-4">
			<div class="card text-white bg-primary mb-3">
				<div class="card-header">Users</div>
				<div class="card-body">
					<h5 class="card-title">123 Registered Users</h5>
					<p class="card-text">Manage and monitor your user base.</p>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card text-white bg-success mb-3">
				<div class="card-header">Sales</div>
				<div class="card-body">
					<h5 class="card-title">$45,000 Revenue</h5>
					<p class="card-text">View and analyze sales data.</p>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card text-white bg-warning mb-3">
				<div class="card-header">Notifications</div>
				<div class="card-body">
					<h5 class="card-title">7 New Alerts</h5>
					<p class="card-text">Check recent notifications and updates.</p>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<!-- Table Section -->
		<div class="col-12">
			<h3>Recent Activities</h3>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Description</th>
						<th>Date</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td>User John logged in</td>
						<td>2024-11-28</td>
						<td><span class="badge badge-success">Completed</span></td>
					</tr>
					<tr>
						<td>2</td>
						<td>Product X updated</td>
						<td>2024-11-27</td>
						<td><span class="badge badge-info">Pending</span></td>
					</tr>
					<tr>
						<td>3</td>
						<td>New order placed</td>
						<td>2024-11-26</td>
						<td><span class="badge badge-warning">Processing</span></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>