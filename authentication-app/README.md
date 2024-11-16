<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Laravel Sanctum

Laravel Sanctum is a lightweight authentication package for the Laravel framework that provides an easy way to handle authentication for APIs and single-page applications (SPAs). It allows developers to issue API tokens to users and manage them effectively. Here's a detailed breakdown:

---

## Features of Laravel Sanctum

### API Token Authentication
- Sanctum enables applications to issue tokens for user accounts.
- These tokens can be used to authenticate API requests.
- Tokens can be granted specific abilities or scopes, limiting what the token can be used for.

### Session-Based Authentication for SPAs
- Sanctum supports session-based authentication for SPAs that communicate with the backend using standard web authentication (cookies).
- It leverages Laravel's built-in authentication system, allowing SPAs to authenticate users via login forms and maintain sessions.

### Token Abilities/Scopes
- Tokens can have specific abilities (permissions) assigned to them, restricting what actions the token can perform.
- Example: You can create a token that only performs "view" operations but not "delete."

### Minimal Overhead
- Compared to other authentication packages like Passport, Sanctum is less complex and doesn't require OAuth for token issuance.

### CSRF Protection for SPAs
- Sanctum ensures proper handling of Cross-Site Request Forgery (CSRF) tokens when used for session-based authentication in SPAs.

---

## Common Use Cases

- **API Authentication**: Protect routes and resources in an API by requiring tokens for access.
- **Single-Page Applications (SPAs)**: Authenticate and maintain sessions for SPAs using cookies.
- **Mobile App Backends**: Issue API tokens for mobile apps to authenticate users.

---

## How Sanctum Works

## Installation and Setup

- Sanctum is installed as a Laravel package via Composer.
- After installation, you need to configure it and publish its migration files to set up the necessary database tables for token storage.

---

## Token Issuance

- Tokens can be issued to users using methods like `createToken` on the user model.

---

## Protecting Routes

- Sanctum provides middleware to protect routes, ensuring only authenticated users or valid tokens can access them.

---

## SPAs and Cookies

- Sanctum integrates with Laravel's standard session-based authentication system, allowing SPAs to authenticate users via login endpoints.

---

## Benefits

- Simple and intuitive setup for token-based and session-based authentication.
- Reduces the complexity of OAuth for simpler use cases.
- Fully compatible with Laravel's authentication ecosystem.

---

## Postman Testing

- **[Video Link](https://www.youtube.com/watch?v=3h1dRLKijTI)**
