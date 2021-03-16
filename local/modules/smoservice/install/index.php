<?
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

Class smoservice extends CModule
{
	var $MODULE_ID = "smoservice";
	var $MODULE_VERSION;
	var $MODULE_VERSION_DATE;
	var $MODULE_NAME;
	var $MODULE_DESCRIPTION;
	var $MODULE_CSS;
	var $MODULE_GROUP_RIGHTS = "Y";

	function smoservice()
	{
		$arModuleVersion = array();

		include(__DIR__.'/version.php');

		$this->MODULE_VERSION = $arModuleVersion["VERSION"];
		$this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];

		$this->MODULE_NAME = "Модуль оплаты SmoService";
		$this->MODULE_DESCRIPTION = "Что то!";
	}


	function InstallDB($install_wizard = true)
	{
		RegisterModule("smoservice");
		return true;
	}

	function UnInstallDB($arParams = Array())
	{
		UnRegisterModule("smoservice");
		return true;
	}

	function InstallEvents()
	{
		return true;
	}

	function UnInstallEvents()
	{
		return true;
	}

	function InstallFiles($arParams = array())
	{
		CopyDirFiles(
			$path, $_SERVER["DOCUMENT_ROOT"]."/bitrix/smoservice/templates",
			$_SERVER['DOCUMENT_ROOT'] . '/bitrix/php_interface/include/sale_payment/', true, true );	
		return true;
	}

	function UnInstallFiles()
	{
		//DeleteDirFiles($_SERVER["DOCUMENT_ROOT"]."/bitrix/smoservice/templates", $_SERVER["DOCUMENT_ROOT"]."/bitrix/templates");
		return true;
	}

	function DoInstall()
	{
		$this->InstallFiles();
		$this->InstallDB(false);
	}

	function DoUninstall()
	{
        
		$this->unInstallDB(false);
	}
}
?>  