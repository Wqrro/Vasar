<?php

declare(strict_types=1);

namespace Ghezin\cp\discord;

use pocketmine\Server;

use Ghezin\cp\tasks\DiscordTask;

class Webhook{

	protected $url; 

	public function __construct(string $url){
		$this->url=$url;
	}
	public function getURL():string{
		return $this->url;
	}
	public function isValid():bool{
		return filter_var($this->url, FILTER_VALIDATE_URL)!==false;
	}
	public function send(Message $message):void{
		Server::getInstance()->getAsyncPool()->submitTask(new DiscordTask($this, $message));
	}
}