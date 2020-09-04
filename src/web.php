<?php
use App\Router;

Router::get("/", "MainController@indexPage");
Router::get("/store", "MainController@storePage");

// 회원 정보
Router::post("/sign-up", "UserController@signUp");
Router::post("/sign-in", "UserController@signIn");
Router::get("/logout", "UserController@logout");

// 온라인 집들이
Router::get("/online-party", "MainController@partyPage", "user");
Router::post("/knowhows", "MainController@writeKnowhow", "user");
Router::post("/knowhows/reviews", "MainController@reviewKnowhow", "user");

// 전문가 페이지
Router::get("/experts", "UserController@expertPage", "user");
Router::post("/experts/reviews", "UserController@writeReview", "user");

// 시공견적
Router::get("/estimates", "MainController@estimatePage", "user");
Router::post("/requests", "MainController@writeRequest", "user");
Router::post("/responses", "MainController@writeResponse", "user");
Router::get("/responses", "MainController@getResponses", "user");
Router::post("/estimates/pick", "MainController@pickEstimate", "user");

Router::connect();