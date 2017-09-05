<?php
/*
Inspiration Basic version : http://www.dynamicdrive.com/dynamicindex5/automatic-header-anchor-links.htm
Adapted for Concrete5 by Jozzeh
*/
defined('C5_EXECUTE') or die(_("Access Denied."));
?>
<?php
$currentPage = Page::getCurrentPage();
if($currentPage->isEditMode()){
  echo '<div class="well">';
    echo '<strong>';
      echo t('TOC');
    echo '</strong><br/>';
    echo t('The table of content will be build after saving the page...');
  echo '</div>';
}else if(!empty($checkedElements)){
  //not in edit mode
?>
<div id="toc-<?php echo $bID; ?>" class="table-of-content<?php echo $bID; ?> table-of-content">
  <script>
  $(document).ready(function(){
    var blockParams = {htmlElements: '<?= implode(",", $checkedElements); ?>', animateScroll: '<?= $animatescroll; ?>', scrollOffset: '<?= $scrolloffset; ?>', parentClass: '<?= $parentclass; ?>'};
    var thisBlock = $('.table-of-content<?php echo $bID; ?>');
    buildTOC(thisBlock, blockParams);
  });
  </script>
</div>
<?php } ?>
