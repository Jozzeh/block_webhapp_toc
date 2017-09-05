<?php
namespace Concrete\Package\WebhappToc;

defined('C5_EXECUTE') or die('Access Denied.');

/*
Inspiration Basic version : http://www.dynamicdrive.com/dynamicindex5/automatic-header-anchor-links.htm
Adapted for Concrete5 by Jos De Berdt / Webhapp
*/

use \Concrete\Core\Package\Package;
use Page;
use SinglePage;
use \Concrete\Core\Block\BlockType\BlockType;

class Controller extends Package
{
    protected $pkgHandle = 'webhapp_toc';
    protected $appVersionRequired = '8.0.0';
    protected $pkgVersion = '0.9';

    public function getPackageDescription()
    {
        return t('Adds table of content block to Concrete5.');
    }

    public function getPackageName()
    {
        return t('Table Of Content Block');
    }

    public function install()
    {
      $pkg = parent::install();
      if(!BlockType::getByHandle('table_content')) {
        BlockType::installBlockType('table_content', $pkg);
      }

      $path = '/dashboard/toc';
      $page = Page::getByPath($path);
      if (!is_object($page) || $page->isError()) {
          $page = SinglePage::add($path, $pkg);
      }
      $page->update(array(
          'cName' => 'Table of content settings'
        )
      );

      $pkg->getConfig()->save('block_edit.area_choices', json_encode(array('.ccm-page' => 'Full page')));
    }

    public function update()
    {
      $pkg = Package::getByHandle('webhapp_toc');
      if(!BlockType::getByHandle('table_content')) {
        BlockType::installBlockType('table_content', $pkg);
      }

      $path = '/dashboard/toc';
      $page = Page::getByPath($path);
      if (!is_object($page) || $page->isError()) {
          $page = SinglePage::add($path, $pkg);
      }
      $page->update(array(
          'cName' => 'Table of content settings'
        )
      );
    }
}
?>
