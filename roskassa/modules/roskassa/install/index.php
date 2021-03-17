<?
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

Class Roskassa extends CModule
{
	var $MODULE_ID = "roskassa";
	var $MODULE_VERSION;
	var $MODULE_VERSION_DATE;
	var $MODULE_NAME;
	var $MODULE_DESCRIPTION;
	var $MODULE_CSS;
	var $MODULE_GROUP_RIGHTS = "Y";

	function roskassa()
	{
		$arModuleVersion = array();

		include(__DIR__.'/version.php');

		$this->MODULE_VERSION = $arModuleVersion["VERSION"];
		$this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];

		$this->MODULE_NAME = "Модуль оплаты Roskassa";
		$this->MODULE_DESCRIPTION = "Что то!";
	}


	function InstallDB($install_wizard = true)
	{
		RegisterModule("roskassa");
		$sql = file_get_contents(__DIR__ .'/install.sql');
		if ($sql) {
			Bitrix\Main\Application::getConnection()->query($sql);
		}
		return true;
	}

	function UnInstallDB($arParams = Array())
	{
		UnRegisterModule("roskassa");
		$sql = file_get_contents(__DIR__ .'/install.sql');
		if ($sql) {
			\Bitrix\Main\DB\Connection::dropTable($sql);
		}
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
			$path, $_SERVER["DOCUMENT_ROOT"]."/bitrix/roskassa/templates",
			$_SERVER['DOCUMENT_ROOT'] . '/bitrix/php_interface/include/sale_payment/', true, true );	
		return true;
	}

	function UnInstallFiles()
	{
		DeleteDirFiles($_SERVER["DOCUMENT_ROOT"]."/bitrix/roskassa/templates", $_SERVER["DOCUMENT_ROOT"]."/bitrix/templates");
		return true;
	}

	function DoInstall()
	{
		$this->InstallFiles();
		$this->InstallDB(false);
	}

	function DoUninstall()
	{
		$this->UnInstallFiles();
		$this->unInstallDB(false);
	}
}
?>  