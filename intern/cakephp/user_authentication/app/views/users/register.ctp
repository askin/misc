<div class="register">
    <h2>Register</h2>
    <?php echo $form->create('User', array('action' => 'register'));?>
    <?php echo $form->input('username');?>
    <?php echo $form->input('password');?>
    <?php echo $form->submit('Register');?>
    <?php echo $form->end(); ?>
</div>