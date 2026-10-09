@echo off
title Nabhovid Website
where php >nul 2>nul
if %errorlevel%==0 (
  start "" http://localhost:8000
  php -S localhost:8000
  goto :eof
)
where py >nul 2>nul
if %errorlevel%==0 (
  start "" http://localhost:8000
  py -m http.server 8000
  goto :eof
)
echo Python or PHP was not found.
echo You can double-click index.html to preview the static website.
pause
