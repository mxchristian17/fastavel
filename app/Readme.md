# SimpleBell
---
## Execution Order
-index.php
    - core.php
    - src/database.php
    - src/models.php
    - src/views.php
    - src/controllers.php
    - src/middlewares.php
    - src/settings.php
    - src/routes/routes.php
        - middlewares
        - src/set.php
        - controllers
        - layouts

## Global variables
- $_SESSION['userId']
- $_SESSION['user']
    - $_SESSION['user']['ID']
    - $_SESSION['user']['Name']
    - $_SESSION['user']['Surname']
    - $_SESSION['user']['DarkMode']
- $global["darkMode"]
- $global["navBarColor"]
- $global["footerColor"]