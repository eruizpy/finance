<?php use_helper('I18N', 'Date') ?>
<?php include_partial('account_product/assets') ?>

<div id="page_head">

  <div class="title_actions_bar">
    <h1><?php echo __('New Account Product', array(), 'messages') ?></h1>
    <?php include_partial('account_product/new_edit_header_actions', array('product' => $product, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>
  
</div>

<div class="rule"></div>

<div class="columns newcols clear_fix">
  
  <?php include_partial('account_product/flashes') ?>

  <?php include_partial('account_product/form', array('product' => $product, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>

</div>
