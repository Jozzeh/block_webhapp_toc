<?php
namespace Concrete\Package\WebhappToc\Block\TableContent;
use \Concrete\Core\Block\BlockController;
use Package;

/*
Inspiration Basic version : https://codepen.io/molefrog/pen/ieJbo
Adapted for Concrete5 by Jozzeh
*/

defined('C5_EXECUTE') or die(_("Access Denied."));

class Controller extends BlockController {
	protected $btTable = 'btTableContent';
	protected $btInterfaceWidth = "600";
	protected $btInterfaceHeight = "400";
  protected $btCacheBlockOutput = true;
	protected $btCacheBlockRecord = true;

	public function getBlockTypeDescription() {
		return t("Creates a table of content from your headings.");
	}

	public function getBlockTypeName() {
		return t("Table Of Content");
	}

	public function save($args){
		$args['htmlelements'] = json_encode($args['htmlelement']);
		parent::save($args);
	}

	public function edit(){
		$checkedElements = json_decode($this->record->htmlelements, true);
		$this->set('checkedElements', $checkedElements);

		$pkg = Package::getByHandle('webhapp_toc');
		$areaChoices = json_decode($pkg->getConfig()->get('block_edit.area_choices'), true);
		$this->set('areaChoices', $areaChoices);
	}

	public function add(){
		$pkg = Package::getByHandle('webhapp_toc');
		$areaChoices = json_decode($pkg->getConfig()->get('block_edit.area_choices'), true);
		$this->set('areaChoices', $areaChoices);
	}

	public function view(){
		$checkedElements = json_decode($this->record->htmlelements, true);
		$checkedElements['classname'] = trim($checkedElements['classname'], ".");
		$checkedElements['idname'] = trim($checkedElements['idname'], "#");
		if($checkedElements['classname'] != ''){
			$checkedElements['classname'] = ".".$checkedElements['classname'];
		}
		if($checkedElements['idname'] != ''){
			$checkedElements['classname'] = "#".$checkedElements['classname'];
		}
		$checkedElements = array_filter($checkedElements);
		$this->set('checkedElements', $checkedElements);
	}
}
