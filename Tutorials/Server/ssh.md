## How to SSH


### Windows


Download 
[Putty](https://www.chiark.greenend.org.uk/~sgtatham/putty/latest.html)


Now start putty.exe

```
Host Name (or IP address): 130.240.202.225
Port: 22 or NA
```
Under Category:

```
Go to SSH->Auth->Browse... and choose the private key you got from the 
keys folder. 
```

Go back to Session and give the session a name for example: grp1-server, 
then press "Save".


Press "Open"

```
User: bugmana
```

Click "yes" on prompts...


Done.


### Linux

```
Save the private key located in the keys folder to "~/.ssh/" and use "chmod 700 id_rsa" 
```

then

```
ssh bugmana@130.240.202.225
```


Done.

### Make a sudo user

```
sudo adduser username
```

Använd ditt riktiga namn i lowercase, ex. "aron"
Fyll i dina uppgifter.

För att ge dig root (sudo)

```
sudo usermod -aG sudo username
```

Logga in på din användare med


```
su - username
```
Testa om du är root
 
```
sudo whoami
```
