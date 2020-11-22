<?php

declare(strict_types=1);

namespace Ghezin\cp\tasks;

use pocketmine\scheduler\Task;
use Ghezin\cp\Core;

class MotdTask extends Task{
	
	public function __construct(Core $plugin){
		$this->plugin=$plugin;
		$this->line=-1;
	}
	public function onRun(int $tick):void{
		//$motd=$this->plugin->getConfig()->get("MotdMessages");
		$motd=[
		"§l§bCOLOSSUS PRACTICE §r§f(The Revival)",
		"§l§eNEW » §dSoup PvP",
		"§bNA §5Practice"
		];
		$this->line++;
		$msg=$motd[$this->line];
		$this->plugin->getServer()->getNetwork()->setName($msg);
		if($this->line===count($motd) - 1){
			$this->line = -1;
		}
	}
}