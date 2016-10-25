@echo off

set Putty="C:\Program Files (x86)\PuTTY\putty.exe"
set LocalDir=%~dp0%

cd %LocalDir%

vagrant up
set SshPort=2222
FOR /F "tokens=1-2 delims= " %%G IN ('vagrant ssh-config') DO (
    if "%%G"=="Port" set SshPort=%%H
)

echo "Local Port : %SshPort%"
start "" /b %Putty% -ssh -P %SshPort% -i "%LocalDir%\vagrant-insecure.ppk" vagrant@127.0.0.1
pause
