# Vasar
**The official core system for Vasar/Colossus.**

I developed this core for the intention of private use, so everything is hard coded. I suggest understanding [PHP](https://www.php.net/) and [PocketMine-MP](https://github.com/pmmp/PocketMine-MP) before attempting to make changes.

Enjoy. ❤️️

## Features
- [x] FFA arena management
- [x] Duels system
  - Ranked and Unranked
  - Duration management
  - Spectators
- [x] Party system
  - Maximum membeers is based on rank (lowest = 8, highest = 20)
  - Manage privacy (require an invitation to join or public)
  - Manage members
  - Party duels
  - Party chat (use `*` before your message)
- [x] Various statistical trackings (of use and deprecated)
  - Kills
  - Deaths
  - KDR
  - Killstreak (current and best)
  - Elo
  - Levels
- [x] Scoreboards
- [x] Leaderboards
- [x] Custom entity creation
  - Fully custom throwable potions (2 variations)
  - Fully custom ender pearls
  - Fully custom rods
- [x] Cosmetics & Player-Based Preferences
- [x] Ranks & Permissions
- [x] Staff utilities
  - Permanent ban
  - Temporary ban
  - Mute
  - All bans are carried out through both an IP and client-id blacklisting
  - Notifications on rank changes, ban/mute/rank expirations, gamemode changes, anti-cheat alerts
  - Staff chat (use `!` before your message)
- [x] Anti-Cheat (very limited)
  - Reach
  - CPS
  - High ping
- [x] Bots (very unstable, should be left alone)
- [x] Discord integration (very unstable, should be left alone)

## Config
- [x] Arena Config
```yaml
---

duel-arenas: 
    example-arena:
    
        # The coords where players spawn in a party duel.
        center:
          x: 1
          "y": 1
          z: 1
          
        # The name of the world.
        level: duelworld
        
        # Whether you want to enable player building or not.
        build: true
        
        # The coords where the player spawns in a duel.
        player-pos:
          x: 1
          "y": 1
          z: 1
          
        # The coords where the opponent spawns in a duel.
        opponent-pos:
          x: 1
          "y": 1
          z: 1
          
        # Configure what gamemode this duel map is for.
        # Gamemodes: nodebuff, gapple, fist, sumo, combo
        modes:
          - nodebuff
...
```

- [x] Leaderboard Config (staticfloatingtexts, updatingfloatingtexts)
```yaml
---

# You can name this whatever you want.
topkills:

    x: 4 #x coord where the floatingtext spawns in.
    y: 58 #y coord where the floatingtext spawns in.
    z: -20 #z coord where the floatingtext spawns in.
    
    # The Title of the floating text.
    title: "Top Kills"
    
    # The bottom part of the floating text.
    
    # Allowed variables: {world}, {ip}, {discord}, {shop}, {vote}, {doubleline}, {line}, {player}, {kills}, {deaths}, {kdr}, {elo}, {coins}, {streak}, {player_health}, {player_max_health}, {online_players}, {online_max_players}, {topkills}, {topdeaths}, {topkdr}, {topelo}, {toplevels}, {topwins}, {toplosses}, {topkillstreaks}, {topdailykills} and {topdailydeaths}
    
    text: "{doubleline}{topkills}"
    
    # The world where the floating text spawns in.
    level: lobby
    
...
```

##### Developed by Ghezin aka Wqrro.
