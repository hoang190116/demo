<?php
include("admin/inc/conn.php");
include("head.php");


		$id = $_GET['id'];

		?>
		<style>
			input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {-webkit-appearance: none;}
		</style>
		<div class="row">
			<form action="payment.php?id=<?=$id?>">
			<div style="background-color: #262626; padding: 35px; color: white; border-radius: 18px; margin-left: 30%; margin-right: 30%">
				<div class="p-i">Full Name:<br><input type="text" required></div>
				<div class="p-i">Phone number:<br> <input type="number" required><br></div>
				<div class="p-i">Bank:<br> <select>
					<option>Paypal</option>
					<option>Mastercard</option>
					<option>Visa</option>
				</select> </div>
				<div class="p-i">Card number:<br> <input type="number" required></div>
				<div class="p-i">Passport:<br> <input type="text" required></div>
			</div>
			<input type="hidden" name="id" value="<?=$id?>">
			<button class="p-u-btn" style="transform: translate(-500%,-150%);" type="submit">Payment</button>
			</form>
		</div>
<?php include('footer.php'); ?>