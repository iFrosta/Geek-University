#Архитектура веб-приложений

**Что такое архитектура ПО?**
1. Результат декомпозиции
2. Некие конструктивные решения в организация приложения

**Критерии качественного ПО**
1. Эффективность
2. Гибкость
3. Расширяемость
4. Возможность переиспользования
5. Тестируемость
6. Сопровождаемость

**MVC: Model-View-Controller**
![MVC: Model-View-Controller](assets/MVC.PNG)

**WEB-MVC: WEB-Model-View-Controller**
![WEB-MVC: WEB-Model-View-Controller](assets/WEB-MVC.PNG)

_Стандартное реализации WEB-MVC -  Нет._
**Логику в:**
 - Passive MVC - Контроллер
 - Active MVC - Модель
 
 **SoA: Service-oriented Architecture**
 ![SoA: Service-oriented Architecture](assets/SoA.PNG)
 
**HMVC Hierarchical MVC**
![SoA: Service-oriented Architecture](assets/HMVC.PNG)
  
**MVP Model - View - Presenter**
![SoA: Service-oriented Architecture](assets/MVP.PNG)
**SPA - singal page application**

**MVVM Model - View - ViewModel**
![SoA: Service-oriented Architecture](assets/MVVVM.PNG)

**1. Плоская структура - все в одной папке**
-
- UserController
- ProductController
- User
- Role
- Product
- UserService
...

**2. Плоская по уровням**
-
- Controller
    - UserController 
    - ProductController
- Entity
    - User
    - Role
    - Product
- Service
    - UserService
...

**3. Модульная**
-
- User
    - Controller
        - UserController 
    - Entity
        - User
        - Role
    - Service
        - UserService
- Product
    - Controller
        - ProductController
    - Entity 
        - Product
...

**4. Луковая, предлагаема DDD**
-
- User
    - Http
        - Controller
            - UserController 
        - Entity
            - User
        - Service
            - UserService
        - Domain
            - Entity
                - User
                - Role
- Product
    - Http
        - Controller
            - ProductController
        - Entity 
            - Product
...
