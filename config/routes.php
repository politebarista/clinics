<?php

return [
    'cabinet' => 'cabinet/index', // actionIndex в CabinetController
    // врачи
    'doctor/index' => 'doctor/index', // actionIndex в DoctorController
    'doctor/login' => 'doctor/login', // actionLogin в DoctorController
    // авторизация/регистрация 
    'user/register' => 'user/register', // actionRegistration в UserController
    'user/login' => 'user/login', // actionRegistration в UserController
    'user/logout' => 'user/logout', 
    // Главная страница
    '' => 'site/index', // actionIndex в SiteController
];