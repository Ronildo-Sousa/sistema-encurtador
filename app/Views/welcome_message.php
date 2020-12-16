<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.1/css/all.min.css">
	<title>validação</title>
	<style>
		*{
			box-sizing: border-box;
			font-family: 'Open Sans', sans-serif;
		}
		body{
			background-color: #9b59b6;
			display: flex;
			align-items: center;
			justify-content: center;
			min-height: 100vh;
			margin: 0;
		}
		.container {
			background-color: #fff;
			border-radius: 5px;
			box-shadow: 0 2px 5px rgba(0,0,0,0.3);
			overflow: hidden;
			width: 400px;
			max-width: 100%;
		}
		.header{
			background-color: #f7f7f7;
			border-bottom: 1px solid #f0f0f0;
			padding: 20px 40px;
		}
		.header hh2{
			margin: 0;
		}
		.form{
			padding: 30px 40px;
		}
		.form-control{
			margin-bottom: 10px;
			padding-bottom: 20px;
			position: relative;
		}
		.form-control label {
			display: inline-block;
			margin-bottom: 5px;
		}
		.form-control input {
			border: 2px solid #f0f0f0;
			border-radius: 4px;
			display: block;
			padding: 10px;
			font-family: inherit;
			font-size: 14px;
			width: 100%;
		}
		.form-control.success input{
			border-color: #2ecc71;
		}
		.form-control.error input{
			border-color: #e74c3c;
		}
		.form-control i{
			position: absolute;
			top: 40px;
			right: 10px;
			visibility: hidden;
		}
		.form-control.success i.fa-check-circle{
			color: #2ecc71;
			visibility: visible;
		}
		.form-control.error i.fa-exclamation-circle{
			color: #e74c3c;
			visibility: visible;
		}
		.form-control small{
			visibility: hidden;
			position: absolute;
			bottom: 0;
			left: 0;
		}
		.form-control.error small{
			color: #e74c3c;
			visibility: visible;
		}
		.form button{
			background-color: #8e44ed;
			border: 2px solid #8e44ed;
			color: white;
			cursor: pointer;
			border-radius: 4px;
			display: block;
			font-family: inherit;
			font-size: 14px;
			padding: 10px;
			width: 100%;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="header">
			<h2>Criar Conta</h2>
			<form action="" class="form" id="form">
				<div class="form-control success">
					<label>Username</label>
					<input type="text" placeholder="Ronildo" id="username">
					<i class="fas fa-check-circle"></i>
					<i class="fas fa-exclamation-circle"></i>
					<small>Mensagem de erro</small>
				</div>
				<div class="form-control error">
					<label>Email</label>
					<input type="email" placeholder="ronildo@email.com" id="email">
					<i class="fas fa-check-circle"></i>
					<i class="fas fa-exclamation-circle"></i>
					<small>Mensagem de erro</small>
				</div>
				<div class="form-control">
					<label>Password</label>
					<input type="password" placeholder="password" id="password">
					<i class="fas fa-check-circle"></i>
					<i class="fas fa-exclamation-circle"></i>
					<small>Mensagem de erro</small>
				</div>
				<div class="form-control">
					<label>Password Check</label>
					<input type="password" placeholder="password two" id="password2">
					<i class="fas fa-check-circle"></i>
					<i class="fas fa-exclamation-circle"></i>
					<small>Mensagem de erro</small>
				</div>

				<button type="submit">Submit</button>
			</form>
		</div>
	</div>
	<script>
		const form = document.getElementById("form");
		const username = document.getElementById("username");
		const email = document.getElementById("email");
		const password = document.getElementById("password");
		const password2 = document.getElementById("password2");

		form.addEventListener("submit", (e) => {
			e.preventDefault();

			checkInput();
		});

		function checkInput(){
			const usernameValue = username.value.trim();
			const emailValue = email.value.trim();
			const passwordValue = password.value.trim();
			const password2Value = password2.value.trim();

			if (usernameValue === '') {
				
			}
		}
	</script>
</body>
</html>