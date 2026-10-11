# GigPlanner

Lukáš Klein

5ZYI31

## Stručný opis projektu
GigPlanner je webová aplikácia pre organizátorov hudobných festivalov. Nahrádza organizovanie pomocou e-mailov a zdieľaných tabuliek a zhromažďuje na jednom mieste prihlasovanie kapiel, výber do programu, tvorbu harmonogramu a technické podklady pre zvukárov.

Kapely sa prihlásia cez online formulár, priložia technický rider, stage plán a hudobné ukážky tvorby. Organizátori prihlášky posudzujú, hodnotia a vyberajú kapely do programu. Z vybraných kapiel potom skladajú harmonogram po dňoch a pódiách, pričom aplikácia stráži časové kolízie a čas na prestavbu pódia. Technici majú k dispozícii rider a stage plán priradené ku konkrétnemu vystúpeniu a návštevníci si môžu pozrieť verejný program bez prihlásenia.

## Role v projekte
### 1. Organizátor (admin)
Hlavný administrátor systému, ktorý spravuje a filtruje prihlášky kapiel, schvaľuje ich a zostavuje finálny časový harmonogram festivalu.

### 2. Kapela
Registrovaný používateľ (zástupca kapely), ktorý môže podať prihlášku na festival, nahrať technický rider, stage plán, demo ukážky a sledovať aktuálny stav schvaľovania svojej účasti.

### 3. Zvukár / Technik
Odborný personál festivalu, ktorý má prístup k detailným technickým požiadavkám (riderom) a stage plánom pre jednotlivé časové sloty na pódiách.

### 4. Návštevník (neprihlásený používateľ)
Verejný návštevník festivalu, ktorý má prístup k zoznamu schválených účinkujúcich a aktuálnemu harmonogramu podujatia.

## Prípady použitia podľa rolí
### Organizátor (admin)
* vytvorí nový ročník festivalu
* otvorí detail prihlášky, pozrie si rider a ukážky tvorby a pridá hodnotenie
* zmení stav prihlášky (v posudzovaní, akceptovaná, zamietnutá)
* zaradí akceptovanú kapelu do slotu
* vytvorí harmonogram

### Kapela
* zaregistruje sa a prihlási
* vytvorí profil kapely a pridá, upraví alebo odstráni členov kapely
* podá prihlášku na aktuálny ročník, spoločne s demo ukážkami tvorby
* nahrá súbor s technickým riderom a stage plánom
* sleduje stav svojej prihlášky

### Zvukár
* prezerá si harmonogram
* má prístup k stage plánu kapiel
* vidí poznámky pre techniku k jednotlivým slotom

### Návštevník
* pozrie si aktuálny program po dňoch a pódiách
* pozrie si profil a detaily o schválených kapelách

## Plánované entity
### users (používatelia)
* účel: prihlasovanie a role, registráciou vzniká len rola kapela a rolu organizátora a technika prideľuje admin
* atribúty: id, e-mail, hash hesla, zobrazované meno, rola (organizátor, kapela, technik), dátum registrácie
* vzťahy: vlastní kapely, píše hodnotenia prihlášok

### bands (kapely)
* účel: profil kapely nezávislý od konkrétneho ročníka, takže sa nemusí zadávať znova
* atribúty: id, vlastník (používateľ), žáner, názov, popis, kontaktný e-mail, telefón, odkaz na ukážky tvorby, čas prestavby (minúty)
* vzťahy: patrí používateľovi

### band_members (členovia kapely)
* účel: zostava kapely
* atribúty: id, kapela, meno, nástroj alebo úloha
* vzťahy: patrí jednej kapele

### applications (prihlášky)
* účel: prihláška kapely na konkrétny ročník s jej stavom
* atribúty: id, ročník, kapela, stav (v posudzovaní, akceptovaná, zamietnutá), dátum podania
* vzťahy: patrí jednej kapele a jednému ročníku, kapela môže mať na ročník len jednu prihlášku

### application_files (súbory prihlášky)
* účel: súbory k prihláške
* atribúty: id, prihláška, typ (rider, stage plán, demo), názov, typ súboru, dátum nahratia
* vzťahy: patrí jednej prihláške

### application_reviews (hodnotenia prihlášok)
* účel: interné hodnotenie organizátorov, viditeľné len organizátorom
* atribúty: id, prihláška, hodnotiteľ (používateľ), skóre, komentár, dátum
* vzťahy: spája používateľov a prihlášky

### festivals (ročníky festivalu)
* účel: umožňuje používať aplikáciu aj pre ďalšie ročníky
* atribúty: id, názov, rok, dátum začiatku, dátum konca, aktívny
* vzťahy: má viacero pódií a prihlášok

### stages (pódiá)
* účel: miesta konania vystúpení
* atribúty: id, ročník, názov
* vzťahy: patrí jednému ročníku a má viacero slotov

### slots (vystúpenia v harmonograme)
* účel: zaradenie akceptovanej kapely do programu
* atribúty: id, pódium, prihláška, začiatok, koniec, poznámka pre techniku
* vzťahy: patrí jednému pódiu a jednej prihláške

## Vzťahy medzi entitami
users 1:N bands: jeden používateľ môže spravovať viacero kapiel.  
bands 1:N band_members: kapela má viacero členov.  
festivals 1:N stages: ročník má viacero pódií.  
festivals 1:N applications: ročník má viacero prihlášok.  
bands 1:N applications: kapela sa môže prihlásiť na viacero ročníkov, na jeden ročník len raz.  
applications 1:N application_files: prihláška má viacero súborov (rider, stage plán, demo).  
stages 1:N slots: pódium má viacero vystúpení.  
applications 1:1 slots: prihláška má najviac jedno vystúpenie.  
users M:N applications cez tabuľku application_reviews: viacerí organizátori môžu hodnotiť viacero prihlášok.

## Hlavné stránky aplikácie
### 1. Verejný program
* Hlavný prehľad festivalového programu pre návštevníkov a verejnosť

### 2. Profil kapely
* Údaje o kapele a zoznam jej členov

### 3. Prehľad prihlášok
* Tabuľkové rozhranie pre organizátora s možnosťou filtrovania

### 4. Tvorba harmonogramu
* Rozhranie na vytváranie a úpravu časových slotov, priradenie pódií a kapiel

### 5. Technický pohľad (sekcia pre zvukárov)
* Prehľad vystúpení s rýchlym prístupom k technickým riderom a stage plánom

## Rozdelenie funkcionality
### Základné funkcie
* Používateľ sa môže zaregistrovať a prihlásiť. Podľa roly (kapela, organizátor, technik) vidí len to, čo sa ho týka.
* Kapela si vytvorí profil, pridá k nemu členov a podá prihlášku na festival. K prihláške priloží technický rider a stage plán.
* Kapela vidí, v akom stave je jej prihláška (v posudzovaní, akceptovaná, zamietnutá).
* Organizátor vidí zoznam všetkých prihlášok, vie ho filtrovať podľa stavu a žánru, otvoriť detail s podkladmi, kapelu ohodnotiť a zmeniť stav prihlášky.
* Organizátor zaradí akceptované kapely do harmonogramu podľa dňa, pódia a času.
* Technik si otvorí harmonogram a pri každom vystúpení nájde rider, stage plán a poznámky pre techniku.
* Návštevník si bez prihlásenia pozrie program po dňoch a pódiách a profily kapiel.
* Aplikácia je prehľadná na počítači aj na mobile.

### Rozširujúce funkcie
* Setlist kapely: kapela si k svojmu vystúpeniu napíše zoznam piesní (poradie, názov, dĺžka, poznámka) a prípadne k nim pridá texty. Technici a zvukári ho uvidia pri vystúpení, takže budú vedieť, v ktorej časti programu sa kapela nachádza.
* Časy príchodu a soundchecku: organizátor určí každej kapele čas príchodu a soundchecku a kapela ich vidí vo svojom účte.
* Zázemie kapely: kapela vyplní počet ľudí, požiadavky na jedlo a ubytovanie, aby mal organizátor všetko na jednom mieste.
* Vizuálna časová os harmonogramu: namiesto zoznamu vystúpení prehľadná časová os po pódiách, v ktorej sa dajú vystúpenia presúvať.
* Môj program pre návštevníka: návštevník si označí obľúbené vystúpenia a vidí ich v osobnom zozname.
* Export programu: program sa dá stiahnuť ako PDF alebo pridať do kalendára v mobile.
* Vstupenky: jednoduchá evidencia vstupeniek (typy vstupeniek, rezervácia, QR kód na vstupe).