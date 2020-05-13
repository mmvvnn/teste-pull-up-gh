<div class="login-wrapper" id="login-content">
    <div class="login-content">
        <a href="#" class="close">x</a>
        <h3>Login</h3>
        <form method="post" action="">
			@csrf
        	<div class="row">
        		 <label for="username">
                    E-mail:
                    <input type="text" name="email" id="email" placeholder="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$" required="required" />
                </label>
        	</div>
           
            <div class="row">
            	<label for="password">
                    Senha:
                    <input type="password" name="password" id="password" placeholder="******" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required="required" />
                </label>
            </div>
            <div class="row">
            	<div class="remember">
					<div>
						<input type="checkbox" name="remember" value="Remember me"><span>Lembrar</span>
					</div>
            		<a href="#">Esqueceu a senha?</a>
            	</div>
            </div>
           <div class="row">
           	 <button type="submit">Entrar</button>
           </div>
        </form>
        <div class="row">
        	<p>Ou entre com</p>
            <div class="social-btn-2">
            	<a class="fb" href="#"><i class="ion-social-facebook"></i>Facebook</a>
            	<a class="tw" href="#"><i class="ion-social-twitter"></i>Twitter</a>
            </div>
        </div>
    </div>
</div>