# Martins Git Tutorial
### Här får ni möjligheten att fördjupa er i versionshanteringsverktyget Git.

#### Naming convention för branches

  * f - feature implenting new features
  * b - bug fixing bugs
  * t - testing testing functionality
  * s - sketch trying out new ideas
  
EX: Du ska testa din experimentella idè om hur du kan fixa en bug som uppstår i en feature du försöker implementera.
`
fFeature/bBug/sSketch/tTest
`

För att klona repositoryn
```
git clone https://github.com/dynematic/D0018E_Group1
```
Detta kommer att skapa en mapp som heter D0018E_Group1 som är "up-to-date" med repon som ligger uppe på github.
Gå in i mappen
```
cd D0018E_Group1
```
Efter att ha klonat repon defaultas man till branchen master.
Du kan se vilken branch du är på genom att skriva
```
git status
```
**OBS! Ändra ALDRIG någonting på master.**
**DEN SOM ÄNDÅ BESTÄMMER SIG FÖR ATT GÖRA DET HAR TVÅ VAL:**
1. **FÅ KICKEN** 
2. **BLI AVRÄTTAD**

Alla förändringar du vill göra **MÅSTE** du göra på en ny branch.
Du kan se vilken branch du är på samt alla som finns med
```
git branch -a
```
(de branches som börjar med origin/ är de som ligger uppe på github och övriga är de lokala på din maskin).
För att skapa en ny branch skriver du (du skickas automatiskt till den nya branchen)
```
git checkout -b <branchName>
```
Med
```
git status
```
ser du alla filer du har ändrat på.
När du har gjort något du vill spara "committar" du det. För att markera vilka filer som ska commitas ("stagea") skriver du
```
git add <fileName>
```
eller för att stagea alla filer
```
git add -A
```
Sedan kan du commita ändringarna genom att skriva 
```
git commit -m <"This is a commit message">
```
Flaggan -m anger ett commit message och det är **VÄLDIGT** viktigt att du alltid skriver tydliga meddelanden.
För att "pusha" dina commits till github repon skriver du
```
git push origin <branchName>
```
Du bör pusha varje gång du slutar arbeta.
**ALLA MERGES I DET HÄR PROJEKTET SKA SKE VIA PULL REQUEST PÅ GITHUB. DÄRFÖR KOMMER JAG INTE DELA MED MIG OM HUR MAN
MERGAR LOKALT. HA!**

Du kan ta bort en lokal branch (du kan inte vara på den branch du ska ta bort) genom
```
git branch -D <branchName>
```
Det kan hända att din lokala branch ligger efter motsvarande branch som ligger uppe på servern, du drar då ner ändringar med
```
git pull origin <branchName>
```
Du bör "pulla" varje gång du varit borta från projektet.
För att byta till en annan branch skriver du
```
git checkout <branchName>
```
För att visa commit loggen för den branch du är på skriver du
```
git log
```

Här en bra video som visar workflowet som vi **SKA** ha under projektets gång. (Börja kolla på den angivna tiden och strunta i allt annat)

[![GITHUB PULL REQUEST, Branching, Merging & Team Workflow](http://img.youtube.com/vi/oFYyTZwMyAg/0.jpg)](https://youtu.be/oFYyTZwMyAg?t=395)
