<?php 
if ($use_username) {
	$username = array(
		'name'	=> 'username',
		'id'	=> 'username',
		'value' => set_value('username'),
		'maxlength'	=> $this->config->item('username_max_length', 'tank_auth'),
		'size'	=> 30,
                'type'=> 'user',
                'class' => 'form-control',
                'placeholder' => 'Nombre de usuario'
	);
       
       
}
$email = array(
	'name'	=> 'email',
        'type'	=> 'email',
	'id'	=> 'email',
        'class' => 'form-control',
        'placeholder' => 'Email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
        'autofocus'	=> 'true',
	
);
$password = array(
	'name'	=> 'password',
        'type'	=> 'password',
	'id'	=> 'password',
        'class' => 'form-control',
        'placeholder' => 'Contraseña',
        'autofocus'	=> 'true',
         'value' => set_value('password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	
);
$confirm_password = array(
	'name'	=> 'confirm_password',
        'type'	=> 'password',
	'id'	=> 'confirm_password',
        'class' => 'form-control',
   	'value' => set_value('confirm_password'),
        'placeholder' => 'Confirme contraseña',
        'autofocus'	=> 'true',
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
);
?>

  <section id="login" class="about">
       <div class="container">
 <?php
          $attributes = array('id' => 'login_form','class' => 'form-signin','role' => 'form');
          echo form_open($this->uri->uri_string(),$attributes); ?>
    
        <h2 class="form-signin-heading">Registrarse</h2>
       
     <?php echo form_input($username); ?>
        <?php echo isset($errors[$username['name']])?$errors[$username['name']]:''; ?>
        
     <?php echo form_input($email); ?>
         <?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?>
        
       <?php echo form_input($password); ?>
        <td style="color: red;"><?php echo form_error($password['name']); ?></td>
        <?php echo form_input($confirm_password); ?>
        <td style="color: red;"><?php echo form_error($confirm_password['name']); ?></td>
        <!-- <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>-->
       <!-- <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>-->
     
        <?php
         $data = array(
                        'name' => 'boton_ingresar',
                        'class' => 'btn btn-lg btn-primary btn-block',
                        'value' => 'Registrar',
                        'type' => 'submit'
                    );

        echo form_submit($data).  form_close(); ?>
      
    </div> <!-- /container -->
        <!-- /.container -->
    </section>