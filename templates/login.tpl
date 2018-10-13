{include file="header.tpl"}

			<div class="container-fluid mt-8">
				<div id="login">
						<form name='form-login' method="post" action="verificarLogin">
							<span class="fontawesome-user"></span>
							<input type="text" id="user" name="user" placeholder="Username">
							<span class="fontawesome-lock"></span>
							<input type="password" id="pass" name="pass" placeholder="Password">
							<div class="">
								<p class="errorForm">{$Message}</p>
							</div>
							<input type="submit" value="Login">
					</form>
				</div>
			</div>

{include file="footer.tpl"}
