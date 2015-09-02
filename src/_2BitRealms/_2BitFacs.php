<?php
namespace _2BitRealms;
use pocketmine\utils\Config;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use _2BitRealms\command\SubCommandMap;
use _2BitRealms\db\DataBase;
class _2BitFacs extends PluginBase implements Listener {
	
	private $db;
	
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->saveDefaultConfig();
		
		//Commands
	    $this->getServer()->getCommandMap()->register(SubCommandMap::class, new SubCommandMap($this));
	    
	    //Database
	    $this->db = new \SQLite3($this->getDataFolder() . "_2BitFacs.db");
	}
	
	public function getDatabase(){
		return $this->db;
	}
	
	public function setDatabase(Database $db){
		$this->db = $db;
	}
	
	public function onDisable(){
		$this->db->close();
	}
	
}