<?php
/* Created by Concrete5 user Jozzeh */
defined('C5_EXECUTE') or die(_("Access Denied."));

$form = Core::make('helper/form');
?>
<div class="form-group">
  <?php echo $form->label('htmlelements', t('Elements to create a table of content from')); ?>
	<div class="input-group" style="width: 100%;">
    <div class="row">
      <div class="col-sm-6">
        <?php
        $h1Checked = isset($checkedElements['h1']);
        echo $form->checkbox('htmlelement[h1]', 'h1', $h1Checked);
        echo ' Heading 1<br/>';
        ?>
        <?php
        $h2Checked = isset($checkedElements['h2']);
        echo $form->checkbox('htmlelement[h2]', 'h2', $h2Checked);
        echo ' Heading 2<br/>';
        ?>
        <?php
        $h3Checked = isset($checkedElements['h3']);
        echo $form->checkbox('htmlelement[h3]', 'h3', $h3Checked);
        echo ' Heading 3<br/>';
        ?>
        <?php
        $h4Checked = isset($checkedElements['h4']);
        echo $form->checkbox('htmlelement[h4]', 'h4', $h4Checked);
        echo ' Heading 4<br/>';
        ?>
        <?php
        $h5Checked = isset($checkedElements['h5']);
        echo $form->checkbox('htmlelement[h5]', 'h5', $h5Checked);
        echo ' Heading 5<br/>';
        ?>
        <?php
        $h6Checked = isset($checkedElements['h6']);
        echo $form->checkbox('htmlelement[h6]', 'h6', $h6Checked);
        echo ' Heading 6<br/>';
        ?>
      </div>
      <div class="col-sm-6">
        <?php
        echo $form->text('htmlelement[classname]', $checkedElements['classname'], array('placeholder' => 'Custom class name'));
        echo '<br/>';
        ?>
        <?php
        echo $form->text('htmlelement[idname]', $checkedElements['idname'], array('placeholder' => 'Custom ID'));
        echo '<br/>';
        ?>
      </div>
    </div>
	</div>
</div>

<div class="form-group">
  <?php echo $form->label('parentclass', t('Search within :')); ?>
	<div class="input-group" style="width: 100%;">
    <?php if(count($areaChoices) > 1){ ?>
      <?php echo $form->select('parentclass', $areaChoices, $parentclass, array('style' => 'width: 100%;')); ?>
    <?php }else if(count($areaChoices) == 1){ ?>
      <?php echo t('Only one option is available.'); ?>
      <?php
        foreach($areaChoices as $key => $value){
          echo '(' . $value . ')';
          echo $form->hidden('parentclass', $key);
        }
      ?>
    <?php }else{ ?>
      <?php echo t('Only one option is available.'); ?>
      <?php
        foreach($areaChoices as $key => $value){
          echo '(' . t('Full page') . ')';
          echo $form->hidden('parentclass', 'body');
        }
      ?>
    <?php } ?>
    <p class="small">
      <?php echo t('Add more options in the settings.'); ?>
    </p>
	</div>
</div>

<div class="form-group">
  <?php echo $form->label('animatescroll', t('Animate scroll')); ?>
	<div class="input-group" style="width: 100%;">
		<?php echo $form->checkbox('animatescroll', 1, $animatescroll); ?>
	</div>
</div>

<div class="form-group">
  <?php echo $form->label('scrolloffset', t('Scroll offset (in pixels)')); ?>
	<div class="input-group">
		<?php echo $form->number('scrolloffset', $scrolloffset ? $scrolloffset : '0', array('required' => 'required', 'style' => 'width: 100%;')); ?>
	</div>
</div>
