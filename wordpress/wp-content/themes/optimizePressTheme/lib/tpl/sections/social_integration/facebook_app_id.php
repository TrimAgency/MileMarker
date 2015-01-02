<div class="op-bsw-grey-panel-content op-bsw-grey-panel-no-sidebar cf">
    <?php if($error = $this->error('op_sections_social_integration_facebook_app_id')): ?>
    <span class="error"><?php echo $error ?></span>
    <?php endif; ?>
    
    <label for="op_sections_facebook_app_id" class="form-title"><?php _e('Facebook App ID',OP_SN) ?></label>
    <p class="op-micro-copy"><?php _e('If you would like to integrate Facebook services with your website, please enter your Facebook ID below.',OP_SN) ?></p>
    <?php op_text_field('op[sections][facebook_app_id]',op_default_option('comments', 'facebook', 'id')) ?>
    <div class="clear"></div>
</div>