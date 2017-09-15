<?php

namespace Soup;

use pocketmine\plugin\PluginBase;
use pocketmine\item\Item;
use pocketmine\block\Block;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\event\player\PlayerInteractEvent;

class Main extends PluginBase implements Listener {

  public function onEnable() {
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
  }
  
  public function handleInteract(PlayerInteractEvent $event) { 
  
    if($event->getItem()->getId() == 282) {
 
  $event->getPlayer()->sendMessage("§l§8- §eYou have consumed soup!");
  $event->getPlayer()->setHealth($event->getPlayer()->getHealth() + 3);
  $event->getPlayer()->getInventory()->setItemInHand(Item::get(0));
  
    }
  }
}