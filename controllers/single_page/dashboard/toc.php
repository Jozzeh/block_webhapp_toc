<?php
namespace Concrete\Package\WebhappToc\Controller\SinglePage\Dashboard;
use \Concrete\Core\Page\Controller\DashboardPageController;
use Package;
use Core;

class Toc extends DashboardPageController{
    public function view(){
      $pkg = Package::getByHandle('webhapp_toc');
      $areaChoices = json_decode($pkg->getConfig()->get('block_edit.area_choices'), true);

      $this->set('areaChoices', $areaChoices);
    }

    public function saveToc(){
      $pkg = Package::getByHandle('webhapp_toc');

      $args = $this->post();

      if(!empty($args)){
        $indexCount = 0;
        $saveArray = array();
        foreach($args['identifierName'] as $idName){
          if($idName != '' && $args['humanName'][$indexCount] != ''){
            $saveArray[$idName] = $args['humanName'][$indexCount];
          }
          $indexCount++;
        }
        if(!empty($saveArray)){
          $pkg->getConfig()->save('block_edit.area_choices', json_encode($saveArray));
        }else{
          $this->error = t('At least one CSS selector and name is required.');
        }
      }

      $areaChoices = json_decode($pkg->getConfig()->get('block_edit.area_choices'), true);
      $this->set('areaChoices', $areaChoices);
    }
}
