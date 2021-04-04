<?php

namespace OmegaDevFlo\HubCmd;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase; //plugin uses
use pocketmine\math\Vector3; //Für die Position
use pocketmine\Player; // um den spieler zu definieren
use pocketmine\Server; // um den server zu getten
use pocketmine\level\Level; // um eine welt zu getten
use pocketmine\utils\TextFormat; //für nachrichten
use pocketmine\Command\CommandSender; //um nachrichten zu senden
use pocketmine\command\Command; //gettet eine command ausführung

class Main extends PluginBase implements Listener {
    public function onEnable(){
        $this->getLogger()->info(TextFormat::RED."OmegaHub wurde erfolgreich geladen");
        $this->getServer()->loadLevel("world");
    }
    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool
    {
        switch ($cmd->getName()) {
            case "hub":
                if ($sender instanceof Player) {
                    if ($sender->hasPermission("hub.cmd")) {
                        $sender->sendMessage(TextFormat::GREEN . "§l§cOmegaHub §r>> §fYou are now in Hub.");
                        $sender->teleport($this->getServer()->getDefaultLevel()->getSafeSpawn());
                    }
                }
        }
        return true;
    }
}