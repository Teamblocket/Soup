<?php

namespace Soup;

use pocketmine\plugin\PluginBase;
use pocketmine\item\Item;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\event\player\PlayerInteractEvent;

class Main extends PluginBase implements Listener {

  public function onEnable() {
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
  }
  
  public function handleInteract(PlayerInteractEvent $event) {
    
    $p = $event->getPlayer();
    
    if($event->isCancelled()){
      
      return false;
      
    }
    
    if($event->getItem()->getId() == 282) {
      
      $p->sendMessage("§l§8- §eYou have consumed soup!");
      
      $p->setHealth($event->getPlayer()->getHealth() + 3);
      
      if($event->getItem()->getCount() == 1){
        
        $p->getInventory()->setItemInHand(Item::get(0, 0, 0));
        
      } else {
        
        if($event->getItem()->getCount() !== 1){
          
          $hand = $p->getInventory()->setItemInHand();
          
          $hand->setCount($hand->getCount() - 1);
          
          $p->getInventory()->setItemInHand($hand);
          
        }
      }
      
    }
    
  }
  
}
