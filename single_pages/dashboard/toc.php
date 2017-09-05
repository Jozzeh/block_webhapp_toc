<?php defined('C5_EXECUTE') or die("Access Denied."); ?>
<form method="post" action="<?= $view->action('saveToc'); ?>" id="toc-settings-form">
  <div class="form-settings">
    <p>
      <?php
      echo t('Add here the css selectors you want to search with the table of content block.');
      ?>
      <br/>
      <span class="small">
        <?php
        echo t('You can fill in "body" or ".ccm-page" to target the entire page.');
        ?>
      </span>
    </p>
    <table class="table table-striped formTable">
      <tr>
        <th>
          <?php echo t('Area (CSS) selectors'); ?>
        </th>
        <th>
          <?php echo t('Human readable name'); ?>
        </th>
        <th>
          &nbsp;
        </th>
      </tr>
      <?php foreach($areaChoices as $identifierName => $humanName){ ?>
        <tr>
          <td>
            <?php
            echo $form->text('identifierName[]', $identifierName, array('placeholder' => t('Class, ID or identifier')));
            ?>
          </td>
          <td>
            <?php
            echo $form->text('humanName[]', $humanName, array('placeholder' => t('Human readable')));
            ?>
          </td>
          <td>
            <a class="btn btn-mini btn-danger removeThisEntry" href='#'>
              <i class="fa fa-trash-o" aria-hidden="true"></i>
            </a>
          </td>
        </tr>
      <?php } ?>

    </table>
    <table class="table table-striped tableAdd">
      <tr>
        <td>
          <?php
          echo $form->text('identifierName[]', '', array('placeholder' => t('Class, ID or identifier')));
          ?>
        </td>
        <td>
          <?php
          echo $form->text('humanName[]', '', array('placeholder' => t('Human readable')));
          ?>
        </td>
        <td>
          <a class="btn btn-mini btn-success addThisEntry" href='#'>
            <i class="fa fa-plus" aria-hidden="true"></i>
          </a>
        </td>
      </tr>
    </table>
  </div>

  <div class="ccm-dashboard-form-actions-wrapper">
     <div class="ccm-dashboard-form-actions">
       <button class="pull-right btn btn-success" type="submit" ><?= t('Save Settings')?></button>
     </div>
   </div>
</form>

<script>
  $(document).ready(function(){
    $('.addThisEntry').click(function(){
      $(".tableAdd input").each(function() {
        $(this).attr("value", $(this).val());
      });
      var tableHtml = $('.tableAdd tbody').html();
      $('.formTable tbody').append(tableHtml);

      $('.formTable .addThisEntry').addClass('removeThisEntry');
      $('.formTable .addThisEntry').removeClass('addThisEntry');
      $('.formTable .removeThisEntry').removeClass('btn-success');
      $('.formTable .removeThisEntry').addClass('btn-danger');
      $('.formTable .removeThisEntry').html('<i class="fa fa-trash-o" aria-hidden="true"></i>');

      $(".tableAdd input").each(function() {
        $(this).attr("value", "");
        $(this).val("");
      });
    })

    $('.removeThisEntry').click(function(){
      $(this).parent().parent().remove();
    });
  });
</script>
