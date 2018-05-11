# Installation #
#### **In bash**
* Type **git clone https://github.com/RobJonesWeb/Ethics-Management-Website.git**
* Type **composer update**
    * wait for composer to finish updating
* Type **cp .env.example .env**
####copy the below configuration and paste into .env
> APP_NAME=Laravel <br/>
  APP_ENV=local <br/>
  APP_KEY= <br/>
  APP_DEBUG=true <br/>
  APP_LOG_LEVEL=debug <br/> 
  APP_URL=http://localhost <br/>
 <br/> 
> DB_CONNECTION=mysql <br/>
  DB_HOST=127.0.0.1 <br/>
  DB_PORT=3306 <br/>
  DB_DATABASE=ethics-website <br/>
  DB_USERNAME=root <br/>
  DB_PASSWORD=webdev <br/>
  <br/>
> BROADCAST_DRIVER=log <br/>
  CACHE_DRIVER=file <br/>
  SESSION_DRIVER=file <br/>
  SESSION_LIFETIME=120 <br/>
  QUEUE_DRIVER=sync <br/>
  <br/>
> REDIS_HOST=127.0.0.1 <br/>
  REDIS_PASSWORD=null <br/>
  REDIS_PORT=6379 <br/>
  <br/>
> MAIL_DRIVER=smtp <br/>
  MAIL_HOST=smtp.mailtrap.io <br/>
  MAIL_PORT=2525 <br/>
  MAIL_USERNAME=null <br/>
  MAIL_PASSWORD=null <br/>
  MAIL_ENCRYPTION=null <br/>
  <br/>
> PUSHER_APP_ID= <br/>
  PUSHER_APP_KEY= <br/>
  PUSHER_APP_SECRET= <br/>
  PUSHER_APP_CLUSTER=mt1 <br/>

#### **in Bash:**

* type **php artisan key:generate**
####In MySQL Workbench
* Create the database
    * Open MySQL Workbench
    * Create a new schema
    * name it '**ethics-website**'
    * Give it a default collation of '**utf8 - default collation**'
    * Click Apply twice
#### **in Bash:**

* Type **php artisan migrate**
* Type **php artisan db:seed**
* Type **php artisan serve**

####Default Logins **Caps-sensitive**:

* Robert Jones (Student)
    * Email: **robert.jones7@edgehill.ac.uk**
    * Password: **GraduationRocks** 
    
* Mark Hall (Supervisor)
    * Email: **hallmark@edgehill.ac.uk**
    * Password: **WebDevRocks** 
    
* Dave Walsh (Supervisor)
    * Email: **walsh_d@edgehill.ac.uk**
    * Password: **WebDevRocks** 
   
* Collette Gavan (Supervisor)
    * Email: **gavanc@edgehill.ac.uk**
    * Password: **WebDevRocks** 

**Additional Student accounts can be created if needed** <br/>
**To create a supervisor account, the user must be already logged in through a supervisor account, the option to register a new staff member will appear in the navigation**
