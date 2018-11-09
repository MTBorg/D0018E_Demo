# Martins Git Tutorial
### Här får ni möjligheten att fördjupa er i versionshanteringsverktyget Git.

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
**OBS! Ändra ALDRIG någonting på master**
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
