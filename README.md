<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Project

 
1.  Create migration of user, campaign and report table. user_email and campaign_id are foreign key in report table.
User Table:
ID
Name
Email
Username
Password
Remember Token
Timestamp

Campaign Table:
ID
Name
Timestamp

Report Table:
ID
User Email
Source URL
Destination URL
User Agent
IP
Timestamp
Campaign ID
 
2. Seed data for user, campaign and report table. 1 user can click from multiple source url.  
3. Create a single page application where admin can add new campaign, check all campaign list. View report. 
4. Create a report with pagination where admin can check the number of times one user has clicked that particular url. Admin can search (Anything), export & change the number of  per page records. Export should be done in XLSX / CSV format.
Report contains below columns,
Click, User Name, User Email, Campaign Name Source URL, Destination URL, User Agent, Timestamp.
Requirements:
Laravel 8
VueJS ^2
MySQL




## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
