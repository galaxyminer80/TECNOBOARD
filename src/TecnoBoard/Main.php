<?php

namespace TecnoBoard;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\network\mcpe\protocol\SetDisplayObjectivePacket;
use pocketmine\network\mcpe\protocol\SetScorePacket;
use pocketmine\network\mcpe\protocol\types\ScorePacketEntry;
use pocketmine\utils\TextFormat as C;
use pocketmine\event\player\PlayerJoinEvent;
use TecnoBoard\Main;

class Main extends PluginBase implements Listener{

    public function onEnable(){
        $this->getLogger()->info("[TecnoBoard] By HADI_KING Enabled");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->eco = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI");
		$this->pureperms = $this->getServer()->getPluginManager()->getPlugin("PurePerms");
    }
    
    public function numberPacket(Player $player, $score = 1, $msg = ""): void{
        $entrie = new ScorePacketEntry();
        $entrie->objectiveName = "test";
        $entrie->type = ScorePacketEntry::TYPE_FAKE_PLAYER;
        $entrie->customName = str_repeat(" ", 5) . $msg . str_repeat(" ", 3);
        $entrie->score = $score;
        $entrie->scoreboardId = $score;
        $pk = new SetScorePacket();
        $pk->type = 0;
        $pk->entries[] = $entrie;
        $player->sendDataPacket($pk);
    }

    public function onJoin(PlayerJoinEvent $e): void{
        $player = $e->getPlayer();
        $name = $player->getName();
        $money = $this->eco->myMoney($player);
        $group = $this->pureperms->getUserDataMgr($player)->getGroup($player);
	

        $pk = new SetDisplayObjectivePacket();
        $pk->displaySlot = "sidebar";
        $pk->objectiveName = "test";
        $pk->displayName = "§b§lExhaust§3PE";
        $pk->criteriaName = "dummy";
        $pk->sortOrder = 0;
        $player->sendDataPacket($pk);
        $this->numberPacket($player);
        $entrie = new ScorePacketEntry();
        $entrie->objectiveName = "test";
        $entrie->type = ScorePacketEntry::TYPE_FAKE_PLAYER;
        $entrie->customName = str_repeat(" ", 5) . "§e§lACCOUNT" . str_repeat(" ", 3);
        $entrie->score = 2;
        $entrie->scoreboardId = 2;
        $pk2 = new SetScorePacket();
        $pk2->type = 0;
        $pk2->entries[] = $entrie;
        $player->sendDataPacket($pk2);
        $entrie = new ScorePacketEntry();
        $entrie->objectiveName = "test";
        $entrie->type = ScorePacketEntry::TYPE_FAKE_PLAYER;
        $entrie->customName = str_repeat(" ", 5) . "§f". $name . str_repeat(" ", 3);
        $entrie->score = 3;
        $entrie->scoreboardId = 3;
        $pk3 = new SetScorePacket();
        $pk3->type = 0;
        $pk3->entries[] = $entrie;
        $player->sendDataPacket($pk3);
        $entrie = new ScorePacketEntry();
        $entrie->objectiveName = "test";
        $entrie->type = ScorePacketEntry::TYPE_FAKE_PLAYER;
        $entrie->customName = str_repeat(" ", 5) . "" . str_repeat(" ", 3);
        $entrie->score = 4;
        $entrie->scoreboardId = 4;
        $pk4 = new SetScorePacket();
        $pk4->type = 0;
        $pk4->entries[] = $entrie;
        $player->sendDataPacket($pk4);
        $entrie = new ScorePacketEntry();
        $entrie->objectiveName = "test";
        $entrie->type = ScorePacketEntry::TYPE_FAKE_PLAYER;
        $entrie->customName = str_repeat(" ", 5) . " " . str_repeat(" ", 3);
        $entrie->score = 5;
        $entrie->scoreboardId = 5;
        $pk5 = new SetScorePacket();
        $pk5->type = 0;
        $pk5->entries[] = $entrie;
        $player->sendDataPacket($pk5);
        $entrie = new ScorePacketEntry();
        $entrie->objectiveName = "test";
        $entrie->type = ScorePacketEntry::TYPE_FAKE_PLAYER;
        $entrie->customName = str_repeat(" ", 5) . "§b§lMoney" . str_repeat(" ", 3);
        $entrie->score = 6;
        $entrie->scoreboardId = 6;
        $pk6 = new SetScorePacket();
        $pk6->type = 0;
        $pk6->entries[] = $entrie;
        $player->sendDataPacket($pk6);
        $entrie = new ScorePacketEntry();
        $entrie->objectiveName = "test";
        $entrie->type = ScorePacketEntry::TYPE_FAKE_PLAYER;
        $entrie->customName = str_repeat(" ", 5) . "§f" . $money . str_repeat(" ", 3);
        $entrie->score = 7;
        $entrie->scoreboardId = 7;
        $pk7 = new SetScorePacket();
        $pk7->type = 0;
        $pk7->entries[] = $entrie;
        $player->sendDataPacket($pk7);
    }
}
