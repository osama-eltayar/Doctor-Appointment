<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

<h3>Appointment small application</h3>
<p>to run the project please follow this intructions</p>
<ol>
  <li>git clone https://github.com/osama-eltayar/Doctor-Appointment.git </li>
  <li>open the project  cd /Doctor-Appointment</li>
  <li>composer install</li>
  <li>npm install</li>
  <li>cp .env.example .env</li>
  <li>php artisan key:generate</li>
  <li>configure your database in .env file</li>
  <li>configure your email provider  in .env file</li>
  <li>php artisan migrate</li>
  <li>php artisan db:seed</li>
  <li>php artisan serve</li>
</ol>
<hr>
<h4> by default you have admin account  </h4>
<p> admin email : superadmin@gmail.com  </p>
<p> admin password : 12345678  </p>
<hr>
<p> you have some doctors accounts   </p>
<p> doctors password : 12345678    </p>
<hr>
<p> register patient and start using app    </p>
<p> patient and doctor login by name and password - admin by email and password</p>
<hr>
<p> application by default use sync queue if you want use database queue to send notification in back-ground follow this  </p>
<ol>
  <li>change QUEUE_CONNECTION=sync to QUEUE_CONNECTION=database in .env file  </li> 
  <li>php artisan queue:work</li>  
</ol>





